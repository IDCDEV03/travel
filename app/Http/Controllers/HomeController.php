<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function home()
    {
        return view('home.index');
    }

    public function about_us()
    {
        return view('home.about-us');
    }

    public function contact()
    {
        return view('home.contact');
    }
    public function service()
    {
        return view('home.service');
    }

    public function index() 
    {            
        return view('userpages.home');
    }

    public function adminHome() 
    {
        return view('admin.list_package');
    }
}
