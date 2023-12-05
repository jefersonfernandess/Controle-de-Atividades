<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterTeacherFormRequest;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function index()
    {
        if (Auth::check()) {

            $userRole = UserRole::where('role_id', 3)->get()->pluck('user_id');
            $users = User::whereIn('id', $userRole)->get();

            return view('teacher.index', compact('users'));
        }

        $users = false;
        return view('teacher.index', compact('users'));
    }

    public function createWithRole() //Redirect to view CREATE TEACHER WITH ROLE
    {
        $users = User::get();
        return view('teacher.createWithRole', compact('users'));
    }

    public function createNoRole() //Redirect to view CREATE TEACHER NO ROLE
    {
        return view('teacher.createNoRole');
    }

    public function updateRole(Request $request)
    {
        $validate = $request->validate([
            'userId' => 'required'
        ], [
            'userId.required' => 'Você precisa selecionar uma opção!'
        ]);

        if (!$validate) {
            return redirect()->back()->with('update', 'Opção inválida! Selecione a opção correta.');
        }

        $userId = $request->userId;
        $teacherRole = UserRole::where('user_id', $userId)->first();
        $teacherRole->update(['role_id' => 3]);

        return redirect()->route('site.index');
    }

    public function storeTeacher(RegisterTeacherFormRequest $request)
    {
        if ($request) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            if ($user) {
                UserRole::create([
                    'user_id' => $user->id,
                    'role_id' => 3
                ]);
            }

            return redirect()->route('site.index');
        }
    }

    public function updateTeacher(Request $request, $id) {
        $user = User::find($id);
        if(!isset($user)) {
            return redirect()->route('teacher.index')->with('erros', 'Não foi possível atualizar.');
        };

        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
        return redirect()->route('teacher.index')->with('success', 'Professor atualizado com sucesso!');
    }

    public function destroyTeacher($id) {
        $user = User::find($id);
        if(!isset($user)) {
            return redirect()->route('teacher.index')->with('erros', 'Não foi possível apagar essa conta!');
        }

        $userId = $user->id;
        $teacherRole = UserRole::where('user_id', $userId)->first();
        $teacherRole->update(['role_id' => 1]);

        return redirect()->route('site.index');
        return redirect()->route('teacher.index')->with('success', 'Professor excluido com sucesso!');

    }
}
