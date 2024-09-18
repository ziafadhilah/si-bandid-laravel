<?php

namespace App\Http\Controllers;

use App\Models\Haljol;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $request->validate([
            'sas' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'dokumen' => 'required|file|mimes:pdf,doc,docx|max:2048', // Validasi dokumen harus ada
        ]);
        
        DB::beginTransaction();

        try {
            $haljolI = new Haljol();
            $haljolI->name = $request->name;
             // Proses upload file
             if ($request->hasFile('dokumen')) {
                $file = $request->file('dokumen');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('public/dokumen', $filename);
                $haljolI->dokumen = $filename;
            }
            $haljolI->save();

            DB::commit();
            return redirect('/haljol
            ')->with(
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
        try {
            $getData = Haljol::findOrFail($id);
            $getData->name = $request->name;
            $getData->save();
            return redirect('/haljol')->with('status', 'Berhasil di ubah');
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
            Haljol::destroy($request->id);
            return redirect('/haljol')->with(
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
