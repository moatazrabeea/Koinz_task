<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// API to submit a user reading interval
Route::post('/submit-reading-interval', [\App\Http\Controllers\ReadingIntervalController::class, 'submitReadingInterval']);
// API to calculate the most recommended five books
Route::get('/get-recommended-books', [\App\Http\Controllers\RecommendationController::class, 'getRecommendedBooks']);
