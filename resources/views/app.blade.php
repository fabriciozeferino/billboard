<!DOCTYPE html>
<html class="h-full bg-gray-100" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    {{-- Favicon --}}
    {{--<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" >--}}
    {{-- removes fiveicon from request --}}
    <link rel="shortcut icon" href="data:;base64,iVBORw0KGgo=">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="leading-relaxed text-gray-900 antialiased ">
<div id="app">
    <app></app>
</div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
