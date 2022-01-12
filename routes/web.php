<?php
    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('/generate-teams', [\App\Http\Controllers\TeamController::class, 'generate'])->name('generateTeams');
