<?php

use App\Http\Controllers\BookController;
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

# /api
Route::get('/', function () {
    return json_encode(['hello' => 'world']);
});

// ::class prints the FQCN, which is App\Http\Controllers\BookController
Route::get('/books', [BookController::class, 'index']);

Route::get('/books/{book}', [BookController::class, 'show']);


Route::get('/books/{book}/authors/{author}', [BookController::class, 'showAuthor']);

// INDEX: list resources
// SHOW: single resource
// STORE: create a new resource
// UPDATE: updating a resource
// DESTROY: deleting a resource

Route::post ('/books', [BookController::class, 'store']);

// PUT -- the entire object must be provided, meaning any missing fields are updated to null
// PATCH -- change whatever fields are provided, leaving the rest unchanged

Route::patch('/books/{book}', [BookController::class, 'update']);