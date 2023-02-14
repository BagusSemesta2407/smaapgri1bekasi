<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about()
    {
    	return view('user.about');
    }
    public function contact()
    {
    	return view('user.contact');
    }

    public function courses()
    {
    	return view('user.courses');
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
