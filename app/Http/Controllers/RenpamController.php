<?php

namespace App\Http\Controllers;

use App\Models\Renpam;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RenpamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getAll = Renpam::all();
        return view('renpam.index', [
            'renpam' => $getAll,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('renpam.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $renpamI = new Renpam();
            $renpamI->tanggal = $request->tanggal;
            $renpamI->giat_pam = $request->giat_pam;
            $renpamI->dokumen = $request->dokumen;
            $renpamI->save();

            DB::commit();
            return redirect('/renpam')->with(
                'status',
                'Data berhasil ditambahkan'
            );
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(
                [
                    'message' => 'Internal error',
                    'code' => 500,
                    'error' => true,
                    'errors' => $e,
                ],
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $getData = Renpam::findOrFail($id);

        return view('renpam.show', [
            'renpam' => $getData,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $getData = Renpam::findOrFail($id);
        return view('renpam.edit', [
            'renpam' => $getData,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $getData = Renpam::findOrFail($id);
            $getData->tanggal = $request->tanggal;
            $getData->giat_pam = $request->giat_pam;
            $getData->dokumen = $request->dokumen;
            $getData->save();
            return redirect('/renpam')->with('status', 'Berhasil di ubah');
        } catch (Exception $e) {
            return response()->json(
                [
                    'message' => 'Internal error',
                    'code' => 500,
                    'error' => true,
                    'errors' => $e,
                ],
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            Renpam::destroy($request->id);
            return redirect('/renpam')->with(
                'status',
                'Data berhasil di hapus'
            );
        } catch (Exception $e) {
            return response()->json(
                [
                    'message' => 'Internal error',
                    'code' => 500,
                    'error' => true,
                    'errors' => $e,
                ],
            );
        }
    }
}

