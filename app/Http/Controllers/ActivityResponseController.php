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

    public function showActivityResponse($id) {
        $activityResponse = ActivityResponse::find($id);
        return view('activityResponse.show', compact('activityResponse'));
    }

    public function studentActivitiesResponses($id) {
        $user = Auth::user();
        $activity = Activity::find($id);
        return view('students.activities.responseActivity', compact('activity', 'user'));
    }
    
    public function storeActivityResponse(ActivityResponseFormRequest $request, $id) {
        $activity = ActivityResponse::find($id);
        dd($request->all());
    }

    //Student's answer
    public function studentActivitiesReponsesStore( ActivityResponseStudentFormRequest $request) {

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
}
