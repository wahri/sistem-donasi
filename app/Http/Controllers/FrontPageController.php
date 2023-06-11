<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Notification;
use App\Models\RequestDonation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontPageController extends Controller
{
    public function index()
    {
        $donations =  Donation::get();

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

        $requestDonations = RequestDonation::where('donation_id', $id)->get();

        // dd($requestDonations);

        return view('detailDonasi', compact(['donation', 'checkRequest', 'checkOwner', 'requestDonations', 'getRequest']));
    }

    public function donasiPage()
    {
        $donations =  Donation::get();

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

        $profile->save();

        return redirect()->route('settingAccount');
    }

    public function changePassword(Request $request)
    {
        
    }
}
