<?php

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

Auth::routes();

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/archive', function () {
    return view('pages.archive');
})->name('archive');

Route::get('/magazine/{id}', function () {
    return view('pages.magazine');
})->name('magazine');

Route::get('/article/{id}', function () {
    return view('pages.article');
})->name('article');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');

    Route::get('/admin/team/add', function() {
        return view('admin.team-add');
    })->name('team-add');

    Route::post(
        '/admin/team/add',
        [App\Http\Controllers\TeamController::class, 'teamAdd']
    )->name('team-add-submit');

    Route::get(
        '/admin/team',
        [App\Http\Controllers\TeamController::class, 'teamList']
    )->name('team-list');

    Route::get(
        '/admin/team/{id}',
        [App\Http\Controllers\TeamController::class, 'teamEdit']
    )->name('team-edit');

    Route::post(
        '/admin/team/edit/{id}',
        [App\Http\Controllers\TeamController::class, 'teamEditSubmit']
    )->name('team-edit-submit');

    Route::get(
        '/admin/team/{id}/delete',
        [App\Http\Controllers\TeamController::class, 'teamDelete']
    )->name('team-delete');

    Route::get('/admin/magazine/add', function() {
        return view('admin.magazine-add');
    })->name('magazine-add');

    Route::post(
        '/admin/magazine/add',
        [App\Http\Controllers\MagazineController::class, 'magazineAdd']
    )->name('magazine-add-submit');

    Route::get(
        '/admin/magazine',
        [App\Http\Controllers\MagazineController::class, 'magazineList']
    )->name('magazine-list');

    Route::get(
        '/admin/magazine/{id}',
        [App\Http\Controllers\MagazineController::class, 'magazineEdit']
    )->name('magazine-edit');

    Route::post(
        '/admin/magazine/{id}',
        [App\Http\Controllers\MagazineController::class, 'magazineEditSubmit']
    )->name('magazine-edit-submit');

    Route::get(
        '/admin/magazine/{id}/delete',
        [App\Http\Controllers\MagazineController::class, 'magazineDelete']
    )->name('magazine-delete');

    Route::get(
        '/admin/magazine/{magazineId}/article/add',
        [App\Http\Controllers\ArticleController::class, 'articleAdd']
    )->name('articleAdd');

    Route::post(
        '/admin/magazine/{magazineId}/article/add',
        [App\Http\Controllers\ArticleController::class, 'articleAddSubmit']
    )->name('article-add-submit');

    Route::get(
        '/admin/magazine/{magazineId}/article',
        [App\Http\Controllers\ArticleController::class, 'articleList']
    )->name('article-list');

    Route::get(
        '/admin/magazine/{magazineId}/article/{articleId}',
        [App\Http\Controllers\ArticleController::class, 'articleEdit']
    )->name('article-edit');

    Route::post(
        '/admin/article/{articleId}',
        [App\Http\Controllers\ArticleController::class, 'articleEditSubmit']
    )->name('article-edit-submit');

    Route::get(
        '/admin/article/{articleId}/delete',
        [App\Http\Controllers\ArticleController::class, 'articleDelete']
    )->name('article-delete');

    Route::get(
        '/admin/promo',
        [App\Http\Controllers\PromoController::class, 'promoList']
    )->name('promo-list');

    Route::get(
        '/admin/promo/add',
        [App\Http\Controllers\PromoController::class, 'promoAdd']
    )->name('promo-add');

    Route::post(
        '/admin/promo/add',
        [App\Http\Controllers\PromoController::class, 'promoAddSubmit']
    )->name('promo-add-submit');

    Route::get(
        '/admin/promo/{id}',
        [App\Http\Controllers\PromoController::class, 'promoEdit']
    )->name('promo-edit');

    Route::post(
        '/admin/promo/{id}',
        [App\Http\Controllers\PromoController::class, 'promoEditSubmit']
    )->name('promo-edit-submit');

    Route::get(
        '/admin/promo/{id}/delete',
        [App\Http\Controllers\PromoController::class, 'promoDelete']
    )->name('promo-delete');
});
