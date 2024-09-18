<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getAll = Pengajuan::all();
        return view('pengajuan.index', [
            'pengajuan' => $getAll,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengajuan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $pengajuanI = new Pengajuan();
            $pengajuanI->jenis_pengajuan = $request->jenis_pengajuan;
            $pengajuanI->tujuan = $request->tujuan;
            $pengajuanI->no_surat = $request->no_surat;
             // Proses upload file
             if ($request->hasFile('dokumen')) {
                $file = $request->file('dokumen');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('public/dokumen', $filename);
                $pengajuanI->dokumen = $filename;
            }
            $pengajuanI->save();

            DB::commit();
            return redirect('/pengajuan')->with(
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
        $getData = Pengajuan::findOrFail($id);

        return view('pengajuan.show', [
            'pengajuan' => $getData,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $getData = Pengajuan::findOrFail($id);
        return view('pengajuan.edit', [
            'pengajuan' => $getData,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $getData = Pengajuan::findOrFail($id);
            $getData->jenis_pengajuan = $request->jenis_pengajuan;
            $getData->tujuan = $request->tujuan;
            $getData->no_surat = $request->no_surat;
            $getData->dokumen = $request->dokumen;
            $getData->save();
            return redirect('/pengajuan')->with('status', 'Berhasil di ubah');
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
            Pengajuan::destroy($request->id);
            return redirect('/pengajuan')->with(
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

