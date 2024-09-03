<?php

namespace App\Http\Controllers;

use App\Models\Smt;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SmtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getAll = Smt::all();
        return view('smt.index', [
            'smt' => $getAll,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('smt.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        DB::beginTransaction();

        try {
            $smtI = new Smt();
            $smtI->proses = $request->proses;
            $smtI->no_surat = $request->no_surat;
            $smtI->dokumen = $request->dokumen;
            $smtI->save();

            DB::commit();
            return redirect('/smt')->with(
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
        $getData = Smt::findOrFail($id);

        return view('smt.show', [
            'smt' => $getData,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $getData = Smt::findOrFail($id);
        return view('smt.edit', [
            'smt' => $getData,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $getData = Smt::findOrFail($id);
            $getData->proses = $request->proses;
            $getData->no_surat = $request->no_surat;
            $getData->dokumen = $request->dokumen;
            $getData->save();
            return redirect('/smt')->with('status', 'Berhasil di ubah');
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
            Smt::destroy($request->id);
            return redirect('/smt')->with(
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

