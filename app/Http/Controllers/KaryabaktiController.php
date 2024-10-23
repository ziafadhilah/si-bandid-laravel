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
        // Validasi data
        $request->validate([
            'sas' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'dokumen' => 'required|file|mimes:pdf,doc,docx|max:2048', // Validasi dokumen
        ]);
    
        // Menyimpan file jika ada file yang diupload
        if ($request->hasFile('dokumen')) {
            // Simpan file dengan nama unik
            $fileName = time() . '_' . $request->file('dokumen')->getClientOriginalName();
            $filePath = $request->file('dokumen')->storeAs('uploads', $fileName, 'public');
        }
    
        // Simpan data ke database
        $karyabakti = new Karyabakti();
        $karyabakti->sas = $request->input('sas');
        $karyabakti->tanggal = $request->input('tanggal');
        $karyabakti->dokumen = $filePath ?? null;  // Simpan path dokumen jika ada
        $karyabakti->save();
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('ter.karyabakti.index')->with('success', 'Data berhasil ditambahkan');
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
        // Validasi input
        $request->validate([
            'sas' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'dokumen' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // Dokumen tidak harus diisi
        ]);
    
        try {
            // Cari data yang akan diupdate
            $getData = Karyabakti::findOrFail($id);
            $getData->sas = $request->sas;
            $getData->tanggal = $request->tanggal;
    
            // Periksa apakah ada file yang diunggah
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
    
            // Simpan perubahan
            $getData->save();
    
            // Redirect ke halaman index dengan pesan sukses
            return redirect()->route('ter.karyabakti.index')->with('status', 'Berhasil di ubah');
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