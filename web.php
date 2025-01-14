<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name("welcome");

Route::get('/chart', function () {
    $dates = range(1, 30);
    $signups = [];
    for ($x = 0; $x <= 30; $x++) {
        $signups[$x] = rand(0, 100);
    }

    return view('chart')
        ->with("dates", $dates)
        ->with("signups", $signups);
})->name("chart");

Route::get('/portfolio', function () {
    return view('portfolio');
})->name("portfolio");

Route::get('/team', function () {
    $team = array(
        array("name" => "John Johnson", "role" => "CEO", "email" => "j@j.com"),
        array("name" => "Peter Peterson", "role" => "CFO", "email" => "p@j.com"),
        array("name" => "Eric Ericson", "role" => "CTO", "email" => "e@j.com"),
    );

    return view('team')
        ->with("team", $team);
})->name("team");
