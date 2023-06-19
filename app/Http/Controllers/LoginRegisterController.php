<?php

namespace App\Http\Controllers;

use App\Models\ContributorProfile;
use App\Models\InstitutionProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

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
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::factory()->create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'status' => 1
        ]);
        $user->assignRole('Contributor');
        $contributorProfile = ContributorProfile::create([
            'user_id' => $user->id,
            'company' => $request->company,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);
        $user->profile()->associate($contributorProfile);
        $user->save();

        auth()->login($user);

        return redirect()->to('admin');
    }

    public function createInstitution()
    {
        return view('institution_register');
    }

    public function storeInstitution(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'document' => 'required',
        ]);

        $document = $request->file('document');
        $nama_file = time() . "_" . $document->getClientOriginalName();
        $document->move('document', $nama_file);


        $user = User::factory()->create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'status' => 0
        ]);
        $user->assignRole('Institution');
        $institutionProfile = InstitutionProfile::create([
            'user_id' => $user->id,
            'company' => $request->company,
            'address' => $request->address,
            'phone' => $request->phone,
            'document' => $nama_file
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
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->status == 0) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('filament.auth.login')
                    ->withErrors([
                        'gagal' => 'Akun belum aktif!'
                    ])->onlyInput('username');;
            }
            $request->session()->regenerate();

            // Mendapatkan role dari user yang login
            $role = Role::find(Auth::user()->roles->pluck('id')[0]);

            // Mengatur redirect page sesuai role
            if ($role->name == 'Admin') {
                return redirect()->route('dashboard.index')
                    ->withSuccess('You have successfully logged in!');
            } else {
                return redirect()->route('homepage')
                    ->withSuccess('You have successfully logged in!');
            }
        } else {
            return back()
                ->withErrors([
                    'gagal' => 'Username atau password salah!'
                ])->onlyInput('username');
        }
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
