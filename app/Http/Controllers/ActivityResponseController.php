<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityResponseFormRequest;
use App\Http\Requests\ActivityResponseStudentFormRequest;
use App\Http\Requests\StudentRedActivityUpdateFormRequest;
use App\Models\Activity;
use App\Models\ActivityResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityResponseController extends Controller
{
    public function indexActivityResponses($id) //returns view for teachers to see the answers to the specific activity
    {

        $activity = Activity::find($id);
        if ($activity) {
            $userAuth = Auth::user();
            $roleUser = $userAuth->UserRole;
            $activitiesResponses = ActivityResponse::where('activity_id', $activity->id)->get();
            return view('activityResponse.index', compact('activitiesResponses', 'userAuth', 'roleUser'));
        }
        $activitiesResponses = false;
        $userAuth = false;
        return view('activityResponse.index', compact('activitiesResponses', 'userAuth'));
    }

    public function showActivityResponse($id) //return only one activity response
    {
        $activityResponse = ActivityResponse::find($id);
        return view('activityResponse.show', compact('activityResponse'));
    }

    public function studentActivitiesResponses($id) //returns the student's answered activity view
    {
        $activity = Activity::find($id);
        if ($activity) {
            $user = Auth::user();
            $userAuth = Auth::user();
            $roleUser = $userAuth->UserRole;
            return view('students.activities.responseActivity', compact('activity', 'user', 'userAuth', 'roleUser'));
        }
        return back()->with('fails', 'Não foi possível encontrara atividade');
    }

    
    public function storeActivityResponse(ActivityResponseFormRequest $request, $id) //for the teacher to correct the activity 
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

    public function studentActivitiesReponsesStore(ActivityResponseStudentFormRequest $request) //the student's answered activity store
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
        return redirect()->route('activitiesStudent.index')->with('success', 'Atividade respondida com sucesso!');
    }

    public function studentRedoAcitivityEdit($id) //returns the view to redo the activity
    {
        $activityResponse = ActivityResponse::find($id);
        if ($activityResponse->check == false) {
            $activity = Activity::where('id', $activityResponse->activity_id)->first();
            $userAuth = Auth::user();
            $roleUser = $userAuth->UserRole;
            return view('students.activities.redoActivity', compact('activityResponse', 'userAuth', 'roleUser', 'activity'));
        }

        return back()->with('fails', 'Você não pode refazer essa atividade!');
    }

    public function studentRedoAcitivityUpdate(StudentRedActivityUpdateFormRequest $request, $id) //store to redo the activity
    {   
        $activityResponse = ActivityResponse::find($id);
        if ($activityResponse) {
            if ($request->filesActivities) {
                $path = $request->file('filesActivities')->store('filesActivities');
                $activityResponse->update([
                    'check' => false,
                    'note' => null,
                    'filepath' => $path,
                    'description' => $request->editor
                ]);
                return redirect()->route('site.index')->with('success', 'Atividade respondida com sucesso!');
            }
            $activityResponse->update([
                'check' => false,
                'note' => null,
                'description' => $request->editor
            ]);
            return redirect()->route('site.index')->with('success', 'Atividade respondida com sucesso!');
        }
        return back()->with('fails', 'Não foi possível refazer essa ativade, tenten novamente!');
    }
}
