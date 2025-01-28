<?php

namespace App\Http\Controllers;

use App\Models\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $tags = tag::paginate(5);

        $data = [
            'tags' => $tags,
        ];

        return view('pages.tag.index', $data);
    }

    public function create()
    {
        return view('pages.tag.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20|unique:tags,name',
        ], [
            'name.unique' => 'This tag name is already taken. Please choose a different one.',
            'name.max' => 'The tag name must not be longer than 20 characters.',
        ]);

        // Find the user and update their details
        $tag = new tag();
        $tag->name = $request->input('name');
        $tag->save();

        return redirect()->route('tag.index')->with('success', __('Tag successfully created.'));
    }

    public function destroy(string $id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (\Throwable $th) {
            abort(404, 'Invalid id');
        }

        $tag = tag::where('id', $id)->firstOrFail();
        \DB::table('feed_tag')->where('tag_id', $id)->delete();
        $tag->forceDelete();

        return redirect()->route('tag.index')->with('success', 'Tag successfully deleted');
    }
}
