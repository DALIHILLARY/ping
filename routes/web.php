<?php

use App\Mail\DomainDown;
use App\Mail\DomainUp;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Spatie\SslCertificate\SslCertificate;
use App\Models\Domain;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Models\MonitorLog;

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


Auth::routes([
    'register' => false,
]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return redirect()->route('home');
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('domains', App\Http\Controllers\DomainController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('teams', App\Http\Controllers\TeamController::class);

});
Route::resource('maintainers', App\Http\Controllers\MaintainerController::class);