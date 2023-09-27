<?php

namespace App\Http\Controllers;

use App\Models\ScientificPaper;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ScientificpaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scientific=ScientificPaper::all();
        return view('admin.karyailmiah.index',[
            'scientific'=> $scientific
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.karyailmiah.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'required',
            'image'      => 'required',
            'file'       => 'required',
            'year'       => 'required',

        ], [
            'title.required'=>  'Judul Wajib Diisi',
            'image.required'=>  'Gambar Wajib Diisi',
            'file.required' =>  'File Wajib Diisi',
            'year.required' =>  'Tahun Wajib Diisi'
        ]);

        $file=ScientificPaper::saveFile($request);
        $image=ScientificPaper::saveImage($request);
        ScientificPaper::create([
            'title' => $request->title,
            'image' => $image,
            'file'  => $file,
            'year'  => $request->year
        ]);

        if (Auth::check() && Auth::user()->hasRole('guru')) {
            return redirect()->route('guru.scientificpaper.index')->with('success', 'Data Berhasil ditambah');
        }
        return redirect()->route('admin.scientificpaper.index')->with('success', 'Data Berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (DecryptException $e){
            abort(404);
        }

        $scientific=ScientificPaper::find($id);
        // dd($scientific);
        return view('admin.karyailmiah.form', [
            'scientific'    => $scientific
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            // 'file'      => 'required' ,
            'title'     => 'required',
            'year'      => 'required',
        ], [
            // 'file.required' =>  'File Wajib Diisi',
            'title.required'=>  'Judul Wajib Diisi',
            'year.required' =>  'Tahun Wajib Diisi'
        ]);
        
        
        $data =[    
            // 'file'  => $file,
            'title' => $request->title,
            'year'  => $request->year
        ];
        $file = ScientificPaper::saveFile($request);
        if($file) {
            $data['file']=$file;
            ScientificPaper::deleteFile($id);
        }

        $image = ScientificPaper::saveImage($request);
        if($image) {
            $data['image']=$image;
            ScientificPaper::deleteImage($id);
        }
        ScientificPaper::where('id', $id)->update($data);

        if (Auth::check() && Auth::user()->hasRole('guru')) {
            return redirect()->route('guru.scientificpaper.index')->with('success', 'Data berhasil diperbarui');
        }
        return redirect()->route('admin.scientificpaper.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $scientific=ScientificPaper::find($id);
        ScientificPaper::deleteImage($id);
        ScientificPaper::deleteFile($id);
        $scientific->delete();

        return response()->json(['status' =>'Data Telah Dihapus']);
    }

    public function scientificpaperLandingPage(Request $request)
    {
        $search = $request->input('search'); 

        $scientificpaper=Scientificpaper::query()
        ->where('year', 'LIKE', "%$search%")
        ->paginate(5);

        return view('user.Scientificpaper', [
            'scientificpaper' => $scientificpaper
        ]);
    }
}
