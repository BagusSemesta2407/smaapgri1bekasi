<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Setting;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcement = Announcement::all();
        return view('admin.pengumuman.index', [
            'announcement'  =>  $announcement
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengumuman.form');
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
            'title'              => 'required',
            'uraian'             => 'required',
        ], [
            'title.required'         => 'Judul Wajib Diisi',
            'uraian.required'        => 'Uraian Wajib Diisi',
        ]);

        $file = Announcement::saveFile($request);
        Announcement::create([
            'title'  =>  $request->title,
            'uraian'  =>  $request->uraian,
            'file' => $file
        ]);

        return redirect()->route('admin.announcement.index')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (DecryptException $e) {
            abort(404);
        }

        $announcement = Announcement::find($id);

        return view('admin.pengumuman.form', [
            'announcement'  => $announcement
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'              => 'required',
            'uraian'             => 'required',
        ], [
            'title.required'         => 'Judul Wajib Diisi',
            'uraian.required'        => 'Uraian Wajib Diisi',
        ]);

        $data = [
            'uraian'  =>  $request->uraian,
            'title'  =>  $request->title,
        ];
        $file = Announcement::saveFile($request);
        if ($file) {
            $data['file'] = $file;
            Announcement::deleteFile($id);
        }

        Announcement::where('id', $id)->update($data);

        return redirect()->route('admin.announcement.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $announcement = Announcement::find($id);

        Announcement::deleteFile($id);
        $announcement->delete();

        return response()->json(['success' => 'Data Telah Dihapus']);
    }

    public function announcementLandingPage(Request $request)
    {
        $setting = Setting::first();
        $search = $request->input('search');

        $announcement = Announcement::query()
            ->latest()
            ->where('title', 'LIKE', "%$search%")
            ->paginate(5);

        return view('user.announcement', [
            'announcement' => $announcement,
            'setting' => $setting
        ]);
    }
    public function detailAnnouncementLandingPage($id)
    {
        $announcement = Announcement::find($id);

        return view('user.detailAnnouncement', [
            'announcement' => $announcement
        ]);
    }
}
