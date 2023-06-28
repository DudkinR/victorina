<?php

Route::get("game", [App\Http\Controllers\GameController::class, 'index'])->name('game.index');
Route::get("game/create", [App\Http\Controllers\GameController::class, 'create'])->name('game.create');
Route::post("game", [App\Http\Controllers\GameController::class, 'store'])->name('game.store');
Route::get("game/{game}", [App\Http\Controllers\GameController::class, 'show'])->name('game.show');
Route::get("game/{game}/edit", [App\Http\Controllers\GameController::class, 'edit'])->name('game.edit');
Route::put("game/{game}", [App\Http\Controllers\GameController::class, 'update'])->name('game.update');
Route::delete("game/{game}", [App\Http\Controllers\GameController::class, 'destroy'])->name('game.destroy');


