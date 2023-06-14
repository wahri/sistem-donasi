<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function dashboard() {
        return view('admin/dashboard');
    }

    function userManagement() {
        return view('admin/user/index');
    }
}
