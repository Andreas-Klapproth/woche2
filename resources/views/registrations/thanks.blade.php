<x-layouts.app title="danke">


    @if(session('course'))
        <h1>Danke, {{ session('name') }}! </h1>

        <p> Deine Anmeldung für {{ session('course') }} {{ session('format')  }} ist angekommen </p>
        @if(session('interests'))
            <p>Interessen:{{ implode(', ', session('interests')) }}</p>
        @endif

        @if(session('comment'))
            <p>Bemerkung: {{ session('comment') }} </p>
        @endif
    @endif


</x-layouts.app>
