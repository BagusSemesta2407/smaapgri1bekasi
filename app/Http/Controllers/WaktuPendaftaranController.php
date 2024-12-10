<?php

namespace App\Http\Controllers;

use App\Models\WaktuPendaftaran;
use Illuminate\Http\Request;

class WaktuPendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $waktuPendaftaran = WaktuPendaftaran::all();

        return view('waktuPendaftaran.index', [
            'waktuPendaftaran' => $waktuPendaftaran
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('waktuPendaftaran.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        WaktuPendaftaran::create($request->all());

        return redirect()->route('admin.waktu-pendaftaran.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WaktuPendaftaran  $waktuPendaftaran
     * @return \Illuminate\Http\Response
     */
    public function show(WaktuPendaftaran $waktuPendaftaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WaktuPendaftaran  $waktuPendaftaran
     * @return \Illuminate\Http\Response
     */
    public function edit(WaktuPendaftaran $waktuPendaftaran)
    {
        $waktuPendaftaran =WaktuPendaftaran::find($waktuPendaftaran->id);

        return view('waktuPendaftaran.form', [
            'waktuPendaftaran' => $waktuPendaftaran
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WaktuPendaftaran  $waktuPendaftaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WaktuPendaftaran $waktuPendaftaran)
    {
        WaktuPendaftaran::where('id', $waktuPendaftaran->id)->update($request->except(['_token', '_method']));

        return redirect()->route('admin.waktu-pendaftaran.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WaktuPendaftaran  $waktuPendaftaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(WaktuPendaftaran $waktuPendaftaran)
    {
        $waktuPendaftaran = WaktuPendaftaran::find($waktuPendaftaran->id);

        $waktuPendaftaran->delete();

        return response()->json(['success', 'Data berhasil dihapus']);
    }

    /**
     * Non Aktif / Aktif Waktu Pendaftaran
     **/
    public function status($id)
    {
        $waktuPendaftaran = WaktuPendaftaran::find($id);

        if ($waktuPendaftaran->status == 'Aktif') {
            $waktuPendaftaran->status = 'Non Aktif';
        } else {
            $waktuPendaftaran->status = 'Aktif';
        }

        $waktuPendaftaran->save();

        return response()->json(['success', 'Status Waktu Pendaftaran Telah Diubah!']);
    }
}
