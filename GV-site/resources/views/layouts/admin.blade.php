<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/base/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
    <link rel="shortcut icon" href="{{asset('admin/images/favicon.ico')}}">

    @livewireStyles

</head>
<body>
    <div class="container-scroller">
        @include('layouts.inc.admin.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('layouts.inc.admin.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">

                    @yield('yazan')
                </div>
            </div>

        </div>
    </div>





    <script src="{{ asset('admin/vendors/base/vendor.bundle.base.js') }}" defer></script>
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


    @livewireScripts
</body>
</html>
