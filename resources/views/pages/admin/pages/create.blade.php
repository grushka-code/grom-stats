@extends('layouts.admin')
@section('title','Page Create')

@section('content')
    <form method="post" action="{{route('admin.pages.store')}}">
        {{{csrf_field()}}}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required aria-describedby="titleHelp"
                   placeholder="Title">
            <small id="titleHelp" class="form-text text-muted">Page title, max length 255</small>
        </div>
        <div class="form-group">
            <label for="parent">Directory</label>
            <select class="form-control" id="directory" name="directory_id">
                @foreach($directories as $id=>$parent)
                    <option value="{{{$id}}}">{{{$parent}}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Text</label>
            <textarea class="form-control" id="textInput" name="text" required aria-describedby="textHelp"></textarea>
            <small id="ttextHelp" class="form-text text-muted">Main text</small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
