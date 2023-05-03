<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleRestfullController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[\App\Http\Controllers\AccueilController::class,'index'])->name('accueil');

Route::prefix('film')
    ->name('film.')
    ->group(function () {
    Route::get('list',[\App\Http\Controllers\FilmController::class,'afficheFilmListe'])->name('list');
    Route::get('fluxrss',[\App\Http\Controllers\FilmController::class,'fluxRSS'])->name('fluxrss');
    Route::get('article',[\App\Http\Controllers\FilmController::class,'article'])->name('article');
    Route::get('list/genre/{genre}',[\App\Http\Controllers\FilmController::class,'indexGenre'])->name('listGenre');
});

Route::resource("articles", ArticleRestfullController::class) ;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('register', [App\Http\Controllers\Auth\RegisterController::class,'showRegistrationForm'])->name('register');
    Route::post('register', [App\Http\Controllers\Auth\RegisterController::class,'register']);
});
Route::group(['middleware' => ['can:crud articles']], function () {
    Route::get('createarticle', [App\Http\Controllers\Auth\ArticleController::class,'index']);
});



Route::get('/settings/security', function () {
    // Users must confirm their password before continuing...
})->middleware(['auth', 'password.confirm']);
