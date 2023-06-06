<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontPageController extends Controller
{
    public function index()
    {
        $donations =  DB::table('donations')->get();

        return view('homepage', compact('donations'));
    }

    public function detailDonasi($id)
    {
        $donation = Donation::findOrFail($id);
        $user_id = Auth::id();
        $checkRequest =
            DB::table('request_donations')
            ->where('donation_id', $id)
            ->where('user_id', $user_id)
            ->exists();

        return view('detailDonasi', compact(['donation', 'checkRequest']));
    }

    public function donasiPage()
    {
        $donations =  DB::table('donations')->get();

        return view('donasiPage', compact('donations'));
    }
}
