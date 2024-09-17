<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   return view(view: 'insert');
})->name('bst.view');

Route::get('/search', function () {
    return view('search'); // Make sure this view exists
});
