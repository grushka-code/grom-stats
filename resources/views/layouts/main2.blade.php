<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @section('head')
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        @include('partials.styles')
    @show
    <style>
        body {
            padding: 10px
        }
    </style>
</head>
<body class="container">
<div class="row bot-margin--20">
    @section('navbar')
        @include('components.navbar')
    @show
</div>
<div class="row">
    <div class="col-10">
        @section('content')
            @include('components.content')
        @show
    </div>
    <div class="col-2">
        @section('right-bar')
            @include('components.right-bar')
        @show
    </div>
</div>
<div class="row">
    <div class="col-10">
        @section('footer')
            @include('components.footer')
        @show
    </div>
</div>
@include('partials.js')

</body>
</html>
