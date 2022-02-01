<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::name("contacts.")->group(function() {
    Route::get("/contacts", [ContactController::class, "index"])
        ->name("index");
    
    Route::view("/contacts/create", "pages.create-contact")
        ->name("create");

    Route::post("/contacts", [ContactController::class, "store"])
        ->name("store");

    Route::get("/contacts/{contactId}/edit", [ContactController::class, "edit"])
        ->name("edit")->whereNumber("contactId");

    Route::put("/contacts/{contactId}", [ContactController::class, "update"])
        ->name("update");
    
    Route::get("/contacts/{contactId}", [ContactController::class, "destroy"])
        ->name("destroy");
});