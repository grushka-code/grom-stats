@extends('layouts.main')

@section('content')
    <h2 class="text-center font-weight-bold">ТЕМАТИЧНІ ПУБЛІКАЦІЇ</h2>
    <div class="row">
    @foreach(\DirectoryManager::getMainDirectories() as $id => $name)
        <div class="col-6">
            <h3>{{{$name}}}</h3>
            <ul class="list-group">
                @foreach(\PageManager::getByDirectoryId($id) as $slug => $title)
                    <li>{{{$title}}}</li>
                @endforeach
            </ul>
        </div>
    @endforeach
    </div>
@endsection
