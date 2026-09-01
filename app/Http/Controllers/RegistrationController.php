<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Registration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegistrationController extends Controller
{


    // Übersicht aller Kurse: GET /registrations
    public function index(): View
    {
        $registrations = Registration::latest('id')->get();
        return view('registrations.index', compact('registrations'));
    }

    // Formular für Kursanmeldung anzeigen: GET /registrations/create (oder /registrations/join)
    public function create(): View
    {
        return view('registrations.create', ['courses' => Course::orderBy('title')->get()]);
    }

    // Anmeldung verarbeiten & speichern: POST /registrations
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email'],
            'course_id' => ['required', 'exists:courses,id'],
            'teilnahme' => ['required', 'in:vor_ort,online'],
            'datenschutz' => ['accepted'],
            'startdatum' => ['nullable', 'date'],
            'bemerkung' => ['nullable', 'string', 'max:500'],
            'interessen' => ['nullable', 'array'],
        ]);

        // Nur die in $fillable definierten Spalten des Models werden gespeichert
        Registration::create($validated);

        $course = Course::findOrFail($validated['course_id']);

        return redirect()->route('registrations.thanks')->with([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'kurs' => $course->titel,
            'teilnahme' => $validated['teilnahme'],
            'startdatum' => $validated['startdatum'] ?? null,
            'bemerkung' => $validated['bemerkung'] ?? null,
            'interessen' => $validated['interessen'] ?? [],
        ]);
    }

    // Bestätigungsseite anzeigen: GET /registrations/danke
    public function thanks(): View
    {
        return view('registrations.thanks');
    }

}
