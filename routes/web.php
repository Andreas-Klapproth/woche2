<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Statische Seiten
Route::get('/', [PageController::class, 'home'])->name('home');

/*
|--------------------------------------------------------------------------
| Course Feature Routen
|--------------------------------------------------------------------------
*/
Route::controller(CourseController::class)->prefix('courses')->as('courses.')->group(function () {

    // 1. Formular & Speichern
    Route::get('/create', 'create')->name('create');               // GET  /courses/create
    Route::post('/', 'store')->name('store');                      // POST /courses

    // 2. Dankesseite (Statische Bestätigung)
    Route::get('/thanks', 'thanks')->name('thanks');               // GET  /courses/thanks

    // 3. Tabellenübersicht
    Route::get('/registrations', 'registrations')->name('registrations');
    Route::get('/', 'index')->name('index');
});
