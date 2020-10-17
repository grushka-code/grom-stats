<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @section('head')
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        @include('partials.styles')
    @show
</head>
<body class="row">

<div class="col-12">
    @section('navbar')
        @include('components.admin.navbar')
    @show
    <div class="col-10 offset-1" style="margin-top: 20px">
        @section('content')
        @show
    </div>
</div>
@section('scripts')
    @include('partials.js')
@show
</body>
</html>
