<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mendapatkan objek peran "institution"
        $role = Role::where('name', 'Institution')->first();

        // Mendapatkan semua pengguna dengan peran "institution"
        $newInstutionAccount = User::role($role->name)->where('status', 0)->get();

        $allAccount = User::where('username', '!=', 'admin')
        ->where('status', 1)
        ->with('roles')->get();

        return view('admin/user/index', compact('newInstutionAccount', 'allAccount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return view('admin/user/show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    function accountConfirmation(string $id)
    {
        $user = User::findOrFail($id);

        $user->status = 1;
        $user->save();
        return redirect()->route('user.index')->withSuccess('Status user berhasil dikonfirmasi!');
    }
}
