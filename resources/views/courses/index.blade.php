<x-layouts.app title="Kurse">
    <h1> Unsere Kurse </h1>

    @forelse($courses as $course)
        <h2><a href="{{ route('courses.show', $course) }}">{{ $course['title'] }}</a></h2>
        <p> {{ $course['description'] }} </p>
        <p>Teilnehmer: {{ $course->registrations()->count() }}</p>
    @empty
        <p>Momentan keine Kurse </p>
    @endforelse
</x-layouts.app>
