<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<script src="sweetalert2.all.min.js"></script>
<!-- Styles -->
{{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    <link rel="stylesheet" href="{{asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/base/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
    <link rel="shortcut icon" style="color: white" href="{{asset('/storage/images/logo - Klein.svg')}}">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
 {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    @livewireStyles

</head>
<body>
    <div class="container-scroller">
        @include('layouts.inc.admin.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('layouts.inc.admin.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    {{ $slot }}
                </div>
            </div>

        </div>
    </div>





    <script src="{{ asset('admin/vendors/base/vendor.bundle.base.js') }}" defer></>
    <script src="{{ asset('admin/vendors/chart.js/Chart.min.js') }}" defer></script>

    <script src="{{ asset('admin/vendors/datatables.net/jquery.dataTables.js') }}" defer></script>

    <script src="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}" defer></script>

    <script src="{{ asset('admin/js/off-canvas.js') }}" defer></script>

    <script src="{{ asset('admin/js/hoverable-collapse.js') }}" defer></script>

    <script src="{{ asset('admin/js/template.js') }}" defer></script>

    <script src="{{ asset('admin/js/dashboard.js') }}" defer></script>

    <script src="{{ asset('admin/js/data-table.js') }}" defer></script>

    <script src="{{ asset('admin/js/jquery.dataTables.js') }}" defer></script>

    <script src="{{ asset('admin/js/dataTables.bootstrap4.js') }}" defer></script>

    <!-- laravel charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>


    @livewireScripts
</body>
</html>
