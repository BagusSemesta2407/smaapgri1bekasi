<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class ImageArticle extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    /**
     * Get the article that owns the ImageArticle
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
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
    public static function saveImage($file)
    {
        if ($file) {
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

    public static function deleteImageArray(int $articleId, array $arrayId)
    {
        $imageArticle = ImageArticle::where('article_id', $articleId)
        ->whereNotIn('id', $arrayId)->get();
        if (isset($imageArticle)) {
            foreach ($imageArticle as $image) {
                $path = 'public/image/artikel/' . $image->image;
                if (Storage::exists($path)) {
                    Storage::delete('public/image/artikel/' . $image->image);
                }
            }
        }
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
}
