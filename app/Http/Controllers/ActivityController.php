<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{

    public function index() {
        if (Auth::check()) {

            $userRole = UserRole::where('role_id', 3)->get()->pluck('user_id');
            $users = User::whereIn('id', $userRole)->orderBy('name', 'ASC')->get();

            $activities = Activity::get();
            return view('activity.index', compact('users', 'activities'));
        }

        $users = false;
        return view('diciplines.index', compact('users'));
    }

    public function create() {
        return view('activity.create');
    }

    public function store(Request $request) {  
        
    }
}
