<?php

namespace App\Http\Controllers;

use App\Models\CategoryExtracurricular;
use App\Models\Extracurricular;
use App\Models\User;
use App\Models\Banner;
use App\Models\Setting;
use App\Http\Requests\ExtracurricularRequest;
use App\Models\ImageExtracurricular;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ExtracurricularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $extracurricular = Extracurricular::all();
        // $user=Auth::user()->roles;
        // dd($user);
        return view('admin.extracurricular.index', [
            'extracurricular' => $extracurricular
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryExtracurricular = CategoryExtracurricular::all();
        return view('admin.extracurricular.form', [
            'categoryExtracurricular' => $categoryExtracurricular
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExtracurricularRequest $request)
    {
        // $image=Extracurricular::saveImage($request);
        $extracurricular = Extracurricular::create([
            'category_extracurricular_id' => $request->category_extracurricular_id,
            'title' => $request->title,
            'deskripsi' => $request->deskripsi,
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
        ]);

        if ($request->image) {
            foreach ($request->image as $data) {
                $filename = ImageExtracurricular::saveImage($data);
                ImageExtracurricular::create([
                    'extracurricular_id' => $extracurricular->id,
                    'image' => $filename,
                ]);
            }
        }

        $auth = Auth::user()->getRoleNames()->first();

        if ($auth == 'admin') {
            return redirect()->route('admin.extracurricular.index')->with('success', 'Data Berhasil Ditambahkan');
        }
        return redirect()->route('pembina.extracurricular.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Extracurricular  $extracurricular
     * @return \Illuminate\Http\Response
     */
    public function show(Extracurricular $extracurricular)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Extracurricular  $extracurricular
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (DecryptException $e) {
            abort(404);
        }

        $extracurricular = Extracurricular::find($id);
        $imageExtracurricular = $extracurricular->imageExtracurricular->pluck('image_url', 'id');
        $categoryExtracurricular = CategoryExtracurricular::all();

        return view('admin.extracurricular.form', [
            'extracurricular' => $extracurricular,
            'categoryExtracurricular' => $categoryExtracurricular,
            'imageExtracurricular' => $imageExtracurricular
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Extracurricular  $extracurricular
     * @return \Illuminate\Http\Response
     */
    public function update(ExtracurricularRequest $request, Extracurricular  $extracurricular)
    {
        $data = [
            'category_extracurricular_id' => $request->category_extracurricular_id,
            'title' => $request->title,
            'deskripsi' => $request->deskripsi,
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
        ];

        $extracurricular->update($data);

        if ($request->old) {
            ImageExtracurricular::deleteImageArray($extracurricular->id, $request->old);
            ImageExtracurricular::where('extracurricular_id', $extracurricular->id)
                ->whereNotIn('id', $request->old)->delete();
        }
        if ($request->image) {
            foreach ($request->image as $data) {
                $filename = ImageExtracurricular::saveImage($data);
                ImageExtracurricular::create([
                    'extracurricular_id' => $extracurricular->id,
                    'image' => $filename,
                ]);
            }
        }

        $auth = Auth::user()->getRoleNames()->first();

        if ($auth == 'admin') {
            return redirect()->route('admin.extracurricular.index')->with('success', 'Data Berhasil Ditambahkan');
        }
        return redirect()->route('pembina.extracurricular.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Extracurricular  $extracurricular
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $extracurricular = Extracurricular::find($id);
        $imageExtracurricular = [];
        ImageExtracurricular::deleteImageArray($extracurricular->id, $imageExtracurricular);

        $extracurricular->delete();
        ImageExtracurricular::where('extracurricular_id', $extracurricular->id)->delete();

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

        $setting = Setting::first();

        $categoryExtracurricular=CategoryExtracurricular::all();

        return view('user.extracurricular', [
            'banner'    =>  $banner,
            'categoryExtracurricular' => $categoryExtracurricular,
            'setting' => $setting
        ]);
    }

    public function getCategoryExtracurricular($id)
    {
        $categoryExtracurricular=CategoryExtracurricular::find($id);

        $extracurricular=Extracurricular::where('category_extracurricular_id', $categoryExtracurricular->id)->get();

        return view('user.listKegiatanExtracurricular', [
            'extracurricular' => $extracurricular
        ]);
    }

    public function detailExtracurricular($id)
    {
        $extracurricular = Extracurricular::find($id);
        $imageExtracurricular = ImageExtracurricular::where('extracurricular_id',$id)
        ->get();

        return view('user.detailExtracurricular', [
            'extracurricular' => $extracurricular,
            'imageExtracurricular' => $imageExtracurricular
        ]);
    }
}
