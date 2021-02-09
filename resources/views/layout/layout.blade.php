<!DOCTYPE html>
<html class="no-js">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Azila Baby Shop</title>

    <meta name="description" content="Indigo - A clean, responsive ecommerce HTML template">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    @yield('head')

    <link rel="stylesheet" href="css/normalize-and-boilerplate.css" />
    <link rel="stylesheet" href="css/font-awesome.css" />
    <link rel="stylesheet" href="css/flexslider.css" />
    <link rel="stylesheet" href="css/style.css" />

    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

</head>

<body>


    <!-- start: header -->
    <header class="header">
        <div class="row max-inner">

            <div class="columns col-2">
                <a href="{{ route('index') }}" title="Azila Baby Shop" class="logo">
                    <span style="display: block; color: red;">Azila </span>
                    <span style="display: block; font-size: 0.5rem;"> Baby Shop </span>
                    <span style="display: block; "> </span>
                </a>
            </div>

            <div class="columns col-10" style="padding-left: 32%;">

                <nav>
                    <ul>

                        <li><a href="{{ route('index') }}">Home</a></li>



                    </ul>
                </nav>
            </div>



        </div>
    </header>
    <!-- end: header -->


    @yield('header-slide')

    @yield('main-content')





    <!-- start: footer -->
    <footer class="footer">
        <div>



            <div>
                <h3>Follow us</h3>
                <div class="row">
                    <div class="social-links">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="https://www.instagram.com/azilababyshop/" target="_blank"><i
                                class="fa fa-instagram"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </footer>
    <!-- end: footer -->


    <!-- start: copyright -->
    <section class="footer-copyright">
        <div class="row max-inner">
            <div class="columns col-7 col-centered">
                <p>Copyright 2021 Azila Baby Shop. All rights reserved.</p>
            </div>
        </div>
    </section>
    <!-- end: copyright -->



    @yield('scripts')
</body>

</html>
