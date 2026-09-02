<x-layouts.app title="Kurs bearbeiten">

    <form action="{{ route('courses.update', $course) }}" method="POST" novalidate>
        @csrf
        @method('PUT')

        <label for="title"> Titel </label>
        <input type="text" id="title" name="title" value="{{ old('title', $course->title) }}">
        <x-forms.error name="title"/>

        <label for="description"> Beschreibung </label>
        <textarea id="description" name="description"> {{ old('description', $course->description) }}</textarea>
        <x-forms.error name="description"/>

        <br>
        <button> Änderungen speichern</button>
    </form>

</x-layouts.app>
