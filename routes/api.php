<?php
use Illuminate\Http\Request;
use App\Http\Controllers\BinarySearchTreeController;
use Illuminate\Support\Facades\Route;


//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');


Route::post('/bst/insert', [BinarySearchTreeController::class, 'insert']);

Route::get('/bst/search', [BinarySearchTreeController::class, 'search']);
