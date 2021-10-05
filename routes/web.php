<?php

use Illuminate\Support\Facades\Route;

Route::get('/documents', function () {
    return view('documents.index');
});
