<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityResponse;
use App\Models\Dicipline;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function studentActivitiesIndex()
    {
        if (!Auth::check()) {
            $users = false;
            return view('students.activities.index', compact('users', 'activities'));
        }

        $user = Auth::user();
        // $activities = Activity::with(['ActivityResponse' => function($query) use ($user) {
        //     $query->where('user_id', $user->id)->get();
        //     }])->get();

        $activitiesStudentes = Activity::with('ActivityResponse')->whereRelation('ActivityResponse', 'user_id', $user->id)->get();
        $activities = Activity::get();
        return view('students.activities.index', compact('user', 'activitiesStudentes', 'activities'));
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

    public function show($id)
    {
        $activity = Activity::find($id);
        return view('activity.show', compact('activity'));
    }

    public function edit($id)
    {
        $activity = Activity::find($id);
        $diciplines = Dicipline::get();
        return view('activity.edit', compact('activity', 'diciplines'));
    }

    public function update(Request $request, $id)
    {
        $activity = Activity::find($id);

        if (!isset($activity)) {
            return redirect()->back()->with('errors', 'Não foi possível atualizar a atividade!');
        }

        $user = Auth::user();

        if ($request->hasFile('filesActivities')) {

            Storage::disk('public')->delete('storage/' . $activity->filepath);
            $newfilepath = $request->file('filesActivities')->store('filesActivities');
            $activity->update([
                'user_id' => $user->id,
                'dicipline_id' => $request->dicipline,
                'name' => $request->name,
                'filepath' => $newfilepath,
                'description' => $request->editor
            ]);
            return redirect()->route('activity.index')->with('success', 'Atividade atualizada com sucesso!');
        }

        Storage::disk('public')->delete('storage/' . $activity->filepath);
        $activity->update([
            'user_id' => $user->id,
            'dicipline_id' => $request->dicipline,
            'name' => $request->name,
            'filepath' => null,
            'description' => $request->editor
        ]);
        return redirect()->route('activity.index')->with('success', 'Atividade atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $activity = Activity::find($id);

        if (!isset($activity)) {
            return redirect()->back()->with('errors', 'Não foi possível excluir a atividade!');
        }

        Storage::delete('storage/' . $activity->filepath);
        $activity->delete();
        return redirect()->route('activity.index')->with('success', 'Atividade atualizada com sucesso!');
    }
}
