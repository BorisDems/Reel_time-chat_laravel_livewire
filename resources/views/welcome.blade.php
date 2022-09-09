<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2-dist/css/bootstrap.css') }}">
    <style>
        body {
            background-image: url('{{ asset('img/study 2.jpg') }}');
            background-size: cover;

        }

        .acceuil1 {
            font-size: 10rem;
            font-weight: bold;
            background: -webkit-linear-gradient(blue, red);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1;

        }

        .acceuil2 {
            font-size: 8rem;
            font-weight: bold;
            background: -webkit-linear-gradient(red, blue);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1;
        }

        .acceuil {

            margin: 0 auto;
        }
    </style>
    <!-- Fonts -->

</head>

<body class="antialiased">
    <div
        class="position-relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-0 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-3 sm:block">
                @auth
                    <div class="d-flex justify-content-end me-5 mt-4">

                        <a href="{{ url('/dashboard') }}" class="me-5 fs-3 btn btn-success ">My
                            Space</a>
                    </div>
                @else
                    <div class=" d-flex justify-content-end me-5 mt-2  py-0">

                        <a href="{{ route('login') }}"
                            class="text-sm btn btn-warning mx-3 fw-bold fs-4 text-gray-700 dark:text-gray-500 underline">Log
                            in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="ml-4 text-sm btn btn-warning fw-bold fs-4 text-gray-700 dark:text-gray-500 underline">Register</a>
                    </div>
            @endif
        @endauth
        @endif
        <div class=" d-flex flex-column align-items-center acceuil">
            <div class="acceuil1 ">

                <span>Welcome on</span>


            </div>

            <div class="acceuil2">

                <span>Live Chat App </span>

            </div>
            <button class=" btn btn-warning py-1 mt-5 fs-3 fw-bold text-muted" id="bt"> about ---> </button>
        </div>
    </div>
</body>

</html>
