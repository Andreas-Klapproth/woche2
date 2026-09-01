<x-layouts.app title="Anmeldung">
    <h1>Kursanmeldung</h1>

    {{-- Formular über die neue Named Route 'registrations.store' --}}
    <form action="{{ route('registrations.store') }}" method="POST" novalidate>
        @csrf

        {{-- Vor- und Nachname --}}
        <div>
            <label for="name">Vor- und Nachname</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
            <x-forms.error name="name"/>
        </div>

        {{-- E-Mail --}}
        <div>
            <label for="email">E-Mail</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
            <x-forms.error name="email"/>
        </div>

        {{-- Kursauswahl --}}
        <div>
            <label for="course_id">Kurs</label>
            <select id="course_id" name="course_id">
                <option value="">-- bitte wählen --</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" @selected(old('course_id') == $course->id)>
                        {{ $course->titel }}
                    </option>
                @endforeach
            </select>
            <x-forms.error name="course_id"/>
        </div>

        {{-- Teilnahme --}}
        <div>
            <p>Teilnahme</p>
            <label>
                <input type="radio" name="teilnahme" value="vor_ort" @checked(old('teilnahme') === 'vor_ort')>
                Vor Ort
            </label>
            <label>
                <input type="radio" name="teilnahme" value="online" @checked(old('teilnahme') === 'online')>
                Online
            </label>
            <x-forms.error name="teilnahme"/>
        </div>

        {{-- Datenschutz --}}
        <div>
            <label>
                <input type="checkbox" name="datenschutz" value="1" @checked(old('datenschutz'))>
                Datenschutzbestimmungen akzeptieren
            </label>
            <x-forms.error name="datenschutz"/>
        </div>

        {{-- Wunsch-Startdatum --}}
        <div>
            <label for="startdatum">Wunsch-Startdatum</label>
            <input type="date" id="startdatum" name="startdatum" value="{{ old('startdatum') }}">
            <x-forms.error name="startdatum"/>
        </div>

        {{-- Bemerkung --}}
        <div>
            <label for="bemerkung">Bemerkung</label>
            <textarea id="bemerkung" name="bemerkung">{{ old('bemerkung') }}</textarea>
            <x-forms.error name="bemerkung"/>
        </div>

        {{-- Interessen --}}
        <div>
            <p>Interessen (Mehrfachauswahl möglich)</p>
            @foreach(['Backend', 'Frontend', 'Datenbank', 'Testing'] as $interesse)
                <label>
                    <input type="checkbox" name="interessen[]" value="{{ $interesse }}"
                        @checked(in_array($interesse, old('interessen', [])))>
                    {{ $interesse }}
                </label>
            @endforeach
            <x-forms.error name="interessen"/>
        </div>

        <br>
        <button type="submit">Abschicken</button>
    </form>
</x-layouts.app>
