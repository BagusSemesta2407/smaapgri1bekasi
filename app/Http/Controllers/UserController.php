<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Article;
use App\Models\User;
use App\Models\Banner;
use App\Models\Gallery;
use App\Models\Setting;
use App\Models\Extracurricular;
use App\Models\ScientificPaper;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

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
        $extracurricular = Extracurricular::get();
        $scientificPaper = ScientificPaper::get();
        $setting = Setting::first();
        $announcement = Announcement::get()->take(5);

        return view('user.index', [
            'banner'            =>  $banner,
            'gallery'           =>  $gallery,
            'article'           =>  $article,
            'extracurricular'   =>  $extracurricular,
            'scientificPaper'   =>  $scientificPaper,
            'setting'           => $setting,
            'announcement'      => $announcement
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $user = User::all();
        return view('admin.user.index', [
            'user'  =>  $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $role=Role::all();
        return view('admin.user.form' , [
            'role' => $role
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role=Role::findOrFail($request->roles);

        $user=User::create([
            'name'    =>  $request->name,
            'username' =>  $request->username,
            'email'   =>  $request->email,
            'nip'     =>  $request->nip,
            'password' => Hash::make($request['password']),
        ]);

        $user->assignRole($role);

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
        $user = User::find($id);
        $role=Role::all();
        return view('admin.user.form-edit', [
            'user'  =>  $user,
            'role' => $role,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $roles=Role::findOrFail($request->roles);
        $data = [
            'name'     => $request->name,
            'username' => $request->username,
            'nip'      => $request->nip,
            'email'    => $request->email,
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        User::where('id', $user->id)->update($data);
        $user->syncRoles($roles);
        return redirect()->route('admin.user.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return response()->json(['status' => 'Data Telah Dihapus']);
    }
}
