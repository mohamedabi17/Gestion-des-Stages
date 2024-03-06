<?php

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
            'usertype' => ['required', 'string', 'in:etudiant,pilote_de_stage,entreprise'],
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
                'user_id' => $user->id,
                // Add other etudiant fields here
            ]);
        } elseif ($data['usertype'] === 'pilote_de_stage') {
            PiloteDePromotion::create([
                'user_id' => $user->id,
                // Add other pilote_de_stage fields here
            ]);
        } elseif ($data['usertype'] === 'entreprise') {
            Entreprise::create([
                'user_id' => $user->id,
                // Add other entreprise fields here
            ]);
        }

        return $user;
    }

    protected function registered(Request $request, $user)
    {
        if ($user->usertype === 'etudiant') {
            return redirect()->route('etudiant.dashboard');
        } elseif ($user->usertype === 'pilote_de_stage') {
            return redirect()->route('pilote_de_stage.dashboard');
        } elseif ($user->usertype === 'entreprise') {
            return redirect()->route('entreprise.dashboard');
        }
    }
}
