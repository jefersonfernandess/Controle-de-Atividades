<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityStoreFormRequest;
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

    public function index() //returns view of all activities 
    {
        if (Auth::check()) {
            $userAuth = Auth::user();
            $roleUser = $userAuth->UserRole;
            $activities = Activity::get();
            return view('activity.index', compact('activities', 'userAuth', 'roleUser'));
        }

        $userAuth = false;
        return view('activity.index', compact('activities', 'userAuth'));
    }

    public function create() //returns view to create a new activity 
    {
        $diciplines = Dicipline::get();
        return view('activity.create', compact('diciplines'));
    }

    public function store(ActivityStoreFormRequest $request) //create a new activity
    {  
        $user = Auth::user();
        if ($request->filesActivities) {
            $path = $request->file('filesActivities')->store('filesActivities');
            Activity::create([
                'user_id' => $user->id,
                'dicipline_id' => $request->dicipline,
                'name' => $request->name,
                'filepath' => $path,
                'description' => $request->editor
            ]);
            return redirect()->route('site.index')->with('success', 'Atividade criada com sucesso!');
        }
        Activity::create([
            'user_id' => $user->id,
            'dicipline_id' => $request->dicipline,
            'name' => $request->name,
            'description' => $request->editor
        ]);
        return redirect()->route('site.index')->with('success', 'Atividade criada com sucesso!');
    }

    public function show($id) //show the activity 
    {
        $activity = Activity::find($id);
        return view('activity.show', compact('activity'));
    }

    public function edit($id) //edit the activity
    {
        $activity = Activity::find($id);
        $diciplines = Dicipline::get();
        return view('activity.edit', compact('activity', 'diciplines'));
    }

    public function update(Request $request, $id) //update the activity
    {
        $activity = Activity::find($id);

        if (!$activity) {
            return redirect()->back()->with('errors', 'Atividade não encontrada!');
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

    public function destroy($id) //delete the activity
    {
        $activity = Activity::find($id);
        if ($activity) {
            Storage::delete('storage/' . $activity->filepath);
            $activity->delete();
            return redirect()->back()->with('success', 'Atividade excluida com sucesso!');
        }
        return redirect()->back()->with('errors', 'Não foi possível excluir, atividade não encontrada!');
    }

    public function indexTeacherActivities() //returns view for teachers to see their activities
    {
        if (Auth::user()) {
            $userAuth = Auth::user();
            $roleUser = $userAuth->UserRole;
            $teacherActivities = Activity::where('user_id', $userAuth->id)->get();
            return view('activity.teacherActivities.index', compact('teacherActivities', 'userAuth', 'roleUser'));
        }
        return back()->with('erros', 'Não foi possível acessar as suas atividades!');
    }

    public function indexStudentActivities() //returns view for students to see their activities
    {
        if (Auth::user()) {
            $userAuth = Auth::user();
            $roleUser = $userAuth->UserRole;

            $activityResponseTrue = Activity::with(['ActivityResponse' => function ($query) use ($userAuth) {
                $query->where('user_id', $userAuth->id);
            }])->whereRelation('ActivityResponse', 'user_id', $userAuth->id)->get();
            //dd($activityResponseTrue);

            $activitiesResponseId = $activityResponseTrue->pluck('id');
            $activityResponseFalse = Activity::with('ActivityResponse')->whereNotIn('id', $activitiesResponseId)->get();

            return view('students.activities.index', compact('activityResponseTrue', 'activityResponseFalse', 'userAuth', 'roleUser'));
        }
        dd('deu erro');
        return back()->with('erros', 'Não foi possível acessar as suas atividades!');
    }
}
