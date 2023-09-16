<?php

namespace App\Http\Controllers;

use App\Models\CategoryExtracurricular;
use App\Models\Extracurricular;
use App\Models\User;
use App\Http\Requests\ExtracurricularRequest;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ExtracurricularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $extracurricular = Extracurricular::all();
        // $user=Auth::user()->roles;
        // dd($user);
        return view('admin.extracurricular.index', [
            'extracurricular' => $extracurricular
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryExtracurricular=CategoryExtracurricular::all();
        return view('admin.extracurricular.form', [
            'categoryExtracurricular' => $categoryExtracurricular
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExtracurricularRequest $request)
    {
        $image=Extracurricular::saveImage($request);
        Extracurricular::create([
            'category_extracurricular_id' => $request->category_extracurricular_id,
            'title' => $request->title,
            'image' => $image,
            'deskripsi' => $request->deskripsi
        ]);

        if (Auth::check() && Auth::user()->hasRole('admin')) {
            return redirect()->route('admin.extracurricular.index')->with('success', 'Data Berhasil Ditambahkan');
        }
        return redirect()->route('pembina.extracurricular.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Extracurricular  $extracurricular
     * @return \Illuminate\Http\Response
     */
    public function show(Extracurricular $extracurricular)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Extracurricular  $extracurricular
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (DecryptException $e) {
            abort(404);
        }

        $extracurricular=Extracurricular::find($id);
        $categoryExtracurricular=CategoryExtracurricular::all();

        return view('admin.extracurricular.form', [
            'extracurricular' => $extracurricular,
            'categoryExtracurricular' => $categoryExtracurricular
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Extracurricular  $extracurricular
     * @return \Illuminate\Http\Response
     */
    public function update(ExtracurricularRequest $request, $id)
    {
        $data = [
            'category_extracurricular_id' => $request->category_extracurricular_id,
            'title' => $request->title,
            'deskripsi' => $request->deskripsi
        ];

        $image=Extracurricular::saveImage($request);

        if ($image) {
            $data['image'] = $image;
            Extracurricular::deleteImage($id);
        }

        Extracurricular::where('id', $id)->update($data);

        return redirect()->route('admin.extracurricular.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Extracurricular  $extracurricular
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $extracurricular=Extracurricular::find($id);

        Extracurricular::deleteImage($id);

        $extracurricular->delete();

        return response()->json(['status' => 'Data Telah Dihapus']);
    }
}
