<x-layouts.app title="Anmeldungen">

    <h1> Alle Anmeldungen </h1>

    @forelse($registrations as $registration)
        <h2> {{ $registration->name }} ({{ $registration->created_at->format('d.m.Y H:i') }}) </h2>
        <p>
            Kurs: {{ $registration->course->titel }}
            Teilnahme: {{ $registration->teilnahme }}
            E-Mail: {{ $registration->email }}
        </p>

        @if($registration->startdaum)
            <p> Wunsch-Start: {{ $registration->startdatum->format('d.m-Y') }} </p>
        @endif
        @if($registration->bemerkung)
            <p> Bemerkung: {{ $registration->bemerkung }} </p>
        @endif
    @empty
        <p> Noch keine Anmeldungen </p>
    @endforelse

</x-layouts.app>
