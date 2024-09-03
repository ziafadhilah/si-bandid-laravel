<?php

namespace App\Http\Controllers;

use App\Models\Bangsus; 
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BangsusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getAll = Bangsus::all();
        return view('bangsus.index', [
            'bangsus' => $getAll,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bangsus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $bangsusI = new Bangsus();
            $bangsusI->bang_sus = $request->bang_sus;
            $bangsusI->no_surat = $request->no_surat;
            $bangsusI->dokumen = $request->dokumen;
            $bangsusI->save();

            DB::commit();
            return redirect('/bangsus')->with(
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
        $getData = Bangsus::findOrFail($id);

        return view('bangsus.show', [
            'bangsus' => $getData,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $getData = Bangsus::findOrFail($id);
        return view('bangsus.edit', [
            'bangsus' => $getData,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $getData = Bangsus::findOrFail($id);
            $getData->bang_sus = $request->bang_sus;
            $getData->no_surat = $request->no_surat;
            $getData->dokumen = $request->dokumen;
            $getData->save();
            return redirect('/bangsus')->with('status', 'Berhasil di ubah');
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
            Bangsus::destroy($request->id);
            return redirect('/bangsus')->with(
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

