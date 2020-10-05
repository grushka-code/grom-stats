@extends('layouts.admin')
@section('title','User Create')

@section('content')
    <form method="post" action="{{route('admin.users.store')}}">
        {{{csrf_field()}}}
        <div class="form-group">
            <label for="title">Name</label>
            <input type="text" class="form-control" id="name" name="name" required aria-describedby="nameHelp"
                   placeholder="Name">
            <small id="nameHelp" class="form-text text-muted">Name, max length 255</small>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required aria-describedby="emailHelp"
                   placeholder="Email">
            <small id="emailHelp" class="form-text text-muted">Email</small>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="text" class="form-control" id="password" name="password" required aria-describedby="passwordHelp"
                   placeholder="Password">
            <small id="passwordHelp" class="form-text text-muted">Password</small>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
