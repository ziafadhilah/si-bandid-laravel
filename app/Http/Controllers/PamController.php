<?php

namespace App\Http\Controllers;

use App\Models\Pam;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getAll = Pam::all();
        return view('pam.index', [
            'pam' => $getAll,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pam.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'proses' => 'required|string|max:255',
            'no_surat' => 'required|string|max:255',
            'dokumen' => 'nullable|file|mimes:pdf,doc,docx|max:4096', // Validasi dokumen tidak wajib
        ]);

        DB::beginTransaction();

        try {
            $pamI = new Pam();
            $pamI->proses = $request->proses;
            $pamI->no_surat = $request->no_surat;

            // Proses upload file
            if ($request->hasFile('dokumen')) {
                $file = $request->file('dokumen');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('public/dokumen', $filename);
                $pamI->dokumen = $filename;
            }

            $pamI->save();

            DB::commit();
            return redirect('/pam')->with('status', 'Data berhasil ditambahkan');
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
        $getData = Pam::findOrFail($id);

        return view('pam.show', [
            'pam' => $getData,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $getData = Pam::findOrFail($id);
        return view('pam.edit', [
            'pam' => $getData,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'proses' => 'required|string|max:255',
            'no_surat' => 'required|string|max:255',
            'dokumen' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // Validasi dokumen tidak wajib
        ]);

        try {
            $getData = Pam::findOrFail($id);
            $getData->proses = $request->proses;
            $getData->no_surat = $request->no_surat;

            if ($request->hasFile('dokumen')) {
                // Hapus file lama jika ada
                if ($getData->dokumen) {
                    Storage::delete('public/dokumen/' . $getData->dokumen);
                }

                // Simpan file baru
                $file = $request->file('dokumen');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('public/dokumen', $filename);
                $getData->dokumen = $filename;
            }

            $getData->save();
            return redirect('/pam')->with('status', 'Data berhasil diubah');
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
        try {
            $getData = Pam::findOrFail($id);

            // Hapus file dokumen terkait jika ada
            if ($getData->dokumen) {
                Storage::delete('public/dokumen/' . $getData->dokumen);
            }

            // Hapus data dari database
            $getData->delete();

            return redirect('/pam')->with('status', 'Data berhasil dihapus');
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Internal error',
                'code' => 500,
                'error' => true,
                'errors' => $e,
            ]);
        }
    }
}
