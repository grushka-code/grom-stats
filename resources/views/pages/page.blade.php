@extends('layouts.main')
@section('title',$model->title)
@section('content')
    <div class="row">
        <div class="col-4 pl-0">
            {!!\DirectoryManager::getPageMenuWidget($model)!!}
        </div>
        <div class="col-8">
            <h2 class="text-center font-weight-bold">{{{$model->title}}}</h2>
            {!! $model->text !!}
        </div>
    </div>
@endsection
