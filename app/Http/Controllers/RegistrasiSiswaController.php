<?php

namespace App\Http\Controllers;

use App\Models\RegistrasiSiswa;
use Illuminate\Http\Request;

class RegistrasiSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registrasiSiswa = RegistrasiSiswa::all();

        return view('registrasi-siswa.index', [
            'registrasiSiswa' => $registrasiSiswa
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegistrasiSiswa  $registrasiSiswa
     * @return \Illuminate\Http\Response
     */
    public function show(RegistrasiSiswa $registrasiSiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegistrasiSiswa  $registrasiSiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(RegistrasiSiswa $registrasiSiswa)
    {
        return view('registrasi-siswa.konfirmasi', [
            'registrasiSiswa' => $registrasiSiswa
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegistrasiSiswa  $registrasiSiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegistrasiSiswa $registrasiSiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegistrasiSiswa  $registrasiSiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegistrasiSiswa $registrasiSiswa)
    {
        //
    }
}
