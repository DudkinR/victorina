<?php

Route::get("vict1", [App\Http\Controllers\VictController::class, 'vict1'])->name('vict.game1');
Route::any("vict2", [App\Http\Controllers\VictController::class, 'vict2'])->name('vict.game2');
Route::any("vict3", [App\Http\Controllers\VictController::class, 'vict3'])->name('vict.game3');
Route::any("vict4", [App\Http\Controllers\VictController::class, 'vict4'])->name('vict.game4');
Route::any("vict5", [App\Http\Controllers\VictController::class, 'vict5'])->name('vict.game5');
Route::any("vict6", [App\Http\Controllers\VictController::class, 'vict6'])->name('vict.game6');
// index   VictController
Route::get("vict", [App\Http\Controllers\VictController::class, 'index'])->name('vict.index');


