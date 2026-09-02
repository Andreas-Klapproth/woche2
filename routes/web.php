<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\InterestController;
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

    Route::get('/thanks', 'thanks')->name('thanks');               // GET  /registrations/thanks
    // 1. Formular & Speichern
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');               // GET  /registrations/create
    Route::post('/', 'store')->name('store');                      // POST /registrations
    Route::get('/{registration}', 'show')->name('show');
    // Formular zum Bearbeiten anzeigen
    Route::get('/{registration}/edit', 'edit')->name('edit');
    // Änderungen in der DB speichern
    Route::put('/{registration}', 'update')->name('update');
    // Kurs aus DB löschen
    Route::delete('/{registration}', 'destroy')->name('destroy');


    // 2. Dankesseite (Statische Bestätigung)

    // 3. Tabellenübersicht
});


Route::controller(CourseController::class)->prefix('courses')->as('courses.')->group(function () {
    // Alle Kurse anzeigen
    Route::get('/', 'index')->name('index');
    // Neuen Kurs erstellen
    Route::get('/create', 'create')->name('create');
    // Kurs in DB speichern
    Route::post('/', 'store')->name('store');
    // Kurs anzeigen
    Route::get('/{course}', 'show')->name('show');
    // Formular zum Bearbeiten anzeigen
    Route::get('/{course}/edit', 'edit')->name('edit');
    // Änderungen in der DB speichern
    Route::put('/{course}', 'update')->name('update');
    // Kurs aus DB löschen
    Route::delete('/{course}', 'destroy')->name('destroy');
});

Route::controller(InterestController::class)->prefix('interests')->as('interests.')->group(function () {
    // Alle Interessen
    Route::get('/', 'index')->name('index');
});
