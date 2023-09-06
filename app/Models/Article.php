<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categoryArticle()
    {
        return $this->belongsTo(CategoryArticle::class);
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
            $file->storeAs('public/image/artikel/', $filename);
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
            return asset('storage/public/image/artikel/' . $this->image);
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
        $article = Article::firstWhere('id', $id);
        if ($article->image != null) {
            $path = 'public/image/artikel/' . $article->image;
            if (Storage::exists($path)) {
                Storage::delete('public/image/artikel/' . $article->image);
            }
        }
    }

    public function scopeFilter($query, object $filter)
    {
        $query->when($filter->category_article_id ?? false, fn ($query, $category_article_id) => $query->where('category_article_id', $category_article_id));
    }

}
