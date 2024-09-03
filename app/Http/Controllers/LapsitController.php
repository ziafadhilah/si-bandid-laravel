<?php

namespace App\Http\Controllers;

use App\Models\Lapsit; 
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LapsitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getAll = Lapsit::all();
        return view('lapsit.index', [
            'lapsit' => $getAll,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lapsit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $lapsitI = new Lapsit();
            $lapsitI->tanggal = $request->tanggal;
            $lapsitI->uraian_kejadian = $request->uraian_kejadian;
            $lapsitI->keterangan = $request->keterangan;
            $lapsitI->save();

            DB::commit();
            return redirect('/lapsit')->with(
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
        $getData = Lapsit::findOrFail($id);

        return view('lapsit.show', [
            'lapsit' => $getData,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $getData = Lapsit::findOrFail($id);
        return view('lapsit.edit', [
            'lapsit' => $getData,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $getData = Lapsit::findOrFail($id);
            $getData->tanggal = $request->tanggal;
            $getData->uraian_kejadian = $request->uraian_kejadian;
            $getData->keterangan = $request->keterangan;
            $getData->save();
            return redirect('/lapsit')->with('status', 'Berhasil di ubah');
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
            Lapsit::destroy($request->id);
            return redirect('/lapsit')->with(
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

