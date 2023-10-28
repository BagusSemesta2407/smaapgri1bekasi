<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class ImageExtracurricular extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    /**
     * Get the extracurricular that owns the ImageExtracurricular
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function extracurricular(): BelongsTo
    {
        return $this->belongsTo(Extracurricular::class);
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

    public static function deleteImageArray(int $extracurricularId, array $arrayId)
    {
        $imageExtracurricular = ImageExtracurricular::where('extracurricular_id', $extracurricularId)
            ->whereNotIn('id', $arrayId)->get();
        foreach ($imageExtracurricular as $image) {
            if (isset($image)) {
                $path = 'public/image/extracurricular/' . $image->image;
                if (Storage::exists($path)) {
                    Storage::delete('public/image/extracurricular/' . $image->image);
                }
                $image->delete();
            }
        }
    }
}
