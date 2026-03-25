<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //funzione index

    public function index()
    {
        return Auth::user();
        return 'Welcome in your Admin section!';
    }

    public function profile()
    {
        return 'This is your profile';
    }
}
