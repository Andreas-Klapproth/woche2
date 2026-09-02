<nav>
    <ul class="main-nav">
        <!-- Startseite -->
        <li>
            <x-nav-link route="home">Startseite</x-nav-link>
        </li>

        <!-- Kurse Dropdown -->
        <li>
            <x-nav-link route="courses.index" activePattern="courses.*">Kurse</x-nav-link>
            <ul class="submenu">
                <li>
                    <x-nav-link route="courses.index">Übersicht</x-nav-link>
                </li>
                <li>
                    <x-nav-link route="courses.create">Neuer Kurs</x-nav-link>
                </li>
            </ul>
        </li>

        <!-- Anmeldungen Dropdown -->
        <li>
            <x-nav-link route="registrations.index" activePattern="registrations.*">Anmeldungen</x-nav-link>
            <ul class="submenu">
                <li>
                    <x-nav-link route="registrations.index">Übersicht</x-nav-link>
                </li>
                <li>
                    <x-nav-link route="registrations.create">Neue Anmeldung</x-nav-link>
                </li>
            </ul>
        </li>

        <!-- Interessen -->
        <li>
            <x-nav-link route="interests.index">Interessen</x-nav-link>
        </li>
    </ul>
</nav>
