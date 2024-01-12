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
    public function index() //Redirect view INDEX
    {
        if (Auth::check()) {

            //Sidebar dependences
            $userAuth = Auth::user();
            $roleUser = $userAuth->UserRole;

            //Rules from teacher
            $userRole = UserRole::where('role_id', 3)->get()->pluck('user_id');
            $users = User::whereIn('id', $userRole)->get();

            return view('teacher.index', compact('users', 'userAuth', 'roleUser'));
        }

        $users = false;
        return view('teacher.index', compact('users'));
    }

    public function createWithRole() //Redirect view CREATE TEACHER WITH ROLE
    {
        $userRole = UserRole::where('role_id', 1)->get()->pluck('user_id');
        $users = User::whereIn('id', $userRole)->get();
        return view('teacher.createWithRole', compact('users'));
    }

    public function createNoRole() //Redirect view CREATE TEACHER NO ROLE
    {
        return view('teacher.createNoRole');
    }

    public function updateRole(Request $request) //Upadate in ROLE
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

        return redirect()->route('teacher.index');
    }

    public function storeTeacher(RegisterTeacherFormRequest $request) //CREATE new teacher account
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
                return redirect()->route('teacher.index')->with('success', 'Professor criado com sucesso!');
            }
            return redirect()->route('teacher.index')->with('success', 'Professor criado com sucesso!');
        }
        return redirect()->route('teacher.index')->with('errors', 'Professor não foi encontrado!');
    }

    public function updateTeacher(Request $request, $id)  //UPDATE data teacher 
    {
        $user = User::find($id);
        if(!$user) {
            return redirect()->route('teacher.index')->with('errors', 'Não foi possível atualizar.');
        };

        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
        return redirect()->route('teacher.index')->with('success', 'Professor atualizado com sucesso!');
    }

    public function unlinkTeacher($id) //UNLINK teacher from role teacher
    { 
        $user = User::find($id);
        if($user) {
            $userRole = UserRole::where('user_id', $user->id)->first();
            if($userRole->role_id == 1) {
                return redirect()->route('teacher.index')->with('errors', 'Não foi possível desvincular essa conta!');
            }
            $teacherRole = UserRole::where('user_id', $user->id)->first();
            $teacherRole->update(['role_id' => 1]);
            return redirect()->route('teacher.index')->with('success', 'Conta desvinculada com sucesso!');
        }
        return redirect()->route('teacher.index')->with('errors', 'Não foi possível desvincular esse professor(a)!');
    }

    public function destroyTeacher($id) //DELETE teacher from role teacher
    {
        $user = User::find($id);
        if($user) {
            $userRole = UserRole::where('user_id', $user->id)->first();
            if($userRole->role_id == 1) {
                return redirect()->route('teacher.index')->with('errors', 'Não foi possível apagar esse professor(a)!');
            }
            $user->delete();
            return redirect()->route('teacher.index')->with('success', 'Professor excluido com sucesso!');   
        }
        return redirect()->route('teacher.index')->with('errors', 'Não foi possível apagar esse professor(a)!');
    }
}
