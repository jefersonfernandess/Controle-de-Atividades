<?php

namespace App\Http\Controllers;

use App\Models\Dicipline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiciplineController extends Controller
{
    public function index() {
        if (Auth::check()) {
            //Sidebar dependences
            $userAuth = Auth::user();
            $roleUser = $userAuth->UserRole;

            $diciplines = Dicipline::get();
            return view('diciplines.index', compact('diciplines', 'userAuth', 'roleUser'));
        }

        $users = false;
        return view('diciplines.index', compact('users'));
    }

    public function store(Request $request) {
        $validate = $request->validate([
            'name' => 'required|min:3|max:128'
        ], [
            'name.required' => 'O nome é obrigatório!',
            'name.min' => 'O campo nome precisa ter mais que *3* caracteres',
            'name.max' => 'O campo nome precisa ter mais que *128* caracteres'
        ]);

        if(!$validate) {
            return redirect()->back()->with('errors', 'Não foi possível criar a disciplina!');
        }

        Dicipline::create([
            'name' => $request->name
        ]);
        return redirect()->route('diciplines.index')->with('success', 'Disciplina criada com sucesso!');
    }

    public function update(Request $request, $id) {
        $validate = $request->validate([
            'name' => 'required|min:3|max:128'
        ], [
            'name.required' => 'O nome é obrigatório!',
            'name.min' => 'O campo nome precisa ter mais que *3* caracteres'
        ]);

        if(!$validate) {
            return redirect()->back()->with('errors', 'Não foi possível atualizar a disciplina!');
        }

        $dicipline = Dicipline::find($id);
        $dicipline->update($request->all());
        return redirect()->route('diciplines.index')->with('success', 'Disciplina atualizada com sucesso!');
    }

    public function destroy($id) {
        $dicipline = Dicipline::find($id);

        if(!$dicipline) {
            return back()->with('error', 'Não foi possível excluir a disciplína!');
        }

        $dicipline->delete();
        return redirect()->route('diciplines.index')->with('success', 'Disciplina acabada com sucesso!');
    }
}
