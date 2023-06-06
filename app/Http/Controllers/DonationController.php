<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\RequestDonation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    public function requestDonation(Request $request)
    {
        if (Auth::check()) {
            $donation = Donation::findOrFail($request->donation_id);
            $user_id = Auth::id();
    
            //validate form
            $this->validate($request, [
                'donation_id'     => 'required',
                'quantity'   => 'required',
                'comment'   => 'required',
            ]);
    
            RequestDonation::create([
                'user_id'     => $user_id,
                'donation_id'     => $request->donation_id,
                'quantity'   => $request->quantity,
                'comment'   => $request->comment,
                'status'   => 0,
            ]);
    
            //redirect to index
            return redirect()->route('detailDonasi', $request->donation_id)->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('filament.auth.login');
        }
    }
}