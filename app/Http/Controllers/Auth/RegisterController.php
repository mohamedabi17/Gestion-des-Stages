<?php
// Http/Controlers\Auth\RegisterController


namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use App\Models\PiloteDePromotion;
use App\Models\Promotion;
use App\Models\Entreprise;
use App\Models\Admins;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }
     

      public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }
  
    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'usertype' => ['required', 'string', 'in:etudiant,pilotedestage,admin'],
        ]);
    }


 public function create()
    {
        return view('register');
    }

    protected function registered(Request $request, $user)
    {
        if ($user->usertype === 'etudiant') {
            return redirect()->route('etudiant.etudiant');
        } elseif ($user->usertype === 'pilotedestage') {
            return redirect()->route('pilotePromotion.dashboard');
        } elseif ($user->usertype === 'admin') {
            return redirect()->route('admins.index')->with('success', 'Registration successful!');
        }
    }

    public function update(Request $request, $id)
{
    $user = User::find($id);

    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'usertype' => ['required', 'string', 'in:etudiant,pilotedestage,entreprise,admin'],
        'promotion'=> ['sometimes', 'string',  'max:255'], // Changed 'notrequired' to 'sometimes'
    ]);

    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->password = Hash::make($validatedData['password']);
    $user->usertype = $validatedData['usertype'];

   if ($user->usertype == 'etudiant') {
        $etudiant = $user->etudiant;
        // Add logic for other fields if needed
        $etudiant->save();
    } elseif ($user->usertype == 'pilotedestage') {
        $pilote = $user->piloteDePromotion;
        // Add logic for other fields if needed
        $pilote->save();
    }
    // Add handling for admin if needed

    $user->save();

    return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
}


public function store(Request $request)
{
    // Validate the request data
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'usertype' => ['required', 'string', 'in:etudiant,pilotedestage,admin'],
    ]);

    // Create a new user record
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'usertype' => $request->usertype,
    ]);

    // Create corresponding records based on user type
    if ($user->usertype === 'etudiant') {
        $etudiantData = [
            'user_id' => $user->id,
            'name' => $user->name,
        ];

        // Check if promotion data is provided
        if ($request->filled('promotion')) {
            $promotion = Promotion::where('nom_promotion', $request->promotion)->first();
               // If promotion exists, associate it with the student
            if ($promotion !== null) {
                $etudiantData['promotion_id'] = $promotion->id;
            }
            else{
                  $newPromotion = Promotion::create([
                        'nom_promotion' => $request->promotion,
                        'pilote_id' => null,
                    ]);
                $etudiantData['promotion_id'] = $newPromotion->id;
        }}else{
               $etudiantData['promotion_id'] = null;
        }

        $etud =Etudiant::create($etudiantData);
        return redirect()->route('login')->with('success', 'Registration successful!',);
    } elseif ($user->usertype === 'pilotedestage') {
        PiloteDePromotion::create([
            'user_id' => $user->id,
            'name' => $user->name,
        ]);
        return redirect()->route('login')->with('success', 'Registration successful!');
    } 
    // elseif ($user->usertype === 'entreprise') {
    //     $entrepriseData = [
    //         'user_id' => $user->id,
    //         'name' => $user->name,
    //     ];

    //     // Check if secteur is provided
    //     if ($request->filled('secteur')) {
    //         $entrepriseData['secteur'] = $request->secteur;
    //     }

    //     Entreprise::create($entrepriseData);
    //     return redirect()->route('login')->with('success', 'Registration successful!');
    // } 
    elseif ($user->usertype === 'admin') {


          $AdmintData = [
            'user_id' => $user->id,
            'name' => $user->name,
        ];
        Admins::create([
            'user_id' => $user->id,
            'name' => $user->name,
        ]);
        return redirect()->route('login')->with('success', 'Registration successful!');
    }

}


}




