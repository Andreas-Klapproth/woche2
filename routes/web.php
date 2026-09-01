<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Statische Seiten
Route::get('/', [PageController::class, 'home'])->name('home');

/*
|--------------------------------------------------------------------------
| Course Feature Routen
|--------------------------------------------------------------------------
*/
Route::controller(RegistrationController::class)->prefix('registrations')->as('registrations.')->group(function () {

    // 1. Formular & Speichern
    Route::get('/create', 'create')->name('create');               // GET  /registrations/create
    Route::post('/', 'store')->name('store');                      // POST /registrations

    // 2. Dankesseite (Statische Bestätigung)
    Route::get('/thanks', 'thanks')->name('thanks');               // GET  /registrations/thanks

    // 3. Tabellenübersicht
    Route::get('/', 'index')->name('index');
});


Route::controller(CourseController::class)->prefix('courses')->as('courses.')->group(function () {

    // Alle Kurse
    Route::get('/', 'index')->name('index');
});
