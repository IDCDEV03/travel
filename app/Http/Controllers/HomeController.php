<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() 
    {     
        //////
        return view('userPages.home');
    }

    public function adminHome() 
    {
        return view('admin.list_package');
    }
}
