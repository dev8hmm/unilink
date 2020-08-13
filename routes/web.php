<?php

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

Route::get('/', function () {
    return redirect("/admin");
    // return view('welcome');
});
Route::get('/clear-cache',function(){
    Artisan::call("cache:clear");
    Artisan::call("route:clear");
    Artisan::call("view:clear");
    Artisan::call("config:cache");
    Artisan::call("optimize");
    echo "<h2> Cleared cache file</h2>";
});

/* ================== Homepage + Admin Routes ================== */

require __DIR__.'/admin_routes.php';