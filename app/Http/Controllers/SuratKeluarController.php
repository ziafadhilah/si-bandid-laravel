<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getAll = SuratKeluar::all();
        return view('suratkeluar.index', [
            'suratkeluar' => $getAll,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suratkeluar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $suratkeluarI = new SuratKeluar();
            $suratkeluarI->tanggal = $request->tanggal;
            $suratkeluarI->no_surat = $request->no_surat;
            $suratkeluarI->tujuan_surat = $request->tujuan_surat;
            $suratkeluarI->keterangan = $request->keterangan;
            $suratkeluarI->dokumen = $request->dokumen;
            $suratkeluarI->save();

            DB::commit();
            return redirect('/suratkeluar')->with(
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
        $getData = SuratKeluar::findOrFail($id);

        return view('suratkeluar.show', [
            'suratkeluar' => $getData,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $getData = SuratKeluar::findOrFail($id);
        return view('suratkeluar.edit', [
            'suratkeluar' => $getData,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $getData = SuratKeluar::findOrFail($id);
            $getData->tanggal = $request->tanggal;
            $getData->no_surat = $request->no_surat;
            $getData->tujuan_surat = $request->tujuan_surat;
            $getData->keterangan = $request->keterangan;
            $getData->dokumen = $request->dokumen;
            $getData->save();
            return redirect('/suratkeluar')->with('status', 'Berhasil di ubah');
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
            SuratKeluar::destroy($request->id);
            return redirect('/suratkeluar')->with(
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

