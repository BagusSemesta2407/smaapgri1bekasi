<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryArticleRequest;
use App\Models\CategoryArticle;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CategoryArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryArticle = CategoryArticle::all();

        return view('admin.categoryArticle.index',[
            'categoryArticle'   =>  $categoryArticle
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categoryArticle.form');
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
            'name.required'         => 'Kategori Artikel Wajib Diisi',
        ]);

        CategoryArticle::create([
            'name'  =>  $request->name,
        ]);

        return redirect()->route('admin.category-article.index')->with('success','Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryArticle  $categoryArticle
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryArticle $categoryArticle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryArticle  $categoryArticle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (DecryptException $e) {
            abort(404);
        }
        
        $categoryArticle=CategoryArticle::find($id);
        return view('admin.categoryArticle.form',[
            'categoryArticle'   =>  $categoryArticle
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryArticle  $categoryArticle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'              => 'required',
        ], [
            'name.required'         => 'Kategori Artikel Wajib Diisi',
        ]);

        $data=[
            'name'  =>  $request->name
        ];

        // $image = CategoryArticle::saveImage($request);

        // if ($image) {
        //     $data['image']  =   $image;
        //     CategoryArticle::deleteImage($id);
        // }

        CategoryArticle::where('id', $id)->update($data);
        
        return redirect()->route('admin.category-article.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryArticle  $categoryArticle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $categoryArticle=CategoryArticle::find($id);
        
        // CategoryArticle::deleteImage($id);

        $categoryArticle->delete();

        return response()->json(['status' => 'Data Telah Dihapus']);
    }
}
