<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::name("events.")->group(function() {
    Route::get("/events", [EventController::class, "index"])
        ->name("index");
});