<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\CategoryArticle;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article=Article::get();
        return view('admin.article.index',[
            'article'   =>  $article,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryArticle = CategoryArticle::all();
        return view('admin.article.form',[
            'categoryArticle'   =>  $categoryArticle
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image=Article::saveImage($request);
        Article::create([
            'user_id' => auth()->user()->id,
            'category_article_id' => $request->category_article_id,
            'title' =>  $request->title,
            'deskripsi' =>  $request->deskripsi,
            'image' => $image
        ]);

        return redirect()->route('admin.article.index')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article=Article::find($id);
        
        $categoryArticle=CategoryArticle::oldest('name')->get();

        return view('admin.article.form',[
            'article'   =>  $article,
            'categoryArticle'   =>  $categoryArticle
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'title' =>  $request->title,
            'deskripsi' =>  $request->deskripsi
        ];

        $image = Article::saveImage($request);

        if ($image) {
            $data['image']  =   $image;
            Article::deleteImage($id);
        }

        Article::where('id', $id)->update($data);

        return redirect()->route('admin.article.index')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article=Article::find($id);

        Article::deleteImage($id);

        $article->delete();

        return redirect()->route('')->with('success','Data berhasil dihapus');
    }
}
