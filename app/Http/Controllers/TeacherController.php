<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return view('teacher.index');
    }

    public function createWithRole()
    {
        $users = User::get();
        return view('teacher.createWithRole', compact('users'));
    }

    public function createNoRole()
    {
        return view('teacher.createNoRole');
    }

    public function storeWithRole(Request $request) {
        dd($request);
    }
}
