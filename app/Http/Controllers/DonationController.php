<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Notification;
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

            Notification::create([
                'user_id'     => $donation->user->id,
                'donation_id'     => $request->donation_id,
                'message' => 'Permintaan baru',
            ]);

            //redirect to index
            return redirect()->route('detailDonasi', $request->donation_id)->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('filament.auth.login');
        }
    }

    public function requestConfirmation(RequestDonation $request)
    {
        $qty = $request->quantity;
        $donation = Donation::findOrFail($request->donation_id);

        if ($qty > $donation->stock) {
            return back()->with(['error' => 'Permintaan melebihi jumlah stock!']);
        }

        $donation->update([
            'stock' => $donation->stock - $qty
        ]);

        $request->update(['status' => 1]);
        Notification::create([
            'user_id'     => $request->user_id,
            'donation_id'     => $request->donation_id,
            'message' => 'Permintaan Telah Disetujui',
        ]);

        return redirect()->route('detailDonasi', $request->donation_id);
    }

}
