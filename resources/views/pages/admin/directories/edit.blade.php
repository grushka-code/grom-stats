@extends('layouts.admin')
@section('title','Directory Edit')

@section('content')
    <form method="post" action="{{route('admin.directories.update',['directory' => $model->id])}}">
        {{{csrf_field()}}}
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="title">Directory Title</label>
            <input type="text" class="form-control" id="title" name="title" required aria-describedby="titleHelp"
                   placeholder="title" value="{{{$model->title}}}">
            <small id="titleHelp" class="form-text text-muted">Directory title, max length 255</small>
        </div>
        <div class="form-group">
            <label for="parent">Parent Directory</label>
            <select class="form-control" id="parent" name="parent_id">
                <option value="" @if($model->parent_id == null) selected @endif>--//--</option>
                @foreach($parents as $id=>$title)
                    @if($id !== $model->id)
                        <option value="{{{$id}}}" @if($model->parent_id == $id) selected @endif>{{{$title}}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="visible" name="visible" value="1"
                   @if($model->visible) checked @endif>
            <label class="form-check-label" for="visible">Visible</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
