<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Default Title')</title>

    {{-- Flat Icons --}}
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <x-sidebar></x-sidebar>
    
    <main>
        @yield('content')
    </main>
</body>

</html>