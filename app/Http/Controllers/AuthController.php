<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function loginIndex()
    {
        return view('auth.login');
    }

    public function loginStore(LoginFormRequest $request)
    {

        if($request) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $request->session()->regenerate();
                return redirect()->route('site.index');
            }
            return redirect()->route('authlogin.index')->with('fail', 'Email e/ou senha inválidos!');
        }
        return redirect()->route('authlogin.index')->with('fail', 'Email e/ou senha inválidos!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function registerIndex()
    {
        return view('auth.register');
    }

    public function registerStore(RegisterFormRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if ($user) {
            UserRole::create([
                'user_id' => $user->id,
                'role_id' => 1
            ]);
        }

        return redirect()->route('site.index');
    }
}
