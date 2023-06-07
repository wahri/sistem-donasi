<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Notification;
use App\Models\RequestDonation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontPageController extends Controller
{
    public function index()
    {
        $donations =  DB::table('donations')->get();

        $user = Auth::user();

        return view('homepage', compact('donations'));
    }

    public function detailDonasi($id)
    {
        $donation = Donation::findOrFail($id);
        $user_id = Auth::id();

        $checkRoleUser = Auth::user()->hasRole('Institution');

        $checkRequest =
            DB::table('request_donations')
            ->where('donation_id', $id)
            ->where('user_id', $user_id)
            ->exists();

        $checkRequestStatus =
            DB::table('request_donations')
            ->select('status')
            ->get();

        $checkOwner =
            DB::table('donations')
            ->where('id', $id)
            ->where('user_id', $user_id)
            ->exists();

        $requestDonations = RequestDonation::where('donation_id', $id)->get();

        // dd($requestDonations);

        return view('detailDonasi', compact(['donation', 'checkRequest', 'checkRoleUser', 'checkOwner', 'requestDonations', 'checkRequestStatus']));
    }

    public function donasiPage()
    {
        $donations =  DB::table('donations')->get();

        return view('donasiPage', compact('donations'));
    }

    public function readNotification(Notification $notification)
    {
        if (Auth::check() && $notification->user_id === Auth::id()) {
            $notification->update(['isNew' => 0]);
        }

        return redirect()->route('detailDonasi', $notification->donation->id);
    }
}
