<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index()
    {

        if (Auth::check()) {
            $user = Auth::user();
            foreach ($user->UserRole as $userRole) {
                $userRole = $userRole->role_id;
            }
            return view('home', compact('user', 'userRole'));
        }

        $user = false;
        return view('home', compact('user'));
    }
}
