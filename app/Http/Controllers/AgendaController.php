<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agenda=Agenda::all();
        return view('',[
            'agenda'    =>  $agenda,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Agenda::create([
            'tanggal_awal'  =>  $request->tanggal_awal,
            'tanggal_akhir'  =>  $request->tanggal_akhir,
            'uraian_kegiatan'  =>  $request->uraian_kegiatan,
            'keterangan'  =>  $request->keterangan,
        ]);

        return redirect()->route('')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agenda=Agenda::find($id);

        return view('',[
            'agenda'    =>  $agenda
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agenda $agenda)
    {
        $data=[
            'tanggal_awal'  =>  $request->tanggal_awal,
            'tanggal_akhir'  =>  $request->tanggal_akhir,
            'uraian_kegiatan'  =>  $request->uraian_kegiatan,
            'keterangan'  =>  $request->keterangan,
        ];

        Agenda::where('id', $id)->update($data);

        return redirect()->route('')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        $agenda = Agenda::find($id);

        $agenda->delete();

        return redirect()->route('')->with('success', 'Data berhasil dihapus');
    }
}
