<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Interest;
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
        return view('registrations.create',
            [
                'courses' => Course::orderBy('title')->get(),
                'interests' => Interest::orderBy('title')->get()
            ]);
    }

    // Anmeldung verarbeiten & speichern: POST /registrations
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email'],
            'course_id' => ['required', 'exists:courses,id'],
            'format' => ['required', 'in:vor_ort,online'],
            'gdpr' => ['accepted'],
            'start_date' => ['nullable', 'date'],
            'comment' => ['nullable', 'string', 'max:500'],
            'interests' => ['nullable', 'array'],
            'interests.*' => ['exists:interests,id'],
        ]);


        $registration = Registration::create($validated);


        if (!empty($validated['interests'])) {
            $registration->interests()->attach($validated['interests']);
        }

        $course = Course::findOrFail($validated['course_id']);

        return redirect()->route('registrations.thanks')->with([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'course' => $course->title,
            'format' => $validated['format'],
            'start_date' => $validated['start_date'] ?? null,
            'comment' => $validated['comment'] ?? null,
            'interests' => Interest::find($validated['interests'] ?? [])->pluck('name'),
        ]);
    }

    public function show(Registration $registration): View
    {
        return view('registrations.show', compact('registration'));
    }

    public function edit(Registration $registration): View
    {
        $courses = Course::all();
        $interests = Interest::all();
        return view('registrations.edit', compact('registration', 'courses', 'interests'));
    }

    public function update(Request $request, Registration $registration): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email'],
            'course_id' => ['required', 'exists:courses,id'],
            'format' => ['required', 'in:vor_ort,online'],
            'start_date' => ['nullable', 'date'],
            'comment' => ['nullable', 'string', 'max:500'],
            'interests' => ['nullable', 'array'],
            'interests.*' => ['exists:interests,id'],
        ]);

        $registration->update($validated);
        $registration->interests()->sync($validated['interests'] ?? []);


        return redirect()->route('registrations.index');
    }

    public function destroy(Registration $registration): RedirectResponse
    {
        $registration->delete();
        return redirect()->route('registrations.index');
    }

    // Bestätigungsseite anzeigen: GET /registrations/danke
    public function thanks(): View
    {
        return view('registrations.thanks');
    }

}
