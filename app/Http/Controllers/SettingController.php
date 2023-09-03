<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::first();

        return view('admin.setting.index', [
            'setting' => $setting,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function landingPage()
    {
        $setting = Setting::first();

        return view('user.contact',[
            'setting' => $setting
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
        $setting = Setting::first();

        if ($setting) {
            Setting::where('id', $setting->id)
                ->update([
                    'telepon' => $request->telepon,
                    'ig' => $request->ig,
                    'fb' => $request->fb,
                    'yt' => $request->yt,
                    'alamat' => $request->alamat,
                    'email' => $request->email,
                ]);
        } else {
            Setting::create([
                'telepon' => $request->telepon,
                'ig' => $request->ig,
                'fb' => $request->fb,
                'yt' => $request->yt,
                'alamat' => $request->alamat,
                'email' => $request->email,
            ]);
        }

        return redirect()->route('admin.get-setting')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
