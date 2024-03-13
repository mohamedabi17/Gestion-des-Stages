<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Override the authenticated method to redirect users based on their user type
    protected function authenticated(Request $request, $user)
    {
          if ($user->usertype === 'etudiant') {
            return redirect()->route('etudiant.etudiant');
        } elseif ($user->usertype === 'pilotedestage') {
            return redirect()->route('pilotePromotion.dashboard');
        } elseif ($user->usertype === 'entreprise') {
            return redirect()->route('entreprise.dashboard');
        }
    }
}


