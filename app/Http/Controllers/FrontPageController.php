<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Notification;
use App\Models\RequestDonation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FrontPageController extends Controller
{
    public function index()
    {
        $currentDateTime = date('Y-m-d H:i:s');
        $donations =  Donation::where('stock', '>', 0)
            ->where('expired_donation', '>', $currentDateTime)
            ->get();

        $user = Auth::user();

        return view('homepage', compact('donations'));
    }

    public function detailDonasi($id)
    {
        $donation = Donation::findOrFail($id);
        $user_id = Auth::id();

        // $checkRoleUser = Auth::user()->hasRole('Institution');

        $checkRequest =
            DB::table('request_donations')
            ->where('donation_id', $id)
            ->where('user_id', $user_id)
            ->exists();

        $getRequest =
            DB::table('request_donations')
            ->where('donation_id', $id)
            ->where('user_id', $user_id)
            ->first();

        $checkOwner =
            DB::table('donations')
            ->where('id', $id)
            ->where('user_id', $user_id)
            ->exists();

        $phoneNumber = str_replace(' ', '', $donation->user->profile->phone);
        if (substr($phoneNumber, 0, 3) !== '+62') {
            // Jika bukan format yang diinginkan, ubah format menjadi +62
            $phoneNumber = '+62' . substr($phoneNumber, 1);
        }

        $requestDonations = RequestDonation::where('donation_id', $id)->get();

        // dd($requestDonations);

        return view('detailDonasi', compact(['donation', 'checkRequest', 'checkOwner', 'requestDonations', 'getRequest', 'phoneNumber']));
    }

    public function donasiPage()
    {
        $currentDateTime = date('Y-m-d H:i:s');
        $donations =  Donation::where('stock', '>', 0)
            ->where('expired_donation', '>', $currentDateTime)
            ->get();

        return view('donasiPage', compact('donations'));
    }

    public function readNotification(Notification $notification)
    {
        if (Auth::check() && $notification->user_id === Auth::id()) {
            $notification->update(['isNew' => 0]);
        }

        return redirect()->route('detailDonasi', $notification->donation->id);
    }

    public function settingAccount()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('settingAccount', compact('user'));
        }
        return redirect()->route('filament.auth.login');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $user->name = $request->name;
        $user->save();

        $profile = $user->profile;
        $profile->company = $request->company;
        $profile->address = $request->address;
        $profile->phone = $request->phone;
        if (isset($request->map)) {
            $profile->map = $request->map;
        }

        $profile->save();

        return redirect()->route('settingAccount');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required',
        ]);

        $user = Auth::user();

        // Verifikasi password lama
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Password lama tidak sesuai']);
        } else {
            // Update password baru
            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect()->back()->with('success', 'Password berhasil diubah');
        }
    }

    function volunteerPage()
    {

        $donations =  Donation::get();

        return view('volunteer', compact('donations'));
    }

    function contactPage()
    {

        $donations =  Donation::get();

        return view('contact', compact('donations'));
    }
}
