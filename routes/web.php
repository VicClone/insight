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

Route::group(['middleware' => 'auth'], function() {
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');

    Route::get('/admin/team/add', function() {
        return view('admin.team-add');
    })->name('team-add');

    Route::post(
        '/admin/team/add',
        [App\Http\Controllers\TeamController::class, 'teamAdd']
    )->name('team-add-submit');
});
