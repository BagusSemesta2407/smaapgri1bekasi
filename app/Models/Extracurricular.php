<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Extracurricular extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    /**
     * Get the categoryExtracurricular that owns the Extracurricular
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoryExtracurricular(): BelongsTo
    {
        return $this->belongsTo(categoryExtracurricular::class);
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
            $file->storeAs('public/image/extracurricular/', $filename);
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
            return asset('storage/public/image/extracurricular/' . $this->image);
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
        $extracurricular = Extracurricular::firstWhere('id', $id);
        if ($extracurricular->image != null) {
            $path = 'public/image/extracurricular/' . $extracurricular->image;
            if (Storage::exists($path)) {
                Storage::delete('public/image/extracurricular/' . $extracurricular->image);
            }
        }
    }

    public function scopeFilter($query, object $filter)
    {
        $query->when($filter->category_extracurricuar_id ?? false, fn ($query, $category_extracurricuar_id) => $query->where('category_extracurricuar_id', $category_extracurricuar_id));
    }
}
