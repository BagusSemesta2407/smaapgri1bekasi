<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class CategoryExtracurricular extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    /**
     * Get all of the extracurricular for the CategoryExtracurricular
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function extracurricular(): HasMany
    {
        return $this->hasMany(Extracurricular::class);
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
            $file->storeAs('public/image/categoryExtracurricular/', $filename);
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
            return asset('storage/public/image/categoryExtracurricular/' . $this->image);
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
        $categoryExtracurricular = CategoryExtracurricular::firstWhere('id', $id);
        if ($categoryExtracurricular->image != null) {
            $path = 'public/image/categoryExtracurricular/' . $categoryExtracurricular->image;
            if (Storage::exists($path)) {
                Storage::delete('public/image/categoryExtracurricular/' . $categoryExtracurricular->image);
            }
        }
    }
}
