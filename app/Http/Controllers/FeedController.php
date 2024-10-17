<?php

namespace App\Http\Controllers;

use App\Models\Feed;
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
        $feeds = Feed::when($userId, function ($query) use ($userId) {
            return $query->where('user_id', $userId);
        })->paginate(6);

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
        return view('pages.feed.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100|min:3',
            'description' => 'required|string|max:300|min:3',
        ]);

        // Find the user and update their details
        $feed = new Feed();
        $feed->title = $request->input('title');
        $feed->description = $request->input('description');
        $feed->user_id = Auth::id();
        $feed->save();

        return redirect()->route('feed.index', ['user_id' => Crypt::encryptString($feed->user_id)])->with('success', __('Feed successfully created.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Feed $feed)
    {
        Gate::authorize('update', $feed);
        Gate::authorize('edit', $feed);
        Gate::authorize('destroy', $feed);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, String $id)
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
        $feeds = Feed::when($userId, function ($query) use ($userId) {
            return $query->where('user_id', $userId);
        })->paginate(5);

        $data = [
            'feeds' => $feeds,
        ];

        return view('pages.feed.edit', $data, compact('feed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
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
        ]);

        // Find the user and update their details
        $feed->title = $request->input('title');
        $feed->description = $request->input('description');
        $feed->save();

        // Redirect with a success message
        return redirect()->route('feed.index', ['user_id' => Crypt::encryptString($feed->user_id)])->with('success', __('Feed updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (\Throwable $th) {
            abort(404, 'Invalid id');
        }

        $feed = feed::where('id', $id)->firstOrFail();
        Gate::authorize('destroy', $feed);
        $feed->forceDelete();

        return redirect()->route('feed.index', ['user_id' => Crypt::encryptString($feed->user_id)])->with('success', __('Feed successfully deleted.'));
    }
}
