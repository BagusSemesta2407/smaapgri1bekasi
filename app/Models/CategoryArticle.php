<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CategoryArticle extends Model
{
    use HasFactory;

    protected $guarded =[
        'id'
    ];

    public function article()
    {
        return $this->hasMany(Article::class);
    }

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['image_url'];

    /**
     * Save image Owner.
     *
     * @param  $request
     * @return string
     */
    public static function saveImage($request)
    {
        $filename = null;

        if ($request->image) {
            $file = $request->image;

            $ext = $file->getClientOriginalExtension();
            $filename = date('YmdHis') . uniqid() . '.' . $ext;
            $file->storeAs('public/image/kategoriArtikel/', $filename);
        }

        return $filename;
    }

    /**
     * Get the image owner url.
     *
     * @return string
     */
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/public/image/kategoriArtikel/' . $this->image);
        }

        return null;
    }

    /**
     * Delete image.
     *
     * @param  $id
     * @return void
     */
    public static function deleteImage($id)
    {
        $article = CategoryArticle::firstWhere('id', $id);
        if ($article->image != null) {
            $path = 'public/image/kategoriArtikel/' . $article->image;
            if (Storage::exists($path)) {
                Storage::delete('public/image/kategoriArtikel/' . $article->image);
            }
        }
    }
}
