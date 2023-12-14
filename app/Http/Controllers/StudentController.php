<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterStudentFormRequest;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index() {

        if (Auth::check()) {

            $userRole = UserRole::where('role_id', 2)->get()->pluck('user_id');
            $users = User::whereIn('id', $userRole)->orderBy('name', 'ASC')->get();

            return view('students.index', compact('users'));
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

            return redirect()->route('students.index')->with('success', 'Aluno criado com sucesso!');
        }
    }

    public function updateRole(Request $request) //Upadate in ROLE TO STUDENT
    {
        $validate = $request->validate([
            'userId' => 'required'
        ], [
            'userId.required' => 'Você precisa selecionar uma opção!'
        ]);

        if (!$validate) {
            return redirect()->route('students.index')->with('errors', 'Opção inválida! Selecione a opção correta.');
        }

        $userId = $request->userId;
        $teacherRole = UserRole::where('user_id', $userId)->first();
        $teacherRole->update(['role_id' => 2]);

        return redirect()->route('students.index')->with('success', 'Aluno vinculado com sucesso!');
    }

    public function updateStudent(Request $request, $id)  //UPDATE data teacher 
    {
        $user = User::find($id);
        if(!isset($user)) {
            return redirect()->route('student.index')->with('errors', 'Não foi possível atualizar.');
        };

        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
        return redirect()->route('student.index')->with('success', 'Professor atualizado com sucesso!');
    }

    public function unlinkStudent($id) //UNLINK teacher from role teacher
    { 
        $user = User::find($id);
        if(!isset($user)) {
            return redirect()->route('student.index')->with('erros', 'Não foi possível apagar essa conta!');
        }

        $userId = $user->id;
        $studentRole = UserRole::where('user_id', $userId)->first();
        $studentRole->update(['role_id' => 1]);

        return redirect()->route('students.index')->with('success', 'Professor excluido com sucesso!');

    }
}
