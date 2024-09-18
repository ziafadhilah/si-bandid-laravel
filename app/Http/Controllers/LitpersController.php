<?php

namespace App\Http\Controllers;

use App\Models\Litpers; 
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LitpersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getAll = Litpers::all();
        return view('litpers.index', [
            'litpers' => $getAll,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('litpers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $litpersI = new Litpers();
            $litpersI->name = $request->name;
            $litpersI->pkt = $request->pkt;
            $litpersI->hasil = $request->hasil;
             // Proses upload file
             if ($request->hasFile('dokumen')) {
                $file = $request->file('dokumen');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('public/dokumen', $filename);
                $litpersI->dokumen = $filename;
            }
            $litpersI->save();

            DB::commit();
            return redirect('/litpers')->with(
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
        $getData = Litpers::findOrFail($id);

        return view('litpers.show', [
            'litpers' => $getData,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $getData = Litpers::findOrFail($id);
        return view('litpers.edit', [
            'litpers' => $getData,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $getData = Litpers::findOrFail($id);
            $getData->name = $request->name;
            $getData->pkt = $request->pkt;
            $getData->hasil = $request->hasil;
            $getData->dokumen = $request->dokumen;
            $getData->save();
            return redirect('/litpers')->with('status', 'Berhasil di ubah');
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
            Litpers::destroy($request->id);
            return redirect('/litpers')->with(
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

