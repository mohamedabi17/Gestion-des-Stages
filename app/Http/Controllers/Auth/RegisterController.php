<?php
// Http/Controlers\Auth\RegisterController


namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use App\Models\PiloteDePromotion;
use App\Models\Entreprise;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'usertype' => ['required', 'string', 'in:etudiant,pilotedestage,entreprise'],
        ]);
    }

    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'usertype' => $data['usertype'],
        ]);

        if ($data['usertype'] === 'etudiant') {
            Etudiant::create([
                 'name' => $data['name'],
            ]);
        } elseif ($data['usertype'] === 'pilotedestage') {
            PiloteDePromotion::create([
                'name' => $data['name'],
            ]);
        } elseif ($data['usertype'] === 'entreprise') {
            Entreprise::create([
                'name' => $data['name'],
            ]);
        }

        return $user;
    }

    protected function registered(Request $request, $user)
    {
        if ($user->usertype === 'etudiant') {
            return redirect()->route('etudiant.etudiant');
        } elseif ($user->usertype === 'pilote_de_stage') {
            return redirect()->route('pilotePromotion.pilote');
        } elseif ($user->usertype === 'entreprise') {
            return redirect()->route('entreprise.dashboard');
        }
    }


     public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'usertype' => ['required', 'string', 'in:etudiant,pilotedestage,entreprise'],
        ]);

        // Create a new user record
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertype' => $request->usertype,
        ]);

        if ($user['usertype'] === 'etudiant') {
            Etudiant::create([
                 'name' => $user->name,
            ]);
        } elseif ($user['usertype'] === 'pilotedestage') {
            PiloteDePromotion::create([
                'name' => $user->name,
            ]);
        } elseif ($user['usertype'] === 'entreprise') {
            Entreprise::create([
                'name' => $user->name,
                // Add other entreprise fields here
            ]);
        }

        // Redirect based on user type after registration
        if ($user->usertype === 'etudiant') {
            return redirect()->route('etudiant.etudiant')->with('success', 'Registration successful!');
        } elseif ($user->usertype === 'pilotedestage') {
            return redirect()->route('pilotePromotion.pilote')->with('success', 'Registration successful!');
        } elseif ($user->usertype === 'entreprise') {
            return redirect()->route('entreprise.dashboard')->with('success', 'Registration successful!');
        }

        // Default redirection if user type is not recognized
        return redirect('/')->with('success', 'Registration successful!');
    }
}

