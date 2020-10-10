@extends('layouts.admin')
@section('title','Directory Create')

@section('content')
    <form method="post" action="{{route('admin.directories.store')}}">
        {{{csrf_field()}}}
        <div class="form-group">
            <label for="title">Directory  title</label>
            <input type="text" class="form-control" id="title" name="title" required aria-describedby="titleHelp" placeholder="title">
            <small id="titleHelp" class="form-text text-muted">Directory title, max length 255</small>
        </div>
        <div class="form-group">
            <label for="parent">Parent Directory</label>
            <select class="form-control" id="parent" name="parent_id">
                <option value="">--//--</option>
                @foreach($parents as $id=>$title)
                    <option value="{{{$id}}}">{{{$title}}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="visible" name="visible" value="1">
            <label class="form-check-label" for="visible">Visible</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
