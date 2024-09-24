<?php

namespace App\Http\Controllers;

use App\Models\Karyabakti;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KaryabaktiController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getAll = Karyabakti::all();
        return view('ter.karyabakti.index', [
            'karyabakti' => $getAll,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ter.karyabakti.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'sas' => 'required',
            'tanggal' => 'required|date',
            'dokumen' => 'required|mimes:pdf,doc,docx,xls,xlsx|max:2048',
        ]);

        // Menyimpan file
        if ($request->hasFile('dokumen')) {
            $fileName = time() . '_' . $request->file('dokumen')->getClientOriginalName();
            $filePath = $request->file('dokumen')->storeAs('uploads', $fileName, 'public');

            // Simpan path ke database
            $karyabaktiI = new Karyabakti();
            $karyabaktiI->sas = $request->input('sas');
            $karyabaktiI->tanggal = $request->input('tanggal');
            $karyabaktiI->dokumen = $filePath;
            $karyabaktiI->save();
        }

        return redirect()->back()->with('success', 'File berhasil diunggah');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $getData = Karyabakti::findOrFail($id);

        return view('ter.karyabakti.show', [
            'karyabakti' => $getData,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $getData = Karyabakti::findOrFail($id);
        return view('ter.karyabakti.edit', [
            'karyabakti' => $getData,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'sas' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'dokumen' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        try {
            $getData = Karyabakti::findOrFail($id);
            $getData->sas = $request->sas;
            $getData->tanggal = $request->tanggal;
            $getData->dokumen = $request->dokumen;

            if ($request->hasFile('dokumen')) {
                // Hapus file lama jika ada
                if ($getData->dokumen) {
                    Storage::delete('public/dokumen/' . $getData->dokumen);
                }

                $file = $request->file('dokumen');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('public/dokumen', $filename);
                $getData->dokumen = $filename;
            }
            $getData->save();
            return redirect('/ter/karyabakti')->with('status', 'Berhasil di ubah');
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
    public function destroy($id)
    {
        try {
            // Temukan data berdasarkan ID
            $getData = Karyabakti::findOrFail($id);

            // Hapus file dokumen terkait jika ada
            if ($getData->dokumen) {
                Storage::delete('public/dokumen/' . $getData->dokumen);
            }

            // Hapus data dari database
            $getData->delete();

            // Redirect dengan pesan sukses
            return redirect('/ter/karyabakti')->with('status', 'Data berhasil dihapus');
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

?>