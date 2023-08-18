<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    Route::get('/', [UserController::class,'indexUser']);
    //User
    Route::get('/about', [AboutController::class,'about'])->name('about');
    Route::get('/contact',[SettingController::class,'landingPage'])->name('landing-page-contact');
    Route::get('/article',[ArticleController::class,'indexUser'])->name('article');
    Route::get('/article/{id}',[ArticleController::class,'detailArticle'])->name('detail-article');
    Route::get('/team',[AboutController::class,'team'])->name('team');
    Route::get('/testimonial',[AboutController::class,'testimonial'])->name('testimonial');
    Route::get('/404',[AboutController::class,'notfound'])->name('404');
    
    Auth::routes();
    Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

    
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
            //route user
            Route::resource('user', UserController::class);

            Route::get('setting', [SettingController::class, 'index'])->name('get-setting');
            Route::post('setting', [SettingController::class, 'store'])->name('post-setting');
        }
    );
 });
});