@extends('layouts.admin')
@section('title','Directory Create')

@section('content')
    <form method="post" action="{{route('admin.directories.store')}}">
        {{{csrf_field()}}}
        <div class="form-group">
            <label for="name">Directory  Name</label>
            <input type="text" class="form-control" id="name" name="name" required aria-describedby="nameHelp" placeholder="Name">
            <small id="nameHelp" class="form-text text-muted">Directory name, max length 255</small>
        </div>
        <div class="form-group">
            <label for="parent">Parent Directory</label>
            <select class="form-control" id="parent" name="parent_id">
                <option value="">--//--</option>
                @foreach($parents as $id=>$parent)
                    <option value="{{{$id}}}">{{{$parent}}}</option>
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