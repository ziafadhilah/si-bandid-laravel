<?php

namespace App\Http\Controllers;

use App\Models\Haljol;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HaljolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getAll = Haljol::all();
        return view('haljol.index', [
            'getAll' => $getAll,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('haljol.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'dokumen' => 'required|file|mimes:pdf,doc,docx|max:2048', // Validasi dokumen: hanya PDF, Word, Excel
        ]);
        
        DB::beginTransaction();

        try {
            $haljolI = new Haljol();
            $haljolI->name = $request->name;

            // Proses upload file
            if ($request->hasFile('dokumen')) {
                $file = $request->file('dokumen');
                $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName()); // Membersihkan spasi
                $path = $file->storeAs('public/dokumen', $filename); // Simpan di folder storage/public/dokumen
                $haljolI->dokumen = $filename;
            }

            $haljolI->save();

            DB::commit();
            return redirect('/haljol')->with('status', 'Data berhasil ditambahkan');
        } catch (Exception $e) {
            DB::rollback();
            return back()->withErrors(['error' => 'Gagal menyimpan data: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $getData = Haljol::findOrFail($id);
        return view('haljol.show', [
            'haljol' => $getData,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $getData = Haljol::findOrFail($id);
        return view('haljol.edit', [
            'haljol' => $getData,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'dokumen' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        DB::beginTransaction();

        try {
            $getData = Haljol::findOrFail($id);
            $getData->name = $request->name;

            // Proses upload file jika ada file baru
            if ($request->hasFile('dokumen')) {
                // Hapus file lama
                if ($getData->dokumen) {
                    Storage::delete('public/dokumen/' . $getData->dokumen);
                }

                $file = $request->file('dokumen');
                $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
                $path = $file->storeAs('public/dokumen', $filename);
                $getData->dokumen = $filename;
            }

            $getData->save();

            DB::commit();
            return redirect('/haljol')->with('status', 'Data berhasil diubah');
        } catch (Exception $e) {
            DB::rollback();
            return back()->withErrors(['error' => 'Gagal mengubah data: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        DB::beginTransaction();

        try {
            $haljol = Haljol::findOrFail($request->id);

            // Hapus dokumen jika ada
            if ($haljol->dokumen) {
                Storage::delete('public/dokumen/' . $haljol->dokumen);
            }

            $haljol->delete();

            DB::commit();
            return redirect('/haljol')->with('status', 'Data berhasil dihapus');
        } catch (Exception $e) {
            DB::rollback();
            return back()->withErrors(['error' => 'Gagal menghapus data: ' . $e->getMessage()]);
        }
    }
}
