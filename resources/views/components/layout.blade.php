<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Default Title')</title>

    {{-- Flat Icons --}}
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    {{-- DataTables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.0/css/dataTables.dataTables.min.css">
    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <x-sidebar></x-sidebar>
    
    <main>
        @yield('content')
    </main>
    
    {{-- Modal Template --}}
    <div class="modal fade" id="modalTemplate" tabindex="-1" aria-labelledby="modalTemplateLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modalContent">
                
            </div>
        </div>
    </div>
    
    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    {{-- DataTables JS --}}
    <script src="https://cdn.datatables.net/2.2.0/js/dataTables.min.js"></script>
    {{-- Custom JS --}}
    <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>