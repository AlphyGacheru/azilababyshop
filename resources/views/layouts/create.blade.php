<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .container1 {
            padding: 15px 300px 15px 150px;

        }

        * {
            box-sizing: border-box;
        }

        .row1 {
            display: -ms-flexbox;
            /* IE10 */
            display: flex;
            -ms-flex-wrap: wrap;
            /* IE10 */
            flex-wrap: wrap;
            margin: 0 -16px;
        }

        /*.col-25 {*/
        /*    -ms-flex: 25%; !* IE10 *!*/
        /*    flex: 25%;*/
        /*}*/

        .col-50 {
            -ms-flex: 50%;
            /* IE10 */
            flex: 50%;
        }

        .col-75 {
            -ms-flex: 75%;
            /* IE10 */
            flex: 75%;
        }


        .col-50,
        .col-75 {
            padding: 0 16px;
        }


        input[type=text] {
            width: 100%;
            margin-bottom: 20px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        label {
            margin-bottom: 10px;
            display: block;
        }


        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            margin: 10px 0;
            border: none;
            width: 100%;
            border-radius: 3px;
            cursor: pointer;
            font-size: 17px;
        }

        .btn:hover {
            background-color: #45a049;
        }

        a {
            color: #2196F3;
        }

        hr {
            border: 1px solid lightgrey;
        }


        /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
        @media (max-width: 800px) {


            .container1 {

                padding: 5px 20px 15px 20px;
            }
        }

    </style>
</head>

<body>
    <div class="container">
        <ul style="display: flex; list-style:none; ">
            <a href="{{ route('t-shirtsAdmin.create') }}">
                <li style="padding:2rem;"> Create T-shirts</li>
            </a>
            <a href="{{ route('onesies.create') }}">
                <li style="padding:2rem;">Create Onesies</li>

            </a> <a href="{{ route('trousers.create') }}">
                <li style="padding:2rem;">Create Trousers</li>

            </a>
            <a href="{{ route('shorts.create') }}">
                <li style="padding:2rem;">Create Shorts</li>

            </a>

            <a href="{{ route('skirts.create') }}">
                <li style="padding:2rem;">Create Skirts</li>

            </a>

            <a href="{{ route('dresses.create') }}">
                <li style="padding:2rem;">Create Skirts</li>

            </a>

        </ul>
        <hr>
        <br>

        @if (session('flash'))
            <div class="alert alert-success">
                <p
                    style="text-align: center; font-size: 22px; margin-top: 25px; margin-bottom: 20px; font-family: sans-serif;">
                    {{ session('flash') }}</p>
            </div>
        @endif
        <div class="row1">
            <div class="col-75">
                <div class="container1">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>
                                        <p style="font-size: 15px">{{ $error }}</p>
                                    </li>
                                    <hr>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <br>

                    @yield('form')
                </div>
            </div>

        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-success").click(function() {
                let lsthmtl = $(".clone").html();
                $(".increment").after(lsthmtl);
            });
            $("body").on("click", ".btn-danger", function() {
                $(this).parents(".realprocode").remove();
            });
        });

    </script>
</body>

</html>
