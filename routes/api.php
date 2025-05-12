<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\RatingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


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

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Rating Controller to manage ratings for products by user.
Route::middleware('auth:sanctum')->group(function () {
    // List ratings
    Route::post('/ratings', [RatingController::class, 'store']);      // rate
    Route::put('/ratings/{id}', [RatingController::class, 'update']); // update
    Route::delete('/ratings/{id}', [RatingController::class, 'destroy']); // remove

    // Rate a product
    Route::post('/rate-product/{product}', [RatingController::class, 'rateProduct']);

    // Remove a rating
    Route::delete('/remove-rating/{product}', [RatingController::class, 'removeRating']);

    // Change a rating
    Route::put('/change-rating/{product}', [RatingController::class, 'changeRating']);

    // List products with ratings
    Route::get('/products/ratings', [RatingController::class, 'productRatings']);
});

// Patient Controller to manage Patient registration.
Route::post('/patient-registration', [PatientController::class, 'registerPatient']);
