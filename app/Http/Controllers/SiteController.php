<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index()
    {

        if (Auth::check()) {
            $userAuth = Auth::user();
            $roleUser = $userAuth->UserRole;
            return view('home', compact('userAuth', 'roleUser'));
        }

        $userAuth = false;
        return view('home', compact('userAuth'));
    }
}
