<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

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

        return view('feed.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('feed.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:300',
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
    public function show(Feed $feed)
    {
        //
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

        $feed = Feed::findOrFail($id);

        return view('feed.edit', $data, compact('feed'));
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

        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:300',
        ]);

        // Find the user and update their details
        $feed = Feed::findOrFail($id);
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
        $feed->forceDelete();

        return redirect()->route('feed.index', ['user_id' => Crypt::encryptString($feed->user_id)])->with('success', __('Feed successfully deleted.'));
    }
}
