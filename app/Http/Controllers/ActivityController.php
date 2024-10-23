<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     
    public function index(Request $request) // Tambahkan Request $request
    {
        // Mencari kegiatan berdasarkan search query
        $search = $request->input('search');
        
        if ($search) {
            $activities = Activity::where('name', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->orderBy('date', 'asc')
                ->get();
        } else {
            $activities = Activity::orderBy('date', 'asc')->get();
        }

        return view('activity.index', ['activities' => $activities]); // Pindahkan return ke sini
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('activity.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $activity = new Activity();
            $activity->name = $request->name;
            $activity->description = $request->description;
            $activity->date = $request->date;
            $activity->starttime = $request->starttime;
            $activity->endtime = $request->endtime;
            $activity->enddate = $request->enddate;
            $activity->save();

            DB::commit();
            return redirect('/activity')->with('status', 'Data berhasil ditambahkan');
        } catch (Exception $e) {
            DB::rollback();
            return response()->json([
                'message' => 'Internal error',
                'code' => 500,
                'error' => true,
                'errors' => $e,
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $activity = Activity::find($id);
        if (!$activity) {
            return redirect('/activity')->with('error', 'Activity not found.');
        }
        return view('activity.show', compact('activity')); // Sesuaikan nama view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $activity = Activity::find($id);
        if (!$activity) {
            return redirect('/activity')->with('error', 'Activity not found.');
        }
        return view('activity.edit', compact('activity')); // Sesuaikan nama view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $activity = Activity::findOrFail($id);
            $activity->name = $request->name;
            $activity->description = $request->description;
            $activity->date = $request->date;
            $activity->starttime = $request->starttime;
            $activity->endtime = $request->endtime;
            $activity->enddate = $request->enddate;
            $activity->save();
            return redirect('/activity')->with('status', 'Berhasil diubah');
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Internal error',
                'code' => 500,
                'error' => true,
                'errors' => $e,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $activity = Activity::find($id);
        if (!$activity) {
            return redirect('/activity')->with('error', 'Activity not found.');
        }
        $activity->delete();
        return redirect('/activity')->with('success', 'Activity deleted successfully');
    }
}
