<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('v1')->group(function () {
    Route::get('/generate-teams', [\App\Http\Controllers\TeamController::class, 'generate'])->name('generateTeams');
    Route::get('/get-teams', [\App\Http\Controllers\TeamController::class, 'getTeams'])->name('getTeams');
    Route::get('/generate-fixture', [\App\Http\Controllers\FixtureController::class, 'generateFixture'])->name('generateFixture');
    Route::get('/get-fixture', [\App\Http\Controllers\FixtureController::class, 'getFixture'])->name('getFixture');
    Route::get('/get-games', [\App\Http\Controllers\GameController::class, 'getGames'])->name('getGames');
});
