<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiciplineController extends Controller
{
    public function index() {
        if (Auth::check()) {
            $user = Auth::user();
            foreach ($user->UserRole as $userRole) {
                $userRole = $userRole->max('role_id');
            }
            return view('diciplines.index', compact('user', 'userRole'));
        }

        $user = false;
        return view('diciplines.index', compact('user'));
    }
}
