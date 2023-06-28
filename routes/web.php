<?php

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


Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
  // view nextproject.blade.php
Route::get('/nextproject', function () {
    // new project

    $nextproject = App\Models\Project::create([
        'ip_address' => request()->ip(),
    ]);
    return view('upwork.nextproject',["nextproject"=>$nextproject]);
});


//add file  question routes
require __DIR__ . "/question.php";
//add file  answer routes
require __DIR__ . "/answer.php";
//add file  topic routes
require __DIR__ . "/topic.php";
//add file  victorina routes
require __DIR__ . "/vict.php";
//add file  page routes
require __DIR__ . "/page.php";
//add file  game routes
require __DIR__ . "/game.php";
//add file  culc routes
require __DIR__ . "/culc.php";


