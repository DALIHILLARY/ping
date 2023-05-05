<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Spatie\SslCertificate\SslCertificate;
use App\Models\Domain;
use Illuminate\Support\Str;
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
});

Route::get('test2' , function () {
    $domain = Domain::find(14);
    //strip protocol from url https or http
    $domain->url = preg_replace('#^https?://#', '', $domain->url);
    error_log($domain->url);
    $start_time = microtime(true);
    $status_code = 0;
    try{
        Http::withOptions(['verify' => true])->get('http://'.$domain->url);
        $status_code = MonitorLog::STATUS_UP;
        error_log("is upp");
    }
    catch(\Exception $e){
        if(Str::contains($e->getMessage(), 'SSL certificate problem')){
            $status_code = MonitorLog::STATUS_SSL_ERROR;
            error_log("is ssl error");
        }
        if(Str::contains($e->getMessage(), 'Could not resolve host')){
            $status_code = MonitorLog::STATUS_DOWN;
            error_log("is down");
        }
    }
    $end_time = microtime(true);
    $response_time = round(($end_time - $start_time) * 1000);

    // check if last log from this domain has the same status code else create new log
    $latest_log = $domain->latestLog()->where('status_code', $status_code)->first();
    if($latest_log){
        $latest_log->update([
            'response_time' => $response_time
        ]);
    }
    else{
        MonitorLog::create([
            'domain_id' => $domain->id,
            'status_code' => $status_code,
            'response_time' => $response_time
        ]);
    }
    
    if($status_code != MonitorLog::STATUS_UP){
        //mail all persons responsible for this domain
        

    }
    error_log("is done");
    return redirect()->route('home');
});


Route::get('test',  function() {
    try{
        $response = Http::withOptions(['verify' => true])->get('http://waptrick.one');
        // $status_code = MonitorLog::STATUS_UP;
        $certificate = SslCertificate::createForHostName('http://skassociates.ug');

        dd($certificate);
    }
    catch(\Exception $e){
        dd($e->getMessage());
        // if(Str::contains($e->getMessage(), 'SSL certificate problem')){
        //     $status_code = MonitorLog::STATUS_SSL_ERROR;
        // }
        // if(Str::contains($e->getMessage(), 'Could not resolve host')){
        //     $status_code = MonitorLog::STATUS_DOWN;
        // }
    }
});
Route::resource('teams', App\Http\Controllers\TeamController::class);