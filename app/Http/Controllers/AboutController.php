<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class AboutController extends Controller
{
    public function about()
    {
        $banner = Banner::get();
    	return view('user.about',[
            'banner' => $banner
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
