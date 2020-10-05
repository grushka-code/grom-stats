@extends('layouts.admin')
@section('title','User edit')

@section('content')
    <form method="post" action="{{route('admin.users.update',$model->id)}}">
        {{{csrf_field()}}}
        <div class="form-group">
            <label for="title">Name</label>
            <input type="text" class="form-control" id="name" name="name" required aria-describedby="nameHelp"
                   placeholder="Name" value="{{{$model->name}}}">
            <small id="nameHelp" class="form-text text-muted">Name, max length 255</small>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required aria-describedby="emailHelp"
                   placeholder="Email" value="{{{$model->email}}}">
            <small id="emailHelp" class="form-text text-muted">Email</small>
        </div>
            <input type="hidden" class="form-control" name="password" required value="{{{$model->password}}}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
