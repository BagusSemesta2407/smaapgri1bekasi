<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Banner;
use App\Models\CategoryArticle;
use App\Models\ImageArticle;
use App\Models\Setting;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

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
    public function store(ArticleRequest $request)
    {
        // $image=Article::saveImage($request);
        $article=Article::create([
            'user_id' => auth()->user()->id,
            'category_article_id' => $request->category_article_id,
            'title' =>  $request->title,
            'deskripsi' =>  $request->deskripsi,
            // 'image' => $image,
        ]);

        if ($request->image) {
            foreach ($request->image as $data) {
                $filename=ImageArticle::saveImage($data);
                ImageArticle::create([
                    'article_id' => $article->id,
                    'image' => $filename
                ]);
            }
        }


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
        try {
            $id = Crypt::decryptString($id);
        } catch (DecryptException $e) {
            abort(404);
        }
        $article=Article::find($id);
        $imageArticle=$article->imageArticle->pluck('image_url','id');
        
        $categoryArticle=CategoryArticle::oldest('name')->get();

        return view('admin.article.form',[
            'article'   =>  $article,
            'categoryArticle'   =>  $categoryArticle,
            'imageArticle' => $imageArticle
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $data = [
            'title' =>  $request->title,
            'deskripsi' =>  $request->deskripsi
        ];
        $article->update($data);

        if ($request->old) {
            ImageArticle::deleteImageArray($article->id, $request->old);

            ImageArticle::where('article_id', $article->id)
            ->whereNotIn('id', $request->old)->delete();
        }

        if ($request->image) {
            foreach ($request->image as $data) {
                $filename=ImageArticle::saveImage($data);
                ImageArticle::create([
                    'article_id' => $article->id,
                    'image' => $filename,
                ]);
            }
        }


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

        $imageArticle = [];
        ImageArticle::deleteImageArray($article->id, $imageArticle);

        $article->delete();

        ImageArticle::where('article_id',$article->id)->delete();

        return response()->json(['status' => 'Data Telah Dihapus']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexUser(Request $request)
    {
        $banner = Banner::get();
        
        $setting=Setting::first();

        $filter = (object) [
            'category_article_id' => $request->category_article_id,
        ];

        $article=Article::filter($filter)
        ->latest()
        ->paginate(5);

        $categoryArticle=CategoryArticle::whereHas('article')
        ->get();


        return view('user.article',[
            'banner'    =>  $banner,
            'article'   =>  $article,
            'categoryArticle' => $categoryArticle,
            'setting' => $setting
        ]);
        
    }

    public function detailArticle($id)
    {
        $setting=Setting::first();
        $article=Article::find($id);
        $imageArticle=ImageArticle::where('article_id', $id)
        ->get();

        return view('user.detailArticle', [
            'article'=> $article,
            'imageArticle'=> $imageArticle,
            'setting' => $setting
        ]);
    }
}
