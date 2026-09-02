<x-layouts.app title="Anmeldungen">

    <h1> Alle Anmeldungen </h1>

    @forelse($registrations as $registration)
        <h2><a href="{{ route('registrations.show', $registration) }}">{{ $registration->name }}
                ({{ $registration->created_at->format('d.m.Y H:i') }}) </a></h2>
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
        @if($registration->interests()->count()>0)
            <p> Interessen: {{ $registration->interests()->pluck('name')->implode(' ,') }} </p>
        @endif

    @empty
        <p> Noch keine Anmeldungen </p>
    @endforelse

</x-layouts.app>
