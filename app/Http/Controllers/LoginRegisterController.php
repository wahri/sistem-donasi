<?php

namespace App\Http\Controllers;

use App\Models\ContributorProfile;
use App\Models\InstitutionProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard'
        ]);
    }

    public function createContributor()
    {
        return view('contributor_register');
    }

    public function storeContributor(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::factory()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $user->assignRole('Contributor');
        $contributorProfile = ContributorProfile::create([
            'user_id' => $user->id,
            'company' => $request->company,
            'phone' => $request->phone,
        ]);
        $user->profile()->associate($contributorProfile);
        $user->save();
        
        // auth()->login($user);
        
        return redirect()->route('homepage');
    }

    public function createInstitution()
    {
        return view('institution_register');
    }

    public function storeInstitution(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::factory()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $user->assignRole('Institution');
        $institutionProfile = InstitutionProfile::create([
            'user_id' => $user->id,
            'company' => $request->company,
            'phone' => $request->phone,
        ]);
        $user->profile()->associate($institutionProfile);
        $user->save();
        
        // auth()->login($user);
        
        return redirect()->route('homepage');
    }
    
    public function login()
    {
        return view('home_login');
    }
    
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('homepage')
                ->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');

    } 
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('homepage')
            ->withSuccess('You have logged out successfully!');;
    }    
}
