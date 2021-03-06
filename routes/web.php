<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\SpiderController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\TipController;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [PublicController::class,'index'])
    ->name('pubstart');


Route::get('/about', function () {
    return view('publicviews.about');
});
Route::get('/contact', function () {
    return view('publicviews.contact');
});
Route::post('/contact', [PublicController::class,'store'])
    ->name('contact');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('events', EventController::class)
    ->middleware(['auth']);

Route::resource('places', PlaceController::class)
    ->middleware(['auth']);

Route::resource('organizers', OrganizerController::class)
    ->middleware(['auth']);

Route::resource('artists', ArtistController::class)
    ->middleware(['auth']);

Route::resource('links', LinkController::class)
    ->middleware(['auth']);

Route::resource('tips', TipController::class)
    ->middleware(['auth']);

Route::get('/spiders', [SpiderController::class, 'index'])
    ->middleware(['auth']);


