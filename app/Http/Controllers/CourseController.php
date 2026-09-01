<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseController extends Controller
{
    private array $courses = [
        ['titel' => 'Laravel-Basis', 'beschreibung' => 'Erste Schritte in Laravel'],
        ['titel' => 'IT-Basics', 'beschreibung' => 'Erste Schritte am PC'],
        ['titel' => 'Web-Basis', 'beschreibung' => 'Erste Schritte im Internet'],
    ];

    // Übersicht aller Kurse: GET /courses
    public function index(): View
    {
        return view('courses.index', ['courses' => $this->courses]);
    }

    // Formular für Kursanmeldung anzeigen: GET /courses/create (oder /courses/join)
    public function create(): View
    {
        return view('courses.create', ['courses' => $this->courses]);
    }

    // Anmeldung verarbeiten & speichern: POST /courses
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email'],
            'kurs' => ['required', 'string'],
            'teilnahme' => ['required', 'in:vor_ort,online'],
            'datenschutz' => ['accepted'],
            'startdatum' => ['nullable', 'date'],
            'bemerkung' => ['nullable', 'string', 'max:500'],
            'interessen' => ['nullable', 'array'],
        ]);

        // Nur die in $fillable definierten Spalten des Models werden gespeichert
        Registration::create($validated);

        return redirect()->route('courses.thanks')->with([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'kurs' => $validated['kurs'],
            'teilnahme' => $validated['teilnahme'],
            'startdatum' => $validated['startdatum'] ?? null,
            'bemerkung' => $validated['bemerkung'] ?? null,
            'interessen' => $validated['interessen'] ?? [],
        ]);
    }

    // Bestätigungsseite anzeigen: GET /courses/danke
    public function thanks(): View
    {
        return view('courses.thanks');
    }

    // Liste aller Anmeldungen anzeigen: GET /courses/registrations
    public function registrations(): View
    {
        $registrations = Registration::latest('id')->get();
        return view('courses.registrations', compact('registrations'));
    }
}
