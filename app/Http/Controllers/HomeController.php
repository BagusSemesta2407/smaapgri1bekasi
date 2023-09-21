<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Extracurricular;
use App\Models\ScientificPaper;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        $user               = User::all()->count();
        $article            = Article::all()->count();
        $ekstrakulikuler    = Extracurricular::all()->count();
        $karyailmiah        = ScientificPaper::all()->count();
        return view('admin.dashboard.index',[
            'user'              => $user,
            'article'           => $article,
            'ekstrakulikuler'   => $ekstrakulikuler,
            'karyailmiah'       => $karyailmiah
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getTotalAdmin()
    {
        $admin=User::count();

        return $admin ?? 0;
    }

}
