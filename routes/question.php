<?php

Route::get("qws", [App\Http\Controllers\QuestionController::class, 'index'])->name('question.index');
Route::get("qws/create", [App\Http\Controllers\QuestionController::class, 'create'])->name('question.create');
Route::post("qws", [App\Http\Controllers\QuestionController::class, 'store'])->name('question.store');
Route::get("qws/{question}", [App\Http\Controllers\QuestionController::class, 'show'])->name('question.show');
Route::get("qws/{question}/edit", [App\Http\Controllers\QuestionController::class, 'edit'])->name('question.edit');
Route::put("qws/{question}", [App\Http\Controllers\QuestionController::class, 'update'])->name('question.update');
Route::delete("qws/{question}", [App\Http\Controllers\QuestionController::class, 'destroy'])->name('question.destroy');


