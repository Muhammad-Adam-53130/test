<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use App\Models\tag;
use DB;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Gate;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Retrieve and decrypt the user_id from the query string
        $userId = $request->query('user_id');
        $userId = $userId ? Crypt::decryptString($userId) : null;

        // Optionally filter feeds by user_id if provided
        $feeds = Feed::with('tags')->when($userId, function ($query) use ($userId) {
            return $query->where('user_id', $userId);
        })->active()->paginate(6);

        $data = [
            'feeds' => $feeds,
        ];

        return view('pages.feed.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = tag::all();
        return view('pages.feed.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100|min:3',
            'description' => 'required|string|max:300|min:3',
            'tags' => 'nullable | array',
        ]);
        // Find the user and update their details
        $feed = new Feed();
        $feed->title = $request->input('title');
        $feed->description = $request->input('description');
        $feed->user_id = Auth::id();
        $feed->save();

        $feed->tags()->attach($request['tags']);

        return redirect()->route('feed.index', ['user_id' => Crypt::encryptString($feed->user_id)])->with('success', __('Feed successfully created.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Feed $feed, string $id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('error', 'ID not valid.');
        }

        $feed = Feed::with('tags')->findOrFail($id);
        $tags = tag::all();
        
        return view('pages.feed.show', compact('feed', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('error', 'ID not valid.');
        }

        $feed = Feed::findOrFail($id);
        Gate::authorize('edit', $feed);

        // Retrieve and decrypt the user_id from the query string
        $userId = $request->query('user_id');
        $userId = $userId ? Crypt::decryptString($userId) : null;

        // Optionally filter feeds by user_id if provided
        $feeds = Feed::with('tags')->when($userId, function ($query) use ($userId) {
            return $query->where('user_id', $userId);
        })->paginate(5);

        $data = [
            'feeds' => $feeds,
            'tags' => tag::all(),
        ];

        return view('pages.feed.edit', $data, compact('feed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Decrypt the user ID
        try {
            $id = Crypt::decryptString($id);
        } catch (DecryptException $e) {
            abort(404, 'Invalid id');
        }

        $feed = Feed::findOrFail($id);
        Gate::authorize('update', $feed);

        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:100|min:3',
            'description' => 'required|string|max:300|min:3',
            'tags' => 'nullable | array',
        ]);

        // Find the user and update their details
        $feed->title = $request->input('title');
        $feed->description = $request->input('description');
        $feed->save();

        // Get the tags from the request
        $newTags = $request->input('tags');

        // Sync the tags (attach new, detach old)
        $feed->tags()->sync($newTags);

        // Redirect with a success message
        return redirect()->route('feed.index', ['user_id' => Crypt::encryptString($feed->user_id)])->with('success', __('Feed updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (\Throwable $th) {
            abort(404, 'Invalid id');
        }

        $feed = feed::where('id', $id)->firstOrFail();
        Gate::authorize('destroy', $feed);
        DB::table('feed_tag')->where('feed_id', $id)->delete();
        $feed->forceDelete();

        return redirect()->route('feed.index', ['user_id' => Crypt::encryptString($feed->user_id)])->with('success', __('Feed successfully deleted.'));
    }
}
