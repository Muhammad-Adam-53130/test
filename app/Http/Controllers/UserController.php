<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'users' => User::paginate(5),
        ];
        return view('user.user', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.user-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
            ],
            'password' => [
                'required',
                'confirmed',
                'regex:/^(?=.*\d)(?=.*[A-Z])(?=.*[!@#$%^&*]).{9,}$/'
            ],
            'password_confirmation' => 'required',
        ]);

        // Find the user and update their details
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('users.user')->with('success', __('User successfully created.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('error', 'ID not valid.');
        }

        $user = User::findOrFail($id);

        return view('user.user-update', compact('user'));
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

        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($id), // Ignore the current user ID
            ],
        ]);

        // Find the user and update their details
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        // Redirect with a success message
        return redirect()->route('users.user')->with('success', 'User updated successfully.');
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

        $user = User::where('id', $id)->firstOrFail();
        $user->forceDelete();

        return redirect()->route('users.user')->with('success', 'User successfully deleted');
    }
}
