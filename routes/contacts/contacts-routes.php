<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::name("contacts.")->group(function() {
    Route::get("/contacts", [ContactController::class, "index"])
        ->name("index");
});