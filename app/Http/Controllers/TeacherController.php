<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTeacherWithRoleFormRequest;
use App\Http\Requests\RegisterTeacherFormRequest;
use App\Http\Requests\UpdateTeacherFormRequest;
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
        //Sidebar dependences
        $userAuth = Auth::user();
        $roleUser = $userAuth->UserRole;

        $userRole = UserRole::where('role_id', 1)->get()->pluck('user_id');
        $users = User::whereIn('id', $userRole)->get();
        return view('teacher.createWithRole', compact('users', 'userAuth', 'roleUser'));
    }

    public function createNoRole() //Redirect view CREATE TEACHER NO ROLE
    {
        //Sidebar dependences
        $userAuth = Auth::user();
        $roleUser = $userAuth->UserRole;

        return view('teacher.createNoRole', compact('userAuth', 'roleUser'));
    }

    public function updateRole(CreateTeacherWithRoleFormRequest $request) //Upadate in ROLE
    {
        if ($request) {
            $userId = $request->userId;
            $teacherRole = UserRole::where('user_id', $userId)->first();
            $teacherRole->update(['role_id' => 3]);

            return redirect()->route('teacher.index')->with('success', 'Professor cadastrado com sucesso!');
        }
        return redirect()->back()->with('fails', 'Opção inválida! Selecione a opção correta.');
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
        return redirect()->route('teacher.index')->with('fails', 'Professor não foi encontrado!');
    }

    public function updateTeacher(UpdateTeacherFormRequest $request, $id)  //UPDATE data teacher 
    {
        $user = User::find($id);
        if ($user) {
            $userRole = UserRole::where('user_id', $user->id)->first();
            if($userRole->role_id == 1) {
                return redirect()->route('teacher.index')->with('fails', 'Não foi possível atualizar.');
            }
            $user->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
            return redirect()->route('teacher.index')->with('success', 'Professor atualizado com sucesso!');
        };
        return redirect()->route('teacher.index')->with('fails', 'Esse professor não foi encontrado!');
        
    }

    public function unlinkTeacher($id) //UNLINK teacher from role teacher
    {
        $user = User::find($id);
        if ($user) {
            $userRole = UserRole::where('user_id', $user->id)->first();
            if ($userRole->role_id == 1) {
                return redirect()->route('teacher.index')->with('fails', 'Não foi possível desvincular essa conta!');
            }
            $teacherRole = UserRole::where('user_id', $user->id)->first();
            $teacherRole->update(['role_id' => 1]);
            return redirect()->route('teacher.index')->with('success', 'Conta desvinculada com sucesso!');
        }
        return redirect()->route('teacher.index')->with('fails', 'Não foi possível desvincular esse professor(a)!');
    }

    public function destroyTeacher($id) //DELETE teacher from role teacher
    {
        $user = User::find($id);
        if ($user) {
            $userRole = UserRole::where('user_id', $user->id)->first();
            if ($userRole->role_id == 1) {
                return redirect()->route('teacher.index')->with('fails', 'Não foi possível apagar esse professor(a)!');
            }
            $user->delete();
            return redirect()->route('teacher.index')->with('success', 'Professor excluido com sucesso!');
        }
        return redirect()->route('teacher.index')->with('fails', 'Não foi possível apagar esse professor(a)!');
    }
}
