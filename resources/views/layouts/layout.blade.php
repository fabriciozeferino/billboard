<!DOCTYPE html>
<html class="h-full bg-gray-100" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body class="leading-none bg-gray-100 text-grey-900 antialiased">
<div class="min-h-screen flex justify-center items-center">
    <div class="w-full max-w-md">

        <div class="block mx-auto w-full max-w-sm bg-white my-6 shadow-lg rounded-lg overflow-hidden">
            @yield('content')
        </div>

        <div class="text-grey-700 text-sm text-center">
            @if (Route::currentRouteName() == 'login')
                Don't have an account?
                <a class="text-blue-600 font-bold" href="{{ route('register') }}">Create</a>
            @endif
            @if (Route::currentRouteName() == 'register')
                Already have an account?
                <a class="text-blue-600 font-bold" href="{{ route('login') }}">Sign in</a>
            @endif
        </div>
    </div>
</div>
</body>
</html>
