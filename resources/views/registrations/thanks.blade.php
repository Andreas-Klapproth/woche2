<x-layouts.app title="danke">

    
    @if(session('kurs'))
        <h1>Danke, {{ session('name') }}! </h1>

        <p> Deine Anmeldung für {{ session('kurs') }} {{ session('teilnahme')  }} ist angekommen </p>
        @if(session('interessen'))
            <p>Interessen:{{ implode(', ', session('interessen')) }}</p>
        @endif

        @if(session('bemerkung'))
            <p>Bemerkung: {{ session('bemerkung') }} </p>
        @endif
    @endif


</x-layouts.app>
