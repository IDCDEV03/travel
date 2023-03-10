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
        $data = DB::table('package_tours')
        ->where('package_status' , '=', '1')
        ->get();
        return view('home.index',compact('data'));
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

    public function tour_detail($id)
    {
        $package_tours = DB::table('package_tours')
        ->where('package_id','=', $id)
        ->get();
        return view('home.tour-details',compact('package_tours'));
    }

}
