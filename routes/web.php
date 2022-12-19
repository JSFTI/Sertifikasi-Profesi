<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OurClientController;
use Illuminate\Http\Request;
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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/profil', [HomeController::class, 'profile'])->name('index.profile');
Route::get('/visi-misi', [HomeController::class, 'visionMission'])->name('index.visionMission');
Route::get('/produk-kami', [HomeController::class, 'ourProducts'])->name('index.ourProducts');
Route::get('/kontak-kami', [HomeController::class, 'contactUs'])->name('index.contactUs');
Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('index.aboutUs');

Route::get('/klien-kami', [OurClientController::class, 'index'])->name('ourClients');

Route::get('/artikel/{slug}', [ArticleController::class, 'show'])->name('article');
Route::get('/event/{slug}', [ArticleController::class, 'show'])->name('event');
Route::get('/gallery/{slug}', [GalleryController::class, 'show'])->name('gallery');

Route::get('/sign-in', function(){
    return view('profile');
});