<x-layouts.app title="Interessen">
    <h1>Interessen</h1>

    <ul class="interest">
        @forelse($interests as $interest)
            <li> {{ $interest['name'] }} </li>
        @empty
            <p>Momentan keine Interessen </p>
        @endforelse
    </ul>

</x-layouts.app>
