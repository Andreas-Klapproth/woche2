<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseController extends Controller
{
    public function index(): View
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function create(): View
    {
        $courses = Course::all();
        return view('courses.create');
    }

    public function store(Request $request): RedirectResponse
    {

        $validated = $request->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'max:500'],
        ]);

        Course::create($validated);

        return redirect()->route('courses.index');
    }

    public function show(Course $course): View
    {
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course): View
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course): RedirectResponse
    {

        $validated = $request->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'max:500'],
        ]);

        $course->update($validated);

        return redirect()->route('courses.index');
    }

    public function destroy(Course $course): RedirectResponse
    {
        $course->delete();

        return redirect()->route('courses.index');
    }

}
