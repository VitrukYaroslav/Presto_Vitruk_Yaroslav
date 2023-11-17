<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [PublicController::class, 'welcome'])->name('welcome');

Route::get('/categoria/{category}', [PublicController::class, 'categoryShow'])->name('categoryShow');

Route::get('/nuovo/articolo', [ArticleController::class, 'create'])->middleware("auth")->name('article.create');

Route::get('/articolo/dettaglio/{article}', [ArticleController::class, 'articleShow'])->name('article.show');

Route::get('/tutti/articoli', [ArticleController::class, 'articleIndex'])->name('article.index');

//profile

Route::get('/profilo', [PublicController::class, 'profile'])->middleware("auth")->name('profile');

// Sezione revisore
Route::get('/revisor/home', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');

Route::patch('/accetta/articolo/{article}', [RevisorController::class, 'acceptArticle'])->middleware('isRevisor')->name('revisor.acceptArticle');

Route::patch('/rifiuta/articolo/{article}', [RevisorController::class, 'rejectArticle'])->middleware('isRevisor')->name('revisor.rejectArticle');

// Sezione per diventare revisore

Route::post('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');

Route::get('/rendi/revisore/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

Route::get('/lavora/con/noi', [RevisorController::class, 'workWithUs'])->name('mail.lavoraConNoi');

// Ricerca Articoli

Route::get('/ricerca/articolo', [PublicController::class, 'searchArticles'])->name('articles.search');

//Lingua

Route::post('lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');