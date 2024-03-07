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
            'usertype' => ['required', 'string', 'in:etudiant,pilotedestage,entreprise,admin'],
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
        $etudiantData = ['etudiant_id' => $user['id'], 'name' => $data['name']];
        
        // Check if promotion data is provided
        if (isset($data['promotion']) && $data['promotion'] !== null) {
            $promotion = Promotion::where('name', $data['promotion'])->first();
            
            // If promotion exists, associate it with the student
            if ($promotion !== null) {
                $etudiantData['promotion_id'] = $promotion->id;
            }
        }

        Etudiant::create($etudiantData);
    } elseif ($data['usertype'] === 'pilotedestage') {
        PiloteDePromotion::create([
            'pilote_id'=>$user['id'],
            'name' => $data['name'],
        ]);
    } elseif ($data['usertype'] === 'entreprise') {
        $entrepriseData = [
            'entreprise_id' => $user['id'],
            'name' => $data['name']
        ];

        // Check if secteur is provided
        if (isset($data['secteur']) && $data['secteur'] !== null) {
            $entrepriseData['secteur'] = $data['secteur'];
        }

        Entreprise::create($entrepriseData);
    
    } elseif ($data['usertype'] === 'admin') {
        Admins::create([
            'id'=>$user['id'],
            'name' => $data['name'],
        ]);
    }

    return $user;
}

   public function getAdditionalFields($userType)
    {
        if ($userType === 'etudiant') {
            return response()->json(['success' => true, 'field' => 'promotion']);
        } elseif ($userType === 'entreprise') {
            return response()->json(['success' => true, 'field' => 'secteur']);
        } else {
            return response()->json(['success' => true, 'message' => 'Invalid user type']);
        }
    }
    protected function registered(Request $request, $user)
    {
        if ($user->usertype === 'etudiant') {
            return redirect()->route('etudiant.etudiant');
        } elseif ($user->usertype === 'pilotedestage') {
            return redirect()->route('pilotePromotion.pilote');
        } elseif ($user->usertype === 'entreprise') {
            return redirect()->route('entreprise.dashboard');
        }elseif ($user->usertype === 'admin') {
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
    ]);

    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->password = Hash::make($validatedData['password']);
    $user->usertype = $validatedData['usertype'];

    if ($user->usertype == 'entreprise' && $request->secteur !== null) {
        $entreprise = $user->entreprise;
        $entreprise->name = $validatedData['name'];
        $entreprise->secteur = $request->secteur;
        $entreprise->save();
    } elseif ($user->usertype == 'etudiant' && $request->name !== null) {
        $etudiant = $user->etudiant;
        $etudiant->name = $validatedData['name'];
        // Add other fields if needed
        $etudiant->save();
    } elseif ($user->usertype == 'pilotedestage' && $request->name !== null) {
        $pilote = $user->piloteDePromotion;
        $pilote->name = $validatedData['name'];
        // Add other fields if needed
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
        'usertype' => ['required', 'string', 'in:etudiant,pilotedestage,entreprise,admin'],
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
        Etudiant::create([
            'etudiant_id' => $user->id,
            'name' => $user->name,
        ]);
        return redirect()->route('etudiant.etudiant')->with('success', 'Registration successful!');
    } elseif ($user->usertype === 'pilotedestage') {
        PiloteDePromotion::create([
            'pilote_id' => $user->id,
            'name' => $user->name,
        ]);
        return redirect()->route('pilotePromotion.pilote')->with('success', 'Registration successful!');
    } elseif ($user->usertype === 'entreprise') {
        Entreprise::create([
            'entreprise_id' => $user->id,
            'name' => $user->name,
        ]);
        return redirect()->route('entreprise.dashboard')->with('success', 'Registration successful!');
    } elseif ($user->usertype === 'admin') {
        Admins::create([
            'id' => $user->id,
            'name' => $user->name,
        ]);
        return redirect()->route('admins.index')->with('success', 'Registration successful!');
    }

    // Default redirection if user type is not recognized
    return redirect('/')->with('success', 'Registration successful!');
}

}

