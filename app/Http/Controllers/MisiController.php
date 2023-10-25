<?php

namespace App\Http\Controllers;

use App\Models\Misi;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class MisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $misi=Misi::all();
        return view('admin.profilSekolah.misi.index', [
            'misi' => $misi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profilSekolah.misi.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'              => 'required',
        ], [
            'name.required'         => 'Misi Wajib Diisi',
        ]);

        Misi::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.misi.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Misi  $misi
     * @return \Illuminate\Http\Response
     */
    public function show(Misi $misi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Misi  $misi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (DecryptException $e) {
            abort(404);
        }
        $misi=Misi::find($id);

        return view('admin.profilSekolah.misi.form', [
            'misi' => $misi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Misi  $misi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'              => 'required',
        ], [
            'name.required'         => 'Visi Wajib Diisi',
        ]);

        $data = [
            'name' => $request->name,
        ];

        Misi::where('id', $id)->update($data);

        return redirect()->route('admin.misi.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Misi  $misi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $misi=Misi::find($id);

        $misi->delete();

        return response()->json(['success' => 'Data Telah Dihapus']);
    }
}
