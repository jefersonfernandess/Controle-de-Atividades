<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index() {
        
        //dd();
        if(Auth::check()) {
            $user = Auth::user();
            return view('home', compact('user'));
        }

        $user = false;
        return view('home', compact('user'));


    }
}
