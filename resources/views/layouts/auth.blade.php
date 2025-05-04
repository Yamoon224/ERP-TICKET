<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content="APP GESTION DES TICKETS DE TRANSPORT INTERURBAIN" name="description"/>
        <meta content="AJS" name="author"/>
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">  

        <link href="{{ asset('lib/fontawesome-free/css/all.min.css') }}" rel="stylesheet"/>
        <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css" >

        <link href="{{ asset('css/azia.css') }}" rel="stylesheet"/>
        <link href="{{ asset('css/style.custom.css') }}" rel="stylesheet"/>
    </head>
    <body class="az-body" style="background: url({{ asset('images/bg-auth.png') }}); background-size: cover">
        {{ $slot }}

        <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>        
        <script src="{{ asset('js/azia.js') }}"></script>
        <script>
            $(function() { 'use strict' });
        </script>
        @stack('scripts')
    </body>
</html>
