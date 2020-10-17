@extends('layouts.main')
@section('title','Pages')
@section('content')
    <h2 class="text-center font-weight-bold">ТЕМАТИЧНІ ПУБЛІКАЦІЇ</h2>
    <div class="row">
        @foreach($data as $directory => $pages)
            <div class="col-6">
                <h2><u>{{{$directory}}}</u></h2>
                <ul>
                    @foreach($pages as $page)
                        <li><a href="{{{route('pages.page',$page->slug)}}}" target="_blank" class="list-link nounderline">{{{$page->title}}}</a></li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
@endsection
