<x-layouts.app title="Anmeldung">
    <h1>Kursanmeldung</h1>

    <x-forms.error-overview/>

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
                        {{ $course->title }}
                    </option>
                @endforeach
            </select>
            <x-forms.error name="course_id"/>
        </div>

        {{-- Teilnahme --}}
        <div>
            <p>Teilnahme</p>
            <label>
                <input type="radio" name="format" value="vor_ort" @checked(old('format') === 'vor_ort')>
                Vor Ort
            </label>
            <label>
                <input type="radio" name="format" value="online" @checked(old('format') === 'online')>
                Online
            </label>
            <x-forms.error name="format"/>
        </div>

        {{-- Datenschutz --}}
        <div>
            <label>
                <input type="checkbox" name="gdpr" value="1" @checked(old('gdpr'))>
                Datenschutzbestimmungen akzeptieren
            </label>
            <x-forms.error name="gdpr"/>
        </div>

        {{-- Wunsch-Startdatum --}}
        <div>
            <label for="start_date">Wunsch-Startdatum</label>
            <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}">
            <x-forms.error name="start_date"/>
        </div>

        {{-- Bemerkung --}}
        <div>
            <label for="comment">Bemerkung</label>
            <textarea id="comment" name="comment">{{ old('comment') }}</textarea>
            <x-forms.error name="comment"/>
        </div>

        {{-- Interessen --}}
        <div>
            <p>Interessen (Mehrfachauswahl möglich)</p>
            @foreach($interests as $interest)
                <label>
                    <input type="checkbox" name="interests[]" value="{{ $interest->id }}"
                        @checked(in_array($interest->id, old('interests', [])))>
                    {{ $interest->name }}
                </label>
            @endforeach
            <x-forms.error name="interests"/>
        </div>

        <br>
        <button type="submit">Abschicken</button>
    </form>
</x-layouts.app>
