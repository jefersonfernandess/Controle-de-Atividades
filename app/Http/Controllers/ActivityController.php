<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Dicipline;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{

    public function index()
    {
        if (Auth::check()) {

            $userRole = UserRole::where('role_id', 3)->get()->pluck('user_id');
            $users = User::whereIn('id', $userRole)->orderBy('name', 'ASC')->get();

            $activities = Activity::get();
            return view('activity.index', compact('users', 'activities'));
        }

        $users = false;
        return view('activity.index', compact('users', 'activities'));
    }

    public function create()
    {
        $diciplines = Dicipline::get();
        return view('activity.create', compact('diciplines'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if ($request->filesActivities) {
            $path = $request->file('filesActivities')->store('filesActivities');
            $activities = Activity::create([
                'user_id' => $user->id,
                'dicipline_id' => $request->dicipline,
                'name' => $request->name,
                'filepath' => $path,
                'description' => $request->editor
            ]);

            return redirect()->route('activity.index')->with('success', 'Atividade criada com sucesso!');
        }
        Activity::create([
            'user_id' => $user->id,
            'dicipline_id' => $request->dicipline,
            'name' => $request->name,
            'description' => $request->editor
        ]);
        return redirect()->route('activity.index')->with('success', 'Atividade criada com sucesso!');
    }

    public function show($id) {
        $activity = Activity::find($id);
        return view('activity.show', compact('activity'));
    }

    public function edit($id) {
        $activity = Activity::find($id);
        $diciplines = Dicipline::get();
        return view('activity.edit', compact('activity', 'diciplines'));
    }
}
