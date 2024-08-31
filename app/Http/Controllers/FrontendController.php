<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function getActivityData()
    {
        $getActivityData = Activity::all();
        return view('index', [
            'getActivityData' => $getActivityData
        ]);
    }
}
