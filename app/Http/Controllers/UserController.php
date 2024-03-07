<?php
// Http/Controlers\UserController
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admins;
use App\Models\Etudiant;
use App\Models\Entreprise;
use App\Models\PiloteDePromotion;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    // Display a listing of the users.
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

public function profile()
{
    // Get the authenticated user
    $user = Auth::user();

    // Check the user type and retrieve data accordingly
    switch ($user->user_type) {
        case 'admin':
            $data = Admins::find($user->id);
            break;
        case 'student':
            $data = Etudiant::find($user->id);
            break;
        case 'entreprise':
            $data = Entreprise::find($user->id);
            break;
        case 'pilotedestage':
            $data = PiloteDePromotion::find($user->id);
            break;
        // Add more cases for other user types if needed
        default:
            $data = null; // Handle other user types or throw an error
    }

    // Pass the user data to the view based on user type
    return view('profile.profile', compact('data'));
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
