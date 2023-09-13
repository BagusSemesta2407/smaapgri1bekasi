<?php

namespace App\Http\Controllers;

use App\Models\CategoryExtracurricular;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CategoryExtracurricularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryExtracurricular=CategoryExtracurricular::all();

        return view('admin.categoryExtracurricular.index', [
            'categoryExtracurricular'=>$categoryExtracurricular,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categoryExtracurricular.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image=CategoryExtracurricular::saveImage($request);
        CategoryExtracurricular::create([
            'name' => $request->name,
            'image' => $image
        ]);

        return redirect()->route('admin.category-extracurricular.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryExtracurricular  $categoryExtracurricular
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryExtracurricular $categoryExtracurricular)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryExtracurricular  $categoryExtracurricular
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (DecryptException $e) {
            abort(404);
        }
        $categoryExtracurricular=CategoryExtracurricular::find($id);

        return view('admin.categoryExtracurricular.form', [
            'categoryExtracurricular' => $categoryExtracurricular
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryExtracurricular  $categoryExtracurricular
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
        ];

        $image=CategoryExtracurricular::saveImage($request);

        if ($image) {
            $data['image'] = $image;

            CategoryExtracurricular::deleteImage($id);
        }

        CategoryExtracurricular::where('id', $id)->update($data);

        return redirect()->route('admin.category-extracurricular.index')->with('success', 'Data Berhasail Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryExtracurricular  $categoryExtracurricular
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoryExtracurricular=CategoryExtracurricular::find($id);

        CategoryExtracurricular::deleteImage($id);
        
        $categoryExtracurricular->delete();

        return response()->json(['status' => 'Data Telah Dihapus']);
    }
}
