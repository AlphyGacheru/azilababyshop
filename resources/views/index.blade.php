@extends('layout/layout')

@section('header-slide')
    <!-- start: content slider-->
    <section class="content-slider">

        <div class="flexslider">
            <ul class="slides">
                <!-- start: slide -->
                <li>
                    <div class="row max-inner">
                        <div class="columns col-12 slide-image"><img src="images/slide-image-1.jpg" /></div>

                    </div>
                </li>
                <!-- end: slide -->
                <!-- start: slide -->
                {{-- <li>
                    <div class="row max-inner">
                        <div class="columns col-12 slide-image"><img src="images/slide-image-2.jpg" /></div>
                    </div>
                </li> --}}
                <!-- end: slide -->
                <!-- start: slide -->
                {{-- <li>
                    <div class="row max-inner">
                        <div class="columns col-12 slide-image"><img src="images/slide-image-3.jpg" /></div>
                    </div>
                </li> --}}
                <!-- end: slide -->
            </ul>
        </div>
    </section>
    <!-- end: content slider-->
@endsection

@section('main-content')

    <!-- start: collections grid -->
    <section class="collections-section">
        <header class="row section-header max-inner">
            <div class="columns-12 col-centered">
                <h2>Featured Products</h2>
                <hr />
            </div>
        </header>

        <div class="row max-inner">

            <div class="columns col-6 collection-item">
                <a href="{{ route('t-shirts') }}" style="border-radius: 1px;">
                    {{-- Image --}}
                    <img src="images/collections-image-1.jpg">


                    <div class="collection-button">
                        <a href="{{ route('t-shirts') }}" style="text-decoration: none; color: #fff;;">Browse More
                            T-shirts</a>
                    </div>

                </a>
            </div>

            <div class="columns col-6 collection-item">
                <a href="{{ route('onesies.index') }}">
                    <img src="images/collections-image-2.jpg">
                    <div class="collection-button">
                        <a href="{{ route('onesies.index') }}" style="text-decoration: none; color: #fff;;">Browse More
                            Onesees</a>
                    </div>
                </a>
            </div>

        </div>


        <div class="row max-inner">
            <div class="columns col-6 collection-item">
                <a href="{{ route('trousers.index') }}">
                    <img src="images/collections-image-3.jpg">
                    <div class="collection-button">
                        <a href="{{ route('trousers.index') }}" style="text-decoration: none; color: #fff;;">Browse More
                            Trousers</a>
                    </div>
                </a>
            </div>

            <div class="columns col-6 collection-item">
                <a href="{{ route('dresses.index') }}">
                    <img src="images/collections-image-4.jpg">
                    <div class="collection-button">
                        <a href="{{ route('dresses.index') }}" style="text-decoration: none; color: #fff;;">Browse More
                            Dresses</a>
                    </div>
                </a>
            </div>

        </div>


    </section>
    <!-- end: collections grid -->
@endsection


@section('scripts')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')

    </script>

    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

    <script>
        var _gaq = [
            ['_setAccount', 'UA-XXXXX-X'],
            ['_trackPageview']
        ];
        (function(d, t) {
            var g = d.createElement(t),
                s = d.getElementsByTagName(t)[0];
            g.src = '//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g, s)
        }(document, 'script'));

    </script>
@endsection
