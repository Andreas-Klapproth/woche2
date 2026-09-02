<x-layouts.app title="Kurs">

    <h1> {{ $course->title }} </h1>
    <p> {{ $course->description }}</p>

    <h2> Anmeldungen {{ $course->registrations->count() }}</h2>
    @forelse($course->registrations as $registration)
        <p>
            <a href="{{route('registrations.show', $registration)}}">{{ $registration->name }}</a>
            ({{ $registration->created_at->format('d.m.Y H:i') }})
            @if($registration->interests->count())
                - Interessen: {{ $registration->interests->pluck('name')->implode(', ') }}
            @endif
        </p>
    @empty
        <p> Noch keine Anmeldungen für den Kurs </p>

    @endforelse
    <br>
    <div class="action-buttons">
        <a href="{{ route('courses.edit', $course) }}" class="btn btn-edit">
            Bearbeiten
        </a>

        <form action="{{ route('courses.destroy', $course) }}" method="POST"
              onsubmit="return confirm('Möchtest du diesen Kurs wirklich löschen?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-delete">Löschen</button>
        </form>
    </div>
    <p><a href="{{ route('courses.index') }}"> Zurück zu allen Kursen </a></p>

</x-layouts.app>
