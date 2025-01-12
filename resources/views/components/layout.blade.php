<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Default Title')</title>

    {{-- Bootstrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    {{-- DataTables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.0/css/dataTables.dataTables.min.css">
    {{-- Custom CSS --}}
    @vite('resources/css/app.css')
    
</head>

<body>
    <x-sidebar></x-sidebar>
    
    <main>
        <x-notification />
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
    {{-- DataTables JS --}}
    <script src="https://cdn.datatables.net/2.2.0/js/dataTables.min.js"></script>
    {{-- Custom JS --}}
    @vite('resources/js/app.js')
</body>

</html>