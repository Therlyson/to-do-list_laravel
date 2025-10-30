<?php

use App\Http\Controllers\TarefaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('tarefas.index');
    }
    return redirect()->route('login');
})->name('home');

Route::get('dashboard', function () {
    return redirect()->route('tarefas.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('tarefas', TarefaController::class);
});

require __DIR__.'/settings.php';