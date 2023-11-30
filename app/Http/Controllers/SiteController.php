<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index() {
        
        //dd();
        if(Auth::check()) {
            $user = Auth::user();
            return view('home', compact('user'));
        }

        return view('home');


    }
}
