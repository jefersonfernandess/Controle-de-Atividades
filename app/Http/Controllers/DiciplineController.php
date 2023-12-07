<?php

namespace App\Http\Controllers;

use App\Models\Dicipline;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiciplineController extends Controller
{
    public function index() {
        if (Auth::check()) {

            $userRole = UserRole::where('role_id', 3)->get()->pluck('user_id');
            $users = User::whereIn('id', $userRole)->orderBy('name', 'ASC')->get();

            $diciplines = Dicipline::get();
            return view('diciplines.index', compact('users', 'diciplines'));
        }

        $users = false;
        return view('diciplines.index', compact('users'));
    }

    public function store(Request $request) {
        $validate = $request->validate([
            'name' => 'required|min:3|max:128'
        ], [
            'name.required' => 'O nome é obrigatório!',
            'name.min' => 'O campo nome precisa ter mais que *3* caracteres'
        ]);

        if(!$validate) {
            return redirect()->back()->with('error');
        }

        Dicipline::create([
            'name' => $request->name
        ]);
        return redirect()->route('diciplines.index');
    }
}
