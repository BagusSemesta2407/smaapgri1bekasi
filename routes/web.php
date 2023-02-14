<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryArticleController;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'prevent-back-history'],function(){
	Route::get('/', function () {
        return view('welcome');
    });
    
    Auth::routes();
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
 Route::middleware('auth')->group(function()
 {
    Route::group(
        [
            'as'    =>  'admin.',
            'prefix'    =>  'admin'
        ],

        function(){
            //route category artikel
            Route::resource('category-article', CategoryArticleController::class);
            //route article
            Route::resource('article', ArticleController::class);
            //route pengumuman
            Route::resource('announcement', AnnouncementController::class);
            //route galeri
            Route::resource('gallery', GalleryController::class);
            //route banner
            Route::resource('banner', BannerController::class);
            //route agenda
            Route::resource('agenda', AgendaController::class);
        }
    );
 });
