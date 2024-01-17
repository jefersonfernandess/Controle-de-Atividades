<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterStudentFormRequest;
use App\Http\Requests\UpdateStudentFormRequest;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index() //see all the students in the system
    {
        if (Auth::check()) {

            //Sidebar dependences
            $userAuth = Auth::user();
            $roleUser = $userAuth->UserRole;

            $userRole = UserRole::where('role_id', 2)->get()->pluck('user_id');
            $users = User::whereIn('id', $userRole)->orderBy('name', 'ASC')->get();

            return view('students.index', compact('users', 'userAuth', 'roleUser'));
        }
        $users = false;
        return view('students.index', compact('users'));
    }

    public function createNoRole() //Redirect view CREATE STUDENT NO ROLE
    {
        return view('students.createRules.createNoRole');
    }

    public function createWithRole() //Redirect view CREATE STUDENT WITH ROLE
    {
        $userRole = UserRole::where('role_id', 1)->get()->pluck('user_id');
        $users = User::whereIn('id', $userRole)->get();
        return view('students.createRules.createWithRole', compact('users'));
    }

    public function storeStudent(RegisterStudentFormRequest $request) //CREATE new student account
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
                    'role_id' => 2
                ]);
            }
            return redirect()->route('student.index')->with('success', 'Aluno criado com sucesso!');
        }
    }

    public function updateRole(RegisterStudentFormRequest $request) //Upadate in ROLE TO STUDENT
    {
        if ($request) {
            $userId = $request->userId;
            $teacherRole = UserRole::where('user_id', $userId)->first();
            $teacherRole->update(['role_id' => 2]);
            return redirect()->route('student.index')->with('success', 'Aluno vinculado com sucesso!');
        }
        return redirect()->route('student.index')->with('fails', 'Opção inválida! Selecione a opção correta.');
    }

    public function updateStudent(UpdateStudentFormRequest $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            $userRole = UserRole::where('user_id', $user->id)->first();
            if ($userRole->role_id == 1) {
                return redirect()->route('student.index')->with('fails', 'Aluno não foi encontrado!');
            }
            $user->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
            return redirect()->route('student.index')->with('success', 'Aluno atualizado com sucesso!');
        };
        return redirect()->route('student.index')->with('fails', 'Esse aluno não foi encontrado!');
    }

    public function unlinkStudent($id) //UNLINK student from role teacher
    {
        $user = User::find($id);
        if ($user) {
            $userRole = UserRole::where('user_id', $user->id)->first();
            if ($userRole->role_id == 1) {
                return redirect()->route('student.index')->with('fails', 'Essa conta já está desvinculada!');
            }
            $studentRole = UserRole::where('user_id', $user->id)->first();
            $studentRole->update(['role_id' => 1]);
            return redirect()->route('student.index')->with('success', 'Aluno desvinculado com sucesso!');
        }
        return redirect()->route('student.index')->with('fails', 'Não foi possível desvincular essa conta!');
    }
}
