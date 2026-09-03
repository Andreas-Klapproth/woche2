@props(['title'=> "Mein Projekt"])

    <!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
</head>
<body>
<x-nav/>
<main>
    @if(session('success'))
        <p class="success">{{session('success')}}</p>
    @endif
    {{ $slot }}
        </main>
        <x-footer />
    </body>
</html>
