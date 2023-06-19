<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\RequestDonation;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    function dashboard()
    {
        return view('admin/dashboard');
    }

    function userManagement()
    {
        return view('admin/user/index');
    }

    function transactionPage()
    {

        $donaturRole = Role::where('name', 'Contributor')->first();
        $users = User::role($donaturRole->name)->get();

        $dataTransaction = $users->map(function ($user) {
            $jumlahDonasi = Donation::where('user_id', $user->id)
                ->count();
            $jumlahTransaksi = RequestDonation::where('user_id', $user->id)
                ->where('status', 1)
                ->count();

            return [
                'user' => $user,
                'jumlah_donasi' => $jumlahDonasi,
                'jumlah_transaksi' => $jumlahTransaksi,
            ];
        });

        return view('admin/transaction/index', compact('dataTransaction'));
    }

    function donationPage() {
        $listDonation = Donation::all();
        return view('admin/donation/index', compact('listDonation'));
    }

    function deleteDonation($id) {
        //get post by ID
        $donation = Donation::findOrFail($id);

        //delete post
        $donation->delete();

        //redirect to index
        return redirect()->route('dashboard.donation')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    function donationTrashPage() {
        $listDonation = Donation::onlyTrashed()->get();
        return view('admin/donation/trashed', compact('listDonation'));
    }

    function donationRestore($id) {
        $donation = Donation::onlyTrashed()->where('id',$id);
        $donation->restore();
        return redirect()->route('dashboard.donation')->with(['success' => 'Data Berhasil Dikembalikan!']);
    }

    function donationDeletePermanent($id) {
        $donation = Donation::onlyTrashed()->where('id',$id);
        $donation->forceDelete();
        return redirect()->route('dashboard.donationTrash')->with(['success' => 'Data Berhasil Dihapus Permanent!']);
    }
}
