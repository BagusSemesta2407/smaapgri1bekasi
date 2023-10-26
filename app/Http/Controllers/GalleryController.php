<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalleryRequest;
use App\Models\Gallery;
use App\Models\Setting;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery::all();
        return view('admin.gallery.index',[
            'gallery'    =>  $gallery,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.form', );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator=Validator::make($request->all(), [
            "image"         =>      "required|mimes:jpg,png,jpeg|max:500000",
        ]);

        $image=Gallery::saveImage($request);
        Gallery::create([
            'image' => $image,
            'title' => $request->title,
        ]);
        return redirect()->route('admin.gallery.index')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (DecryptException $e) {
            abort(404);
        }
        
        $gallery=Gallery::find($id);
        return view('admin.gallery.form',[
            'gallery'   =>  $gallery,
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=[
            'title' => $request->title,
        ];

        $image = Gallery::saveImage($request);

        if ($image) {
            $data['image']  =   $image;
            Gallery::deleteImage($id);
        }
        
        Gallery::where('id', $id)->update($data);

        return redirect()->route('admin.gallery.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery=Gallery::find($id);

        Gallery::deleteImage($id);
        
        $gallery->delete();

        return response()->json(['success' => 'Data Telah Dihapus']);
    }

    public function galleryLandingPage()
    {
        $setting=Setting::first();
        $gallery =Gallery::all();
        return view('user.gallery', [
            'gallery' => $gallery,
            'setting' => $setting
        ]);
    }
}
