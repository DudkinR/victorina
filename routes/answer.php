<?php

Route::get("ans", [App\Http\Controllers\AnswerController::class, 'index'])->name('answer.index');
Route::get("ans/create", [App\Http\Controllers\AnswerController::class, 'create'])->name('answer.create');
Route::post("ans", [App\Http\Controllers\AnswerController::class, 'store'])->name('answer.store');
Route::get("ans/{answer}", [App\Http\Controllers\AnswerController::class, 'show'])->name('answer.show');
Route::get("ans/{answer}/edit", [App\Http\Controllers\AnswerController::class, 'edit'])->name('answer.edit');
Route::put("ans/{answer}", [App\Http\Controllers\AnswerController::class, 'update'])->name('answer.update');
Route::delete("ans/{answer}", [App\Http\Controllers\AnswerController::class, 'destroy'])->name('answer.destroy');


