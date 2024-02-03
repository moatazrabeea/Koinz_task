<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReadingIntervalController;
use App\Http\Controllers\RecommendationController;

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

// Route for testing Sanctum authentication
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Protected routes using Passport's auth:api middleware
Route::middleware('auth:api')->group(function () {
    // Submit Reading Interval
    Route::post('/submit-reading-interval', [ReadingIntervalController::class, 'submitReadingInterval']);

    // API to calculate the most recommended five books
    Route::get('/get-recommended-books', [RecommendationController::class, 'getRecommendedBooks']);
});

// Signup and login routes
Route::post('/signup', [UserController::class, 'signup']);
Route::post('/login', [UserController::class, 'login'])->name('login');
