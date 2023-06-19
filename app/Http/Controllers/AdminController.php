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
}
