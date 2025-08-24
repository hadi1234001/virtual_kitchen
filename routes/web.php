<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StateController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\SubTypeController;
use App\Http\Controllers\PlateController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/test-post', function () {
    return response()->json([
        'status' => true,
        'message' => 'It works!'
    ]);
})->withoutMiddleware(VerifyCsrfToken::class);


//=Admin=//
Route::post('/admin/login', [AdminController::class, 'login'])->withoutMiddleware(VerifyCsrfToken::class);
Route::middleware(['api', 'auth:api_admins'])
    ->withoutMiddleware(VerifyCsrfToken::class)
    ->group(function () {
        Route::post('/admin/logout', [AdminController::class, 'logout']);
        Route::get('/admin/me',     [AdminController::class, 'me']);
        Route::put('/admin/update', [AdminController::class, 'update']);
    });

//=States=//
Route::withoutMiddleware(VerifyCsrfToken::class)->group(function () {
    Route::get('/states',             [StateController::class, 'index']);
    Route::post('/states',            [StateController::class, 'store']);
    Route::get('/states/{id}',        [StateController::class, 'show']);
    Route::put('/states/{id}',        [StateController::class, 'update']);
    Route::delete('/states/{id}',     [StateController::class, 'destroy']);
});


//=Type=//
Route::withoutMiddleware(VerifyCsrfToken::class)->group(function () {
Route::get('/types',[TypeController::class, 'index']);
Route::post('/types',[TypeController::class, 'store']);
Route::get('/types/{id}',[TypeController::class, 'show']);
Route::put('/types/{id}',[TypeController::class, 'update']);
Route::delete('/types/{id}',[TypeController::class, 'destroy']);
Route::get('/types/{id}/sub-types',[TypeController::class, 'getSubTypes']);
});


//=Vehicle=//
Route::withoutMiddleware(VerifyCsrfToken::class)->group(function () {
Route::get('/vehicles',        [VehicleController::class, 'index']);
Route::post('/vehicles',       [VehicleController::class, 'store']);
Route::get('/vehicles/{id}',   [VehicleController::class, 'show']);
Route::put('/vehicles/{id}',   [VehicleController::class, 'update']);
Route::delete('/vehicles/{id}',[VehicleController::class, 'destroy']);
});


//=SubType=//
Route::withoutMiddleware(VerifyCsrfToken::class)->group(function () {
Route::get('/sub-types',                [SubTypeController::class, 'index']);
Route::post('/sub-types',               [SubTypeController::class, 'store']);
Route::get('/sub-types/{id}',           [SubTypeController::class, 'show']);
Route::put('/sub-types/{id}',           [SubTypeController::class, 'update']);
Route::delete('/sub-types/{id}',        [SubTypeController::class, 'destroy']);
Route::get('/sub-types/{id}/plates',    [SubTypeController::class, 'getPlates']);
});


//=Plate=//
Route::withoutMiddleware(VerifyCsrfToken::class)->group(function () {
Route::get('/plates',[PlateController::class, 'index']);
Route::post('/plates',         [PlateController::class, 'store']);
Route::get('/plates/{id}',     [PlateController::class, 'show']);
Route::put('/plates/{id}',     [PlateController::class, 'update']);
Route::delete('/plates/{id}',  [PlateController::class, 'destroy']);
});
