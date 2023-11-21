<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Groene vingers</title>

    <!-- Fonts s-->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap-grid.min.css"
        integrity="sha512-JQksK36WdRekVrvdxNyV3B0Q1huqbTkIQNbz1dlcFVgNynEMRl0F8OSqOGdVppLUDIvsOejhr/W5L3G/b3J+8w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&family=Roboto:wght@300;400;500;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('/storage/images/logo - Klein.svg') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="sweetalert2.all.min.js"></script>
    <!-- Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- slick -->
    <!-- <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    // Add the new slick-theme.css if you want the default styling
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" /> -->


    @livewireStyles
</head>
<body class="theme-body__test">
    <header>
        <div class="header-logo">
            <a href="/">
                {{-- <svg viewBox="0 0 354.5672027518367 51.48703911728716" preserveAspectRatio="xMidYMid meet"
                    class="css-g5ufxp" id="bfhdbdeb">
                    <defs id="SvgjsDefs1174"></defs>
                    <g id="SvgjsG1175" featurekey="5TMTKC-0"
                        transform="matrix(0.7889828046971873,0,0,0.7889828046971873,-8.714850117679898,-13.714497876466236)"
                        fill="#111">
                        <title xmlns="http://www.w3.org/2000/svg">05_collections</title>
                        <path xmlns="http://www.w3.org/2000/svg"
                            d="M85.82,74.51l-0.2.17C79,80.49,71.17,83,64.12,81.62c-6.36-1.26-10.91-5.46-15.3-9.52-4.76-4.4-9.25-8.55-15.87-9.26S19.1,65.18,13.39,71.29c2.22,3.09,12.78,15.79,30,5.3a1,1,0,0,1,1,1.71c-5.18,3.15-9.84,4.34-13.91,4.34-12.25,0-19.19-10.76-19.28-10.91a1,1,0,0,1,.1-1.2c6.23-7,14.17-10.51,21.79-9.69,7.28,0.78,12.23,5.36,17,9.78,4.38,4,8.52,7.88,14.33,9,6.44,1.28,13.65-1.08,19.78-6.48l0.24-.2a26.68,26.68,0,0,0,2.23-2c-3-7.08-11.17-8.72-12.8-9a36.92,36.92,0,0,1-9.55,4.13,1,1,0,0,1-.27,0,1,1,0,0,1-.27-2c10.19-2.9,16.5-8.43,18.78-16.42a24.11,24.11,0,0,0,.53-10.5c-13.83-1.42-19.66,6.85-20.52,8.2-0.77,5.4-3.22,10.78-7.32,16.08a1,1,0,0,1-1.58-1.22C57.67,55.26,60,50.14,60.69,45h0a24.07,24.07,0,0,0,0-6.45c-1.32-10-8.65-17-10.86-18.91C38.27,30.34,40.34,41.9,42.79,48.1a38.83,38.83,0,0,1,2.4,4.71,1,1,0,0,1-1.74,1,26.32,26.32,0,0,1-2.25-4.45c-3.6-6.1-8.47-9.9-14.52-11.31a22.17,22.17,0,0,0-9.43-.13c-2.89,8.75,3.16,16.64,3.22,16.72a1,1,0,0,1-1.58,1.23c-0.29-.37-7-9.14-3.35-19.15a1,1,0,0,1,.66-0.61,23.88,23.88,0,0,1,23.28,7.5c-1.38-7.14-.54-17,9.67-26a1,1,0,0,1,1.27,0C50.87,17.88,61,25.73,62.7,38.31A26.1,26.1,0,0,1,62.92,42c3.07-3.23,9.68-8,21.21-6.59a1,1,0,0,1,.84.74c0,0.18,3.59,14.77-8.74,24.3,3.52,0.9,10,3.45,12.58,10.28C89.13,71.52,88.62,72.16,85.82,74.51Z">
                        </path>
                    </g>
                    <g id="SvgjsG1176" featurekey="nameLeftFeature-0"
                        transform="matrix(1.6967138095615117,0,0,1.6967138095615117,77.60657238087698,4.075288209584242)"
                        fill="#111">
                        <path
                            d="M2 10.26 c0 -3 1.8 -5 4.5 -5 s4.5 2 4.5 5 l-1 0 c0 -2.4 -1.4 -4.02 -3.5 -4.02 s-3.5 1.62 -3.5 4.02 l0 4.5 c0 2.4 1.4 4 3.5 4 c0.96 0 1.74 -0.36 2.34 -0.96 l0.76 0.74 c-0.8 0.76 -1.84 1.2 -3.1 1.2 c-2.7 0 -4.5 -1.98 -4.5 -4.98 l0 -4.5 z M6.5 7.74 c-0.5 0 -0.9 0.16 -1.26 0.46 l-0.74 -0.7 c0.56 -0.5 1.2 -0.74 2 -0.74 c1.8 0 3 1.4 3 3.5 l-1 0 c0 -1.5 -0.8 -2.52 -2 -2.52 z M6.5 17.259999999999998 c1.2 0 2 -1 2 -2.5 l0 -1.26 l-2 0 l0 -1 l3 0 l0 2.26 c0 2.1 -1.2 3.48 -3 3.48 s-3 -1.38 -3 -3.48 l0 -4.5 c0 -0.96 0.24 -1.76 0.7 -2.36 l0.7 0.7 c-0.26 0.46 -0.4 1 -0.4 1.66 l0 4.5 c0 1.5 0.8 2.5 2 2.5 z M11 14.76 c0 1.38 -0.4 2.54 -1.06 3.4 l-0.74 -0.7 c0.5 -0.72 0.8 -1.62 0.8 -2.7 l0 -2.26 l1 0 l0 2.26 z M6.5 15 l0 -1 l1.5 0 l0 1 l-1.5 0 z M16.5 19.5 l-1 0 l0 -14 l4.5 0 c2.7 0 4.5 1.8 4.5 4.5 c0 1.2 -0.36 2.24 -1 3.06 l-0.76 -0.76 c0.46 -0.6 0.76 -1.4 0.76 -2.3 c0 -2.1 -1.4 -3.5 -3.5 -3.5 l-3.5 0 l0 5.5 l3.5 0 c1.2 0 2 -0.8 2 -2 s-0.8 -2 -2 -2 l-1.64 0 l-1.06 -1 l2.7 0 c1.8 0 3 1.2 3 3 c0 1.6 -0.96 2.76 -2.46 2.96 l2.2 6.54 l-1.08 0 l-2.16 -6.5 l-3 0 l0 6.5 z M17 7.4 l1 1 l0 3.1 l-1 0 l0 -4.1 z M21.2 13.36 c0.46 -0.16 0.84 -0.36 1.2 -0.66 l0.7 0.7 c-0.2 0.2 -0.4 0.34 -0.66 0.5 l1.86 5.6 l-1.06 0 z M18.4 14.5 l-1.06 -1 l1.8 0 l0.36 1 l-1.1 0 z M17 19.5 l0 -5.64 l1 1 l0 4.64 l-1 0 z M37 14.76 c0 1.38 -0.4 2.58 -1.1 3.48 l-0.76 -0.68 c0.56 -0.7 0.86 -1.66 0.86 -2.8 l0 -4.5 c0 -2.4 -1.4 -4.02 -3.5 -4.02 s-3.5 1.62 -3.5 4.02 l0 4.5 c0 2.4 1.4 4 3.5 4 c0.9 0 1.7 -0.3 2.3 -0.86 l0.7 0.7 c-0.76 0.76 -1.8 1.14 -3 1.14 c-2.7 0 -4.5 -1.98 -4.5 -4.98 l0 -4.5 c0 -3 1.8 -5 4.5 -5 s4.5 2 4.5 5 l0 4.5 z M30.84 8.7 c-0.2 0.4 -0.34 0.96 -0.34 1.56 l0 4.5 c0 1.5 0.8 2.5 2 2.5 s2 -1 2 -2.5 l0 -4.5 c0 -1.5 -0.8 -2.52 -2 -2.52 c-0.54 0 -1 0.22 -1.3 0.56 l-0.74 -0.7 c0.48 -0.54 1.2 -0.84 2.04 -0.84 c1.8 0 3 1.4 3 3.5 l0 4.5 c0 2.1 -1.2 3.48 -3 3.48 s-3 -1.38 -3 -3.48 l0 -4.5 c0 -0.9 0.2 -1.7 0.6 -2.3 z M48 11.5 l0 1 l-5.5 0 l0 4.5 l6.5 0 l0 1 l-7.5 0 l0 -12.5 l7.5 0 l0 1 l-6.5 0 l0 5 l5.5 0 z M49 8 l-4.6 0 l-1.06 -1 l5.66 0 l0 1 z M43 7.359999999999999 l1 0.98 l0 2.66 l-1 0 l0 -3.64 z M48 14 l-3.6 0 l-1.06 -1 l4.66 0 l0 1 z M43 13.36 l1 0.98 l0 2.16 l-1 0 l0 -3.14 z M49 19.5 l-7.5 0 l0 -1 l7.5 0 l0 1 z M60.26 19.5 l-5.76 -10.26 l0 10.26 l-1 0 l0 -14 l7.9 14 l-1.14 0 z M62 19.5 l-7.9 -14 l1.14 0 l5.76 10.26 l0 -10.26 l1 0 l0 14 z M59.5 5.5 l1 0 l0 8.3 l-1 -1.74 l0 -6.56 z M56 19.5 l-1 0 l0 -8.34 l1 1.74 l0 6.6 z M73.5 11.5 l0 1 l-5.5 0 l0 4.5 l6.5 0 l0 1 l-7.5 0 l0 -12.5 l7.5 0 l0 1 l-6.5 0 l0 5 l5.5 0 z M74.5 8 l-4.6 0 l-1.06 -1 l5.66 0 l0 1 z M68.5 7.359999999999999 l1 0.98 l0 2.66 l-1 0 l0 -3.64 z M73.5 14 l-3.6 0 l-1.06 -1 l4.66 0 l0 1 z M68.5 13.36 l1 0.98 l0 2.16 l-1 0 l0 -3.14 z M74.5 19.5 l-7.5 0 l0 -1 l7.5 0 l0 1 z">
                        </path>
                    </g>
                    <g id="SvgjsG1177" featurekey="nameRightFeature-0"
                        transform="matrix(1.583016604209666,0,0,1.583016604209666,207.7582492784851,5.4965024132110685)"
                        fill="#111">
                        <path
                            d="M13.9 5 l2.5 7.36 l2.44 -7.36 l3.66 0 l-5 15 l-2.26 0 l-4.98 -15 l3.64 0 z M12 5.5 l-1.06 0 l4.66 14 l4.64 -14 l-1.04 0 l-3.6 10.8 z M12.5 5.5 l3.1 9.26 l0.5 -1.56 l-2.54 -7.7 l-1.06 0 z M21.8 5.5 l-1.04 0 l-4.66 14 l1.06 0 z M28.240000000000002 5 l0 15 l-3.5 0 l0 -15 l3.5 0 z M25.240000000000002 19.5 l1 0 l0 -14 l-1 0 l0 14 z M26.740000000000002 19.5 l1 0 l0 -14 l-1 0 l0 14 z M35.74 20 l-3.5 0 l0 -15 l2.5 0 l3.5 6.2 l0 -6.2 l3.5 0 l0 15 l-2.5 0 l-3.5 -6.2 l0 6.2 z M33.74 9.24 l5.76 10.26 l1.14 0 l-7.9 -14 l0 14 l1 0 l0 -10.26 z M33.34 5.5 l7.9 14 l0 -14 l-1 0 l0 10.26 l-5.76 -10.26 l-1.14 0 z M38.74 12.059999999999999 l1 1.74 l0 -8.3 l-1 0 l0 6.56 z M35.24 12.9 l-1 -1.74 l0 8.34 l1 0 l0 -6.6 z M51.74 10.26 c0 -1.2 -0.6 -2 -1.5 -2 s-1.5 0.8 -1.5 2 l0 4.5 c0 1.2 0.6 1.98 1.5 1.98 c0.7 0 1.2 -0.48 1.4 -1.24 l-1.9 0 l0 -3.5 l5.5 0 l0 2.76 c0 3.3 -2 5.5 -5 5.5 s-5 -2.2 -5 -5.5 l0 -4.5 c0 -3.3 2 -5.52 5 -5.52 s5 2.22 5 5.52 l0 0.48 l-3.5 0 l0 -0.48 z M45.74 14.76 c0 3 1.8 4.98 4.5 4.98 c1.26 0 2.3 -0.44 3.1 -1.2 l-0.76 -0.74 c-0.6 0.6 -1.38 0.96 -2.34 0.96 c-2.1 0 -3.5 -1.6 -3.5 -4 l0 -4.5 c0 -2.4 1.4 -4.02 3.5 -4.02 s3.5 1.62 3.5 4.02 l1 0 c0 -3 -1.8 -5 -4.5 -5 s-4.5 2 -4.5 5 l0 4.5 z M50.24 7.74 c1.2 0 2 1.02 2 2.52 l1 0 c0 -2.1 -1.2 -3.5 -3 -3.5 c-0.8 0 -1.44 0.24 -2 0.74 l0.74 0.7 c0.36 -0.3 0.76 -0.46 1.26 -0.46 z M50.24 17.259999999999998 c-1.2 0 -2 -1 -2 -2.5 l0 -4.5 c0 -0.66 0.14 -1.2 0.4 -1.66 l-0.7 -0.7 c-0.46 0.6 -0.7 1.4 -0.7 2.36 l0 4.5 c0 2.1 1.2 3.48 3 3.48 s3 -1.38 3 -3.48 l0 -2.26 l-3 0 l0 1 l2 0 l0 1.26 c0 1.5 -0.8 2.5 -2 2.5 z M53.74 14.76 c0 1.08 -0.3 1.98 -0.8 2.7 l0.74 0.7 c0.66 -0.86 1.06 -2.02 1.06 -3.4 l0 -2.26 l-1 0 l0 2.26 z M51.74 15 l0 -1 l-1.5 0 l0 1 l1.5 0 z M62.24 14.5 l0 2 l5 0 l0 3.5 l-8.5 0 l0 -15 l8.5 0 l0 3.5 l-5 0 l0 2.5 l4 0 l0 3.5 l-4 0 z M59.24 5.5 l0 12.5 l7.5 0 l0 -1 l-6.5 0 l0 -4.5 l5.5 0 l0 -1 l-5.5 0 l0 -5 l6.5 0 l0 -1 l-7.5 0 z M66.74000000000001 7 l-5.66 0 l1.06 1 l4.6 0 l0 -1 z M60.74 11 l1 0 l0 -2.66 l-1 -0.98 l0 3.64 z M65.74000000000001 13 l-4.66 0 l1.06 1 l3.6 0 l0 -1 z M60.74 16.5 l1 0 l0 -2.16 l-1 -0.98 l0 3.14 z M66.74000000000001 18.5 l-7.5 0 l0 1 l7.5 0 l0 -1 z M80.74000000000001 10 c0 1.8 -0.76 3.26 -1.96 4.1 l1.96 5.9 l-3.64 0 l-1.72 -5 l-1.14 0 l0 5 l-3.5 0 l0 -15 l5 0 c3 0 5 2 5 5 z M76.28000000000002 12.96 c1.5 -0.2 2.46 -1.36 2.46 -2.96 c0 -1.8 -1.2 -3 -3 -3 l-2.7 0 l1.06 1 l1.64 0 c1.2 0 2 0.8 2 2 s-0.8 2 -2 2 l-3.5 0 l0 -5.5 l3.5 0 c2.1 0 3.5 1.4 3.5 3.5 c0 0.9 -0.3 1.7 -0.76 2.3 l0.76 0.76 c0.64 -0.82 1 -1.86 1 -3.06 c0 -2.7 -1.8 -4.5 -4.5 -4.5 l-4.5 0 l0 14 l1 0 l0 -6.5 l3 0 l2.16 6.5 l1.08 0 z M72.74000000000001 11.5 l1 0 l0 -3.1 l-1 -1 l0 4.1 z M75.74000000000001 11.5 c0.9 0 1.5 -0.6 1.5 -1.5 s-0.6 -1.5 -1.5 -1.5 l-1.5 0 l0 3 l1.5 0 z M78.18 13.9 c0.26 -0.16 0.46 -0.3 0.66 -0.5 l-0.7 -0.7 c-0.36 0.3 -0.74 0.5 -1.2 0.66 l2.04 6.14 l1.06 0 z M75.24000000000001 14.5 l-0.36 -1 l-1.8 0 l1.06 1 l1.1 0 z M73.74000000000001 19.5 l0 -4.64 l-1 -1 l0 5.64 l1 0 z M88.98 9.1 c0 -0.5 -0.44 -0.84 -0.98 -0.84 c-0.56 0 -1.02 0.34 -1.02 0.84 l0 0.26 c0 0.48 0.46 0.9 1.02 0.9 c2.7 0 4.74 2.1 4.74 4.9 l0 0.24 c0 2.54 -1.86 4.86 -4.74 4.86 c-2.7 0 -4.76 -2.1 -4.76 -4.86 l0 -0.5 l3.5 0 l0 0.5 c0 0.74 0.54 1.34 1.26 1.34 c0.68 0 1.24 -0.6 1.24 -1.34 l0 -0.24 c0 -0.82 -0.56 -1.42 -1.24 -1.42 c-2.56 0 -4.5 -1.88 -4.5 -4.38 l0 -0.26 c0 -2.5 1.94 -4.36 4.5 -4.36 c2.54 0 4.5 1.86 4.5 4.36 l0 0.5 l-3.52 0 l0 -0.5 z M85.24000000000001 15.4 c0 1.6 1.2 2.84 2.76 2.84 c1.54 0 2.74 -1.24 2.74 -2.84 l0 -0.24 c0 -1.66 -1.2 -2.92 -2.74 -2.92 c-1.72 0 -3 -1.24 -3 -2.88 l0 -0.26 c0 -1.6 1.28 -2.86 3 -2.86 c1.68 0 3 1.26 3 2.86 l0.98 0 c0 -2.2 -1.7 -3.84 -3.98 -3.84 c-2.32 0 -4.02 1.64 -4.02 3.84 l0 0.26 c0 2.2 1.7 3.9 4.02 3.9 c0.98 0 1.74 0.78 1.74 1.9 l0 0.24 c0 1.04 -0.76 1.86 -1.74 1.86 c-1.02 0 -1.76 -0.82 -1.76 -1.86 l-1 0 z M88.00000000000001 7.74 c0.84 0 1.5 0.6 1.5 1.36 l0.98 0 c0 -1.36 -1.1 -2.34 -2.48 -2.34 c-0.56 0 -1.26 0.24 -1.66 0.54 l0.76 0.7 c0.18 -0.14 0.54 -0.26 0.9 -0.26 z M86.50000000000001 9.1 c0 -0.16 0.08 -0.46 0.24 -0.7 l-0.76 -0.74 c-0.3 0.34 -0.5 0.98 -0.5 1.44 l0 0.26 c0 1.34 1.1 2.4 2.52 2.4 c1.84 0 3.24 1.44 3.24 3.4 l0 0.24 c0 0.66 -0.4 1.64 -0.9 2.3 l0.74 0.7 c0.66 -0.8 1.16 -1.84 1.16 -3 l0 -0.24 c0 -2.5 -1.84 -4.42 -4.24 -4.42 c-0.86 0 -1.5 -0.6 -1.5 -1.38 l0 -0.26 z M83.74000000000001 15.4 c0 2.5 1.86 4.34 4.26 4.34 c0.94 0 2.1 -0.38 2.74 -0.94 l-0.76 -0.74 c-0.44 0.4 -1.3 0.7 -1.98 0.7 c-1.86 0 -3.26 -1.46 -3.26 -3.36 l-1 0 z">
                        </path>
                    </g>
                </svg> --}}
                <img style="width: 100%" height="40" src="/storage/images/logo.svg" alt="logo" /> </a>
        </div>
        <div class="menu-wrapper">
            <div class="menu-item {{ (request()->is('/')) ? 'active' : '' }}">
                <a class="" href="/">
                    Home
                </a>
            </div>
            <div class="menu-item {{ (request()->is('producten')) ? 'active' : '' }}">
                <a href="/producten">
                    Producten
                </a>
            </div>
            <div class="menu-item {{ (request()->is('overons')) ? 'active' : '' }}">
                <a href="/overons">
                    Over ons
                </a>
            </div>
            <div class="menu-item {{ (request()->is('contact')) ? 'active' : '' }}">
                <a href="/contact">
                    Contact
                </a>
            </div>
            @auth

            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'management' || Auth::user()->role == 'humanresources' )
            <div class="menu-item">
                <a href="/dashboard">
                    Dashboard
                </a>
            </div>
            @endif
            @if (Auth::user()->role == 'user')
            <div class="menu-item {{ (request()->is('bestellingen')) ? 'active' : '' }}">
                <a href="/bestellingen">
                    Bestelgeschiedenis
                </a>
            </div>
            {{-- <div class="menu-item ">
                <a class="primairy-button no-margin" href="/winkelwagen">
                    <i class="bi bi-cart4"></i>
                </a>
            </div> --}}

            <livewire:cartcounter />

            @endif
            @if (Auth::user()->role == 'admin')
            <livewire:admin.groothandel.myordercounter />

            
            @endif

            <div class="menu-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="primairy-button no-margin" :href="route('logout')" onclick="event.preventDefault();
                             this.closest('form').submit();">
                        <i class="mdi mdi-logout text-primary"></i>
                        Logout
                    </a>
                </form>
            </div>
            <div class="header-icon">
                <a href="/profile">
                    <img class="header-icon" src="{{ Avatar::create(auth()->user()->name)->toBase64() }}" alt="profile" />
                </a>
            </div>
            {{-- <div class="menu-item">
                    <a href="/profile">
                        {{ Auth::user()->name }}
            </a>

        </div> --}}
        @endauth
        @guest
        <div class="menu-item">
            <a class="primairy-button no-margin" href="/login">
                Login
            </a>
        </div>
        <div class="menu-item">
            <a class="primairy-button no-margin" href="/register">
                Register
            </a>
        </div>
        @endguest
        </div>


        </div>
    </header>
    {{-- @yield('content') --}}
    <main>
        {{ $slot }}
    </main>
    @livewireScripts

</body>
</html>
