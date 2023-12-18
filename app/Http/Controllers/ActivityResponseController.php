<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityResponse;

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
}
