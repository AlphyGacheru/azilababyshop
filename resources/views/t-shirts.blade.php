@extends('layout/layout')

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="jquery.bxslider.min.js"></script>
    <script>
        $(document).ready(function() {

            $('.slider').bxSlider({
                pager: false,
                touchEnabled: false,
            });
        });

    </script>
@endsection


@section('main-content')

    <!-- start: collections grid -->
    <section class="collections-section">
        <header class="row section-header max-inner">
            <div class="columns-12 col-centered">
                <h2>T-shirts</h2>
                <hr /> <br>
            </div>
        </header>




        @if (session('flash'))

            <div class="alert alert-success">
                <p>
                    {{ session('flash') }}</p>
            </div>
        @endif


        <div class="row max-inner">
            @foreach ($tshirts as $tshirt)
                @auth
                    <form action="{{ route('t-shirtsAdmin.destroy', $tshirt->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-lg">DELETE</button>

                    </form>
                @endauth
                <div class="columns col-6 collection-item">
                    <div class="row">
                        <a>

                            <div class="slider">
                                @foreach (json_decode($tshirt->filenames) as $picture)
                                    <div>
                                        <img src="{{ asset('files/' . $picture) }}" alt="kids top" loading="lazy">
                                    </div>
                                @endforeach
                            </div>
                            <div class="t-shirt-button">
                                <div class="row" style="display: flex; text-align: center; ">
                                    <div class="columns col"><i class="fas fa fa-child"></i> {{ $tshirt->gender }}
                                    </div>
                                    <div class="columns col"><i class="fas fa fa-calendar"></i> {{ $tshirt->age }} Years
                                    </div>
                                    <div class="columns col"><i class="fas fa fa-tag"></i>
                                        Kshs 250</div>


                                </div>
                                <div class="row" style=" text-align: center; ">
                                    <div class="columns col">T-shirt code: 0TX-{{ $tshirt->id }} </div>

                                    <div class="columns col"><i class="fas fa fa-phone"></i> 0757 558815</div>

                                </div>

                                <div class="row" style="display: flex; text-align: center;">
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- end: collections grid -->

@endsection
