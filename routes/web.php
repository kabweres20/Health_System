<?php

use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ClientController as WebClientController; // Alias for web controller
use App\Http\Controllers\Api\ClientController as ApiClientController; // Alias for API controller

Route::get('/', function () {
    return view('welcome');
});

// Routes for managing programs
Route::resource('programs', ProgramController::class);

// Routes for managing clients (Web)
Route::resource('clients', WebClientController::class);

// Custom route for viewing a single client's profile (Web)
Route::get('clients/{client}/profile', [WebClientController::class, 'profile'])->name('clients.profile');

// Custom route for viewing a single client (Web)
Route::get('clients/{id}', [WebClientController::class, 'show'])->name('clients.show');

// Route for creating a new client (Web)
Route::get('clients/create', [WebClientController::class, 'create'])->name('clients.create');

// Route for editing an existing client (Web)
Route::get('clients/{id}/edit', [WebClientController::class, 'edit'])->name('clients.edit');

// Route for updating an existing client (Web)
Route::put('clients/{id}', [WebClientController::class, 'update'])->name('clients.update');

// Define the route for fetching a client profile (API)
Route::get('api/clients/{client}', [ApiClientController::class, 'show'])->name('api.clients.show');
