<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Misi;
use App\Models\Setting;
use App\Models\Strategy;
use App\Models\Tujuan;
use App\Models\Visi;

class AboutController extends Controller
{
    public function about()
    {
        $banner = Banner::get();
        $setting=Setting::first();
        $visi = Visi::first();
        $misi = Misi::all();
        $tujuan = Tujuan::all();
        $strategy = Strategy::all();
        
    	return view('user.about',[
            'banner' => $banner,
            'setting' => $setting,
            'visi' => $visi,
            'misi' => $misi,
            'tujuan' => $tujuan,
            'strategy' => $strategy
        ]);
    }
    public function contact()
    {
        $banner = Banner::get();
    	return view('user.contact',[
            'banner' => $banner
        ]);
    }

    public function team()
    {
    	return view('user.team');
    }

    public function testimonial()
    {
    	return view('user.testimonial');
    }

    public function notfound()
    {
    	return view('user.404');
    }
}
