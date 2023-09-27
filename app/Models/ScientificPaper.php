<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ScientificPaper extends Model
{
    use HasFactory;


    protected $guarded = [
        'id'
    ];


        /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['file_url', 'image_url'];

    /**
     * Save image Owner.
     *
     * @param  $request
     * @return string
     */
    public static function saveFile($request)
    {
        $filename = null;

        if ($request->file) {
            $file = $request->file;

            $ext = $file->getClientOriginalExtension();
            $filename = date('YmdHis') . uniqid() . '.' . $ext;
            $file->storeAs('public/file/scientificpaper/', $filename);
        }

        return $filename;
    }

    /**
     * Get the image owner url.
     *
     * @return string
     */
    public function getFileUrlAttribute()
    {
        if ($this->file) {
            return asset('storage/public/file/scientificpaper/' . $this->file);
        }

        return null;
    }

    /**
     * Delete image.
     *
     * @param  $id
     * @return void
     */
    public static function deleteFile($id)
    {
        $scientific = ScientificPaper::firstWhere('id', $id);
        if ($scientific->file != null) {
            $path = 'public/file/scientificpaper/' . $scientific->file;
            if (Storage::exists($path)) {
                Storage::delete('public/file/scientificpaper/' . $scientific->file);
            }
        }
    }
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
            $file->storeAs('public/image/scientificpaper/', $filename);
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
            return asset('storage/public/image/scientificpaper/' . $this->image);
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
        $scientific = ScientificPaper::firstWhere('id', $id);
        if ($scientific->image != null) {
            $path = 'public/image/scientificpaper/' . $scientific->image;
            if (Storage::exists($path)) {
                Storage::delete('public/image/scientificpaper/' . $scientific->image);
            }
        }
    }
}
