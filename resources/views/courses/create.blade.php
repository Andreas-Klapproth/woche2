<x-layouts.app title="Kurs erstellen">

    <h1> Neuen Kurs anlegen </h1>

    <x-forms.all-errors/>


    <form action="{{route('courses.store')}}" method="POST" novalidate>
        @csrf
        <label for="title"> Titel </label>
        <input type="text" id="title" name="title" value="{{ old('title') }}">
        <x-forms.error name="title"/>

        <label for="description"> Beschreibung </label>
        <textarea id="description" name="description"> {{ old('description') }} </textarea>
        <x-forms.error name="description"/>

        <br>
        <button> Kurs anlegen</button>
    </form>

</x-layouts.app>
