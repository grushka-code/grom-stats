@extends('layouts.admin')
@section('title','Page edit')

@section('content')
    <form method="post" action="{{route('admin.pages.update',['page' => $model->id])}}">
        {{{csrf_field()}}}
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required aria-describedby="titleHelp"
                   placeholder="Title" value="{{{$model->title}}}">
            <small id="titleHelp" class="form-text text-muted">Page title, max length 255</small>
        </div>
        <div class="form-group">
            <label for="parent">Directory</label>
            <select class="form-control" id="directory" name="directory_id">
                @foreach($directories as $id=>$parent)
                    <option value="{{{$id}}}" @if($model->directory_id == $id) selected @endif>{{{$parent}}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Text</label>
            <textarea class="form-control" id="textInput" name="text" required aria-describedby="textHelp">{{{$model->text}}}</textarea>
            <small id="ttextHelp" class="form-text text-muted">Main text</small>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
                @foreach($model->statusTitles as $id=>$status)
                    <option value="{{{$id}}}" @if($model->status == $id) selected @endif>{{{$status}}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
