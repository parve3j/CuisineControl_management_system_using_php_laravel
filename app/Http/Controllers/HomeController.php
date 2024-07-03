<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;

use Illuminate\Http\Request;    

class HomeController extends Controller
{
    public function index()
    {
        $data= Food::all();
        return view('home', compact('data'));
    }
    public function redirects()
    {
        $usertype= Auth::user()->usertype;
        $data= Food::all();
        if($usertype=='1')
        {
            return view('admin.adminhome');
        }
        else
        {
            return view('home', compact('data'));
        }

    }
}
