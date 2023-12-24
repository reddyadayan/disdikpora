<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            @if (auth()->check())
                @if (auth()->user()->role == 'admin')
                    {{ config('app.name', 'DataSatuan') }} Admin
                @else
                    {{ config('app.name', 'DataSatuan') }} User
                @endif
            @else
                {{ config('app.name', 'DataSatuan') }}
            @endif
        </title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        <style>
            @keyframes gradientMove {
                0% {
                    background-position: 0% 50%;
                }

                100% {
                    background-position: 100% 50%;
                }
            }

            body {
                display: flex;
                flex-direction: column;
                min-height: auto;
                background: linear-gradient(to right, #04c9c4, #007bff);
                background-size: 200% 100%;
                animation: gradientMove 2s linear infinite;
            }


            .center-container {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                height: auto:
            }

            .logo {
                max-width: 190px;
                margin-bottom: 20px;
            }

            .glow-text {
                background: linear-gradient(90deg, #00f, #0f0, #f00);

                background-size: 200% 100%;

                color: transparent;

                background-clip: text;

                animation: shine 2s linear infinite;

            }

            @keyframes shine {
                to {
                    background-position: 200% 0;

                }
            }
        </style>
    </head>

    <body class="antialiased">
        <div class="center-container text-center my-5">
            <div class="card bg-white text-white shadow text-center">
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <div class="mb-4">
                        <img src="img/logo.png" alt="Company Logo" class="logo img-fluid shadow mx-auto">
                    </div>
                    <div class="mb-4">
                        <h2 class="glow-text mb-2">Welcome to Disdikpora Data Satuan</h2>
                    </div>


                    @if (Route::has('login'))
                        <div class="mb-3">
                            @auth
                                <a href="{{ url('/home') }}" class="btn btn-primary">Home</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-outline-primary">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-outline-success ms-2">Register</a>
                                @endif
                            @endauth
                        </div>

                    @endif
                </div>
            </div>
        </div>




    </body>

</html>
