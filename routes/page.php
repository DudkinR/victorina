<?php

Route::get("page", [App\Http\Controllers\PageController::class, 'index'])->name('page.index');
Route::get("page/create", [App\Http\Controllers\PageController::class, 'create'])->name('page.create');
Route::post("page", [App\Http\Controllers\PageController::class, 'store'])->name('page.store');
Route::get("page/{page}", [App\Http\Controllers\PageController::class, 'show'])->name('page.show');
Route::get("page/{page}/edit", [App\Http\Controllers\PageController::class, 'edit'])->name('page.edit');
Route::put("page/{page}", [App\Http\Controllers\PageController::class, 'update'])->name('page.update');
Route::delete("page/{page}", [App\Http\Controllers\PageController::class, 'destroy'])->name('page.destroy');


