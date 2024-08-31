<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getAll = SuratMasuk::all();
        return view('suratmasuk.index', [
            'suratMasuk' => $getAll,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suratmasuk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $suratmasukI = new SuratMasuk();
            $suratmasukI->tanggal = $request->tanggal;
            $suratmasukI->no_surat = $request->no_surat;
            $suratmasukI->asal_surat = $request->asal_surat;
            $suratmasukI->keterangan = $request->keterangan;
            $suratmasukI->dokumen = $request->dokumen;
            $suratmasukI->save();

            DB::commit();
            return redirect('/suratmasuk')->with(
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
        $getData = SuratMasuk::findOrFail($id);

        return view('suratmasuk.show', [
            'suratmasuk' => $getData,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $getData = SuratMasuk::findOrFail($id);
        return view('suratmasuk.edit', [
            'suratmasuk' => $getData,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $getData = SuratMasuk::findOrFail($id);
            $getData->tanggal = $request->tanggal;
            $getData->no_surat = $request->no_surat;
            $getData->asal_surat = $request->asal_surat;
            $getData->keterangan = $request->keterangan;
            $getData->dokumen = $request->dokumen;
            $getData->save();
            return redirect('/suratmasuk')->with('status', 'Berhasil di ubah');
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
            SuratMasuk::destroy($request->id);
            return redirect('/suratmasuk')->with(
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

