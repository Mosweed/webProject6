<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
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
    <!-- Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- slick -->
    <!-- <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    // Add the new slick-theme.css if you want the default styling
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" /> -->

</head>

<body class="theme-body__test">
    <header>
        <div class="menu-wrapper">
            <div class="menu-item ">
                <a class="active-menu-item" href="#">
                    Home
                </a>
            </div>
            <div class="menu-item">
                <a href="#">
                    Products
                </a>
            </div>
            <div class="header-logo">
                <img src="images/garden-logo.png" alt="logo">
            </div>
            <div class="menu-item">
                <a href="#">
                    About
                </a>
            </div>
            <div class="menu-item">
                <a href="#">
                    Contact us
                </a>
            </div>
        </div>
        <div class="header-icon__wrapper">
            <div class="header-icon">
                <img src="images/search.png">
            </div>
            <div class="header-icon">
                <img src="images/FAQ.png">
            </div>
            <div class="header-icon">
                <img src="images/shopping-cart.png">
            </div>
        </div>
    </header>
    <secton>
        <div class="container-fluid p-0">
            <div class="hero">
                <div class="hero-image">
                    <img src="images/hero.png">
                </div>
                <h2>
                    Coming soon...
                </h2>
            </div>
        </div>
    </secton>
    <section class="product-section">
        <div class="ellipse"></div>
        <div class="container-md">
            <div class="row pt-5 mt-3">
                <div class="col-12">
                    <h2>
                        Shop onze diverse <span class="white">producten</span>
                    </h2>
                </div>
            </div>
            <div class="row mt-5 justify-content-evenly">
                <div class="col-md-3 col-sm-4 col-6">
                    <div class="product-card">
                        <div class="product-card__image">
                            <img src="images/8720196157143.webp">
                        </div>
                        <div class="product-card__content">
                            <div class="product-card__title">
                                Intratuin plantenmand
                                Otis naturel D 38 H 33 cm
                            </div>
                            <div class="product-card__delivery">
                                <div class="product-card__delivery-icon">
                                    <img src="images/check_circle_FILL0_wght400_GRAD0_opsz48.png">
                                </div>
                                <div class="product-card__delivery-text">
                                    Binnen 1-3 dagen bezorgd.
                                </div>
                            </div>
                            <div class="product-card__price">
                                €8.99
                            </div>
                            <div class="product-card__stock">
                                Nog 25 op voorraad
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-6">
                    <div class="product-card">
                        <div class="product-card__image">
                            <img src="images/8717263827870.webp">
                        </div>
                        <div class="product-card__content">
                            <div class="product-card__title">
                                Intratuin plantenmand
                                Otis naturel D 38 H 33 cm
                            </div>
                            <div class="product-card__delivery">
                                <div class="product-card__delivery-icon">
                                    <img src="images/check_circle_FILL0_wght400_GRAD0_opsz48.png">
                                </div>
                                <div class="product-card__delivery-text">
                                    Binnen 1-3 dagen bezorgd.
                                </div>
                            </div>
                            <div class="product-card__price">
                                €12.99
                            </div>
                            <div class="product-card__stock">
                                Nog 2 op voorraad
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-6">
                    <div class="product-card">
                        <div class="product-card__image">
                            <img src="images/5060030143721.webp">
                        </div>
                        <div class="product-card__content">
                            <div class="product-card__title">
                                Intratuin plantenmand
                                Otis naturel D 38 H 33 cm
                            </div>
                            <div class="product-card__delivery">
                                <div class="product-card__delivery-icon">
                                    <img src="images/check_circle_FILL0_wght400_GRAD0_opsz48.png">
                                </div>
                                <div class="product-card__delivery-text">
                                    Binnen 1-3 dagen bezorgd.
                                </div>
                            </div>
                            <div class="product-card__price">
                                €29.99
                            </div>
                            <div class="product-card__stock">
                                Nog 15 op voorraad
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 pt-4">
                    <a href="#" class="btn btn-green">
                        Bekijk alles
                    </a>
                </div>
            </div>
        </div>
        <!-- <script>
            $(document).ready(function () {
                $('.slick-slider').slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 2000,
                });
            });
        </script> -->
    </section>
    <!-- <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script> -->
</body>

</html>