<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityResponseFormRequest;
use App\Http\Requests\ActivityResponseStudentFormRequest;
use App\Models\Activity;
use App\Models\ActivityResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ActivityResponseController extends Controller
{
    public function indexActivityResponses($id)
    {
        $activity = Activity::find($id);

        if (isset($activity)) {
            $activitiesResponses = ActivityResponse::where('activity_id', $activity->id)->get();
            return view('activityResponse.index', compact('activitiesResponses'));
        }

        $activitiesResponses = false;
        return view('activityResponse.index', compact('activitiesResponses'));
    }

    public function showActivityResponse($id)
    {
        $activityResponse = ActivityResponse::find($id);
        return view('activityResponse.show', compact('activityResponse'));
    }

    public function studentActivitiesResponses($id)
    {
        $activity = Activity::find($id);
        if ($activity) {
            $user = Auth::user();
            return view('students.activities.responseActivity', compact('activity', 'user'));
        }
        return back()->with('erros', 'Não foi possível encontrara atividade');
    }

    //for the teacher to correct the activity 
    public function storeActivityResponse(ActivityResponseFormRequest $request, $id)
    {
        $activityResponseStudent = ActivityResponse::find($id);
        if ($request->check == null) {
            $activityResponseStudent->update([
                'note' => $request->note,
                'check' => false
            ]);

            return redirect()->route('responseacty.index', $activityResponseStudent->activity_id);
        }

        $activityResponseStudent->update([
            'note' => $request->note,
            'check' => true
        ]);
        return redirect()->route('responseacty.index', $activityResponseStudent->activity_id);
    }

    //Student's answer
    public function studentActivitiesReponsesStore(ActivityResponseStudentFormRequest $request)
    {

        if ($request->filesActivities) {
            $path = $request->file('filesActivities')->store('filesActivities');
            ActivityResponse::create([
                'user_id' => $request->user,
                'activity_id' => $request->activity_id,
                'check' => false,
                'note' => null,
                'filepath' => $path,
                'description' => $request->editor
            ]);

            return redirect()->route('activity.index')->with('success', 'Atividade respondida com sucesso!');
        }
        ActivityResponse::create([
            'user_id' => $request->user,
            'activity_id' => $request->activity_id,
            'check' => false,
            'note' => null,
            'description' => $request->editor
        ]);
        return redirect()->route('activity.index')->with('success', 'Atividade respondida com sucesso!');
    }

    public function studentRedoAcitivityEdit($id)
    {
        $activityResponse = ActivityResponse::find($id);
        if ($activityResponse->check == false) {
            $userAuth = Auth::user();
            $roleUser = $userAuth->UserRole;
            return view('students.activities.redoActivity', compact('activityResponse', 'userAuth', 'roleUser'));
        }

        return back()->with('erros', 'Você não pode refazer essa atividade!');
    }

    public function studentRedoAcitivityUpdate(Request $request, $id)
    {
        $activityResponse = ActivityResponse::find($id);
        if (isset($activityResponse)) {
            if ($request->filesActivities) {
                $path = $request->file('filesActivities')->store('filesActivities');
                $activityResponse->update([
                    'check' => false,
                    'note' => null,
                    'filepath' => $path,
                    'description' => $request->response
                ]);
                return redirect()->route('site.index')->with('success', 'Atividade respondida com sucesso!');
            }
            $activityResponse->update([
                'check' => false,
                'note' => null,
                'description' => $request->response
            ]);
            return redirect()->route('site.index')->with('success', 'Atividade respondida com sucesso!');
        }
        return back()->with('erros', 'Não foi possível refazer essa ativade, tenten novamente!');
    }
}
