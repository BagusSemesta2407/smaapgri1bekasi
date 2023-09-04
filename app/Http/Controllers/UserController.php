<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Article;
use App\Models\User;
use App\Models\Banner;
use App\Models\Gallery;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexUser()
    {
        $banner = Banner::get();
        $gallery = Gallery::get()->take(4);
        $article = Article::get();
        $setting=Setting::first();
        $announcement=Announcement::get()->take(5);
        
        return view('user.index',[
            'banner'    =>  $banner,
            'gallery'   =>  $gallery,
            'article'   =>  $article,
            'setting' => $setting,
            'announcement' => $announcement
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::all();
        return view('admin.user.index',[
            'user'  =>  $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.form');
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
            'nip'              => 'required',
            'name'             => 'required',
            'email'            => 'required|email',
            'password'         => 'required|min:3',
        ], [
            'nip.required'       => 'NIP Wajib Diisi',
            'name.required'      => 'Nama Wajib Diisi',
            'email.required'     => 'Email Wajib Diisi',
            'email.email'        => 'Email Harus Sesuai Format',
            'password.required'  => 'Password Wajib Diisi',
            'password.min'        => 'Password Minimal 3 karakter',
        ]);

        User::create([
            'name'  =>  $request->name,
            'email' =>  $request->email,
            'nip'   =>  $request->nip,
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('admin.user.index')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);

        return view('admin.user.form',[
            'user'  =>  $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nip'              => 'required',
            'name'             => 'required',
            'email'            => 'required|email',
            // 'password'         => 'required|min:3',
        ], [
            'nip.required'       => 'NIP Wajib Diisi',
            'name.required'      => 'Nama Wajib Diisi',
            'email.required'     => 'Email Wajib Diisi',
            'email.email'        => 'Email Harus Sesuai Format',
            // 'password.required'  => 'Password Wajib Diisi',
            // 'password.min'        => 'Password Minimal 3 karakter',
        ]);

        $data = [
            'name'  => $request->name,
            'nip'   => $request->nip,
            'email'     => $request->email,
            // 'password' => Hash::make($request['password']),
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        User::where('id', $id)->update($data);

        return redirect()->route('admin.user.index')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);

        $user->delete();

        return response()->json(['status' => 'Data Telah Dihapus']);
    }

}
