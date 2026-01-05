<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\SpiderController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\TipController;
use App\Http\Controllers\AboutController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
   return $request->user();
});

Route::get('/', [PublicController::class,'index'])
    ->name('pubstart');


/*Route::get('/about', function () {
    return view('publicviews.about');
});*/
Route::get('/about', [AboutController::class,'index']);

Route::get('/contact', function () {
    return view('publicviews.contact');
});
Route::post('/contact', [PublicController::class,'store'])
    ->name('contact');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    $lastday = DB::table('statistics')->latest('date')->first();
    $lastdaynumber = $lastday->number;
    $rows = DB::table('statistics')->count();
    $sum = DB::table('statistics')->sum('number');
    $average = $sum / $rows;
    $average = round($average, 1);
    return view('dashboard')->with('lastdaynumber', $lastdaynumber ?? '')->with('average', $average ?? '');
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

Route::get('/about/edit', [AboutController::class,'edit'])
    ->middleware(['auth']);

Route::patch('/about/update', [AboutController::class,'update'])
    ->middleware(['auth'])->name('about.update');

Route::get('/spiders', [SpiderController::class, 'index'])
    ->middleware(['auth']);


