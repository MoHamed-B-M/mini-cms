<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/a-propos', function () {
    return view('a-propos', [
        'auteur' => 'Hamma',
        'groupe' => 'MDW32',
    ]);
});
