<x-layouts.app title="Anmeldung bearbeiten">
    <h1>Kursanmeldung bearbeiten</h1>

    <x-forms.all-errors/>

    {{-- Formular über die neue Named Route 'registrations.store' --}}
    <form action="{{ route('registrations.update', $registration) }}" method="POST" novalidate>
        @csrf
        @method('PUT')

        {{-- Vor- und Nachname --}}
        <div>
            <label for="name">Vor- und Nachname</label>
            <input type="text" id="name" name="name" value="{{ $registration->name }}">
            <x-forms.error name="name"/>
        </div>

        {{-- E-Mail --}}
        <div>
            <label for="email">E-Mail</label>
            <input type="email" id="email" name="email" value="{{ $registration->email  }}">
            <x-forms.error name="email"/>
        </div>

        {{-- Kursauswahl --}}
        <div>
            <label for="course_id">Kurs</label>
            <select id="course_id" name="course_id">
                <option value="">-- bitte wählen --</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" @selected($registration->course_id == $course->id)>
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
                <input type="radio" name="format" value="vor_ort" @checked($registration->format === 'vor_ort')>
                Vor Ort
            </label>
            <label>
                <input type="radio" name="format" value="online" @checked($registration->format === 'online')>
                Online
            </label>
            <x-forms.error name="format"/>
        </div>

        {{-- Wunsch-Startdatum --}}
        <div>
            <label for="start_date">Wunsch-Startdatum</label>
            <input type="date" id="start_date" name="start_date" value="{{ $registration->start_Date }}">
            <x-forms.error name="start_date"/>
        </div>

        {{-- Bemerkung --}}
        <div>
            <label for="comment">Bemerkung</label>
            <textarea id="comment" name="comment">{{ $registration->comment }}</textarea>
            <x-forms.error name="comment"/>
        </div>

        {{-- Interessen --}}
        <div>
            <p>Interessen (Mehrfachauswahl möglich)</p>
            @foreach($interests as $interest)
                <label>
                    <input type="checkbox" name="interests[]" value="{{ $interest->id }}"
                        @checked(in_array($interest->id, $registration->interests()->pluck('id')->toArray() ?? []))>
                    {{ $interest->name }}
                </label>
            @endforeach
            <x-forms.error name="interests"/>
        </div>

        <br>
        <button type="submit">Abschicken</button>
    </form>
</x-layouts.app>
