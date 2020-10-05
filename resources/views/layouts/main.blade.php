<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @section('head')
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        @include('partials.styles')
    @show
    <style>
        body {
            padding: 10px
        }
    </style>
</head>
<body>

<div>
    @section('navbar')
        @include('components.navbar')
    @show
</div>

<div class="row">
    <div class="col">
        @section('content')
            @include('components.content')
        @show
    </div>
    <div class="col-3">
        @section('right-bar')
            @include('components.right-bar')
        @show
    </div>
</div>
<div>
    @section('footer')
    @show
</div>
@include('partials.js')

</body>
</html>
