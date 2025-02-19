<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="image/x-icon">

    {{-- Boostrap cdn --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- Google Font --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>PENRO RECORDING FILE</title>

    <style>
        .font {
            font-family: 'Poppins';
        }
    </style>
</head>

<body class="font">

    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="bg-success p-3 rounded-3" style="width: 35vw; height: 72vh;">
            <div class="d-flex justify-content-center align-items-center mt-2">
                <img src="{{ asset('assets/img/denr-logo.jpg') }}" class="rounded-circle shadow-lg" alt="logo"
                    width="60" height="60">
            </div>
            <div class="text-center mt-3 mb-3">
                <h1 class="text-light text-uppercase fw-bold">Welcome to <strong>PENRO</strong></h1>
                {{-- <p class="lead">This is a sample text.</p> --}}
            </div>
            <form action="/login" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="mb-3 px-3">
                    <label for="email" class="form-label text-light">Email</label>
                    <input type="email" class="form-control mt-0" id="email" name="email"
                        value="{{ old('email') }}" placeholder="Enter your email here..." autocomplete="email"
                        required>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                </div>
                <div class="mb-3 px-3">
                    <label for="password" class="form-label text-light">Password</label>
                    <input type="password" class="form-control mt-0" id="password" name="password"
                        placeholder="Enter your password here..." required>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                </div>
                <div class="px-3">
                    <input type="checkbox" class="">
                    <label for="remember" class="text-light">Remember Me</label>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <p class="text-light">Forgot Password</p>
                </div>
                <div class="mb-3 px-3">
                    <input type="submit" class="btn btn-primary fw-bold text-uppercase w-100" value="LOGIN">
                </div>

                <div class="d-flex justify-content-center align-items-center">
                    <p class="text-light">Don't have an account? <a href="/register"
                            class="text-decoration-none text-info">Register
                            here</a></p>
                </div>
            </form>
        </div>
    </div>


    {{-- Script --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
