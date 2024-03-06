<?php
// Http/Controlers\UserController
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Display a listing of the users.
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Show the form for creating a new user.
    public function create()
    {
        return view('users.create');
    }

    // Store a newly created user in the database.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'usertype' => 'required',
            // Add more validation rules as needed
        ]);

        User::create($request->all());

        return redirect()->route('users.index')
                         ->with('success', 'User created successfully.');
    }

    // Show the form for editing the specified user.
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Update the specified user in the database.
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$user->id,
            'password' => 'required',
            'usertype' => 'required',
            // Add more validation rules as needed
        ]);

        $user->update($request->all());

        return redirect()->route('users.index')
                         ->with('success', 'User updated successfully');
    }

    // Remove the specified user from the database.
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
                         ->with('success', 'User deleted successfully');
    }
}
