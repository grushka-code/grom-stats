@extends('layouts.admin')
@section('title','Page edit')

@section('content')
    <form method="post" action="{{route('admin.pages.update',['page' => $model->id])}}">
        {{{csrf_field()}}}
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="title">Title</label>
            @if($errors->get('title'))
                <div class="alert alert-danger">
                    {{{$errors->get('title')}}}
                </div>
            @endif
            <input type="text" class="form-control" id="title" name="title" required aria-describedby="titleHelp"
                   placeholder="Title" value="{{{$model->title}}}">
            <small id="titleHelp" class="form-text text-muted">Page title, max length 255</small>
        </div>
        <div class="form-group">
            <label for="parent">Directory</label>
            @if($errors->get('directory_id'))
                <div class="alert alert-danger">
                    {{{$errors->get('directory_id')}}}
                </div>
            @endif
            <select class="form-control" id="directory" name="directory_id">
                @foreach($directories as $id=>$parent)
                    <option value="{{{$id}}}" @if($model->directory_id == $id) selected @endif>{{{$parent}}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            @if($errors->get('type'))
                <div class="alert alert-danger">
                    {{{$errors->get('type')}}}
                </div>
            @endif
            <select class="form-control" id="type" name="type">
                @foreach($types as $id=>$name)
                    <option value="{{{$id}}}" @if($model->type == $id) selected @endif>{{{$name}}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Text</label>
            <textarea class="form-control" id="textInput" name="text" required
                      aria-describedby="textHelp">{{{$model->text}}}</textarea>
            <small id="textHelp" class="form-text text-muted">Main text</small>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            @if($errors->get('text'))
                <div class="alert alert-danger">
                    {{{$errors->get('text')}}}
                </div>
            @endif
            <select class="form-control" id="status" name="status">
                @foreach($model->getStatusTitles() as $id=>$status)
                    <option value="{{{$id}}}" @if($model->status == $id) selected @endif>{{{$status}}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

@section('scripts')
    @parent
    @include('partials/admin/richtext')
@endsection
