<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * get pinsGet
 * Summary: List pin objects
 * Notes: List all the pin objects, matching optional filters; when no filter is provided, only successful pins are returned
 * Output-Formats: [application/json]
 */
Route::get('/pins', [\App\Http\Controllers\PinsController::class, 'index']);
/**
 * post pinsPost
 * Summary: Add pin object
 * Notes: Add a new pin object for the current access token
 * Output-Formats: [application/json]
 */
Route::post('/pins', [\App\Http\Controllers\PinsController::class, 'store']);
/**
 * get pinsRequestidGet
 * Summary: Get pin object
 * Notes: Get a pin object and its status
 * Output-Formats: [application/json]
 */
Route::get('/pins/{requestid}', [\App\Http\Controllers\PinsController::class, 'show']);
/**
 * delete pinsRequestidDelete
 * Summary: Remove pin object
 * Notes: Remove a pin object
 * Output-Formats: [application/json]
 */
Route::delete('/pins/{requestid}', [\App\Http\Controllers\PinsController::class, 'destroy']);

//
// Route::get('/', function () {
//     return view('welcome');
// });
