<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemoController;
use App\Http\Controllers\ProfileController;

// ここにメモ一覧を表示するルートを追加
Route::middleware(['auth'])->group(function () {
    Route::get('/', [MemoController::class, 'index'])->name('memos.index');

    Route::get('/memos/create', [MemoController::class, 'create'])->name('memos.create');
    Route::post('/memos', [MemoController::class, 'store'])->name('memos.store');
    Route::get('/memos/{id}/edit', [MemoController::class, 'edit'])->name('memos.edit');
    Route::put('/memos/{id}', [MemoController::class, 'update'])->name('memos.update');
    Route::delete('/memos/{id}', [MemoController::class, 'destroy'])->name('memos.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
