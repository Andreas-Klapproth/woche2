<x-layouts.app title="Kurse">
    <h1> Unsere Kurse </h1>

    @forelse($courses as $course)
        <h2> {{ $course['titel'] }} </h2>
        <p> {{ $course['beschreibung'] }} </p>
    @empty
        <p>Moment keine Kurse </p>
    @endforelse
</x-layouts.app>
