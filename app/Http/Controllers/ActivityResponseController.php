<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityResponse;

class ActivityResponseController extends Controller
{

    public function index() {

        $activitiesResponse = ActivityResponse::with('activity')->get();
        return view('activityResponse.index', compact('activitiesResponse'));
    }

    public function showActivityResponse($id)
    {
        $activity = Activity::find($id);

        if (isset($activity)) {
            $activitiesResponses = ActivityResponse::where('activity_id', $activity->id)->get();
            return view('activityResponse.show', compact('activitiesResponses'));
        }

        $activitiesResponses = false;
        return view('activityResponse.show', compact('activitiesResponses'));
    }
}
