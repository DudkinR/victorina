<?php

Route::get("tpc", [App\Http\Controllers\TopicController::class, 'index'])->name('topic.index');
Route::get("tpc/create", [App\Http\Controllers\TopicController::class, 'create'])->name('topic.create');
Route::post("tpc", [App\Http\Controllers\TopicController::class, 'store'])->name('topic.store');
Route::get("tpc/{topic}", [App\Http\Controllers\TopicController::class, 'show'])->name('topic.show');
Route::get("tpc/{topic}/edit", [App\Http\Controllers\TopicController::class, 'edit'])->name('topic.edit');
Route::put("tpc/{topic}", [App\Http\Controllers\TopicController::class, 'update'])->name('topic.update');
Route::delete("tpc/{topic}", [App\Http\Controllers\TopicController::class, 'destroy'])->name('topic.destroy');
//topic.addquestions
Route::post("tpc/{topic}/addquestions", [App\Http\Controllers\TopicController::class, 'addquestions'])->name('topic.addquestions');


