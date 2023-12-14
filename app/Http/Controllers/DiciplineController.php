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
            $diciplines = Dicipline::get();
            return view('diciplines.index', compact('diciplines'));
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

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required'
        ]);
        $dicipline = Dicipline::find($id);
        $dicipline->update($request->all());
        return redirect()->route('diciplines.index');
    }

    public function destroy($id) {
        $dicipline = Dicipline::find($id);

        if(!isset($dicipline)) {
            return back()->with('error', 'Não foi possível excluir a diciplína!');
        }

        $dicipline->delete();
        return redirect()->route('diciplines.index');
    }
}
