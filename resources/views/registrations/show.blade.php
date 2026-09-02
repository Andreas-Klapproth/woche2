<x-layouts.app name="Registrierung">

    <h2> {{ $registration->name }} ({{ $registration->created_at->format('d.m.Y H:i') }}) </h2>
    <dl class="info-grid">
        <dt>Kurs:</dt>
        <a href="{{ route('courses.show', $registration->course) }}">
            <dd>{{ $registration->course->title }}</dd>
        </a>

        <dt>Teilnahme:</dt>
        <dd>{{ $registration->format }}</dd>

        <dt>E-Mail:</dt>
        <dd>{{ $registration->email }}</dd>
    </dl>
    @if($registration->start_date)
        <p> Wunsch-Start: {{ $registration->start_date->format('d.m-Y') }} </p>
    @endif
    @if($registration->comment)
        <p> Bemerkung: {{ $registration->comment }} </p>
    @endif
    <br>
    <div class="action-buttons">
        <a href="{{ route('registrations.edit', $registration) }}" class="btn btn-edit">
            Bearbeiten
        </a>

        <form action="{{ route('registrations.destroy', $registration) }}" method="POST"
              onsubmit="return confirm('Möchtest du deine Anmeldung wirklich löschen?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-delete">Löschen</button>
        </form>
    </div>
    <p><a href="{{ route('registrations.index') }}"> Zurück zu allen Anmeldungen </a></p>
</x-layouts.app>
