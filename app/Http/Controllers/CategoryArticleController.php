<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryArticleRequest;
use App\Models\CategoryArticle;
use Illuminate\Http\Request;

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
    public function store(CategoryArticleRequest $request)
    {
        CategoryArticle::create([
            'name'  =>  $request->name
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
        $data=[
            'name'  =>  $request->name
        ];

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
        
        $categoryArticle->delete();

        return response()->json(['status' => 'Data Telah Dihapus']);
    }
}
