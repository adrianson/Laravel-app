<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name("welcome");

Route::get('/portfolio', function () {
    return view('portfolio');
})->name("portfolio");

