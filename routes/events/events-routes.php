<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::name("events.")->group(function() {
    Route::get("/events", [EventController::class, "index"])
        ->name("index");
    
    Route::get("/events/create", [EventController::class, "create"])
        ->name("create");
    
    Route::post("/events", [EventController::class, "store"])
        ->name("store");
    
    Route::put("/events/{eventId}", [EventController::class, "update"])
        ->name("update");
});