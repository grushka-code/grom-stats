@extends('layouts.admin')
@section('title','Pages')

@section('content')
    @include('partials.admin.status')

    <a href="{{route('admin.users.create')}}">
        <button class="btn btn-success btn-lg"> Create New Users</button>
    </a>
    <table class="table table-striped" style="margin-top: 10px">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Roles</th>
            <th scope="col">Permissions</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($models as $model)
            <tr>
                <td>{{{$model->name}}}</td>
                <td>{{{$model->email}}}</td>
                <td>{{{ implode(', ',$model->roles->pluck('name')->toArray()) }}}</td>
                <td>{{{ implode(', ',$model->permissions->pluck('name')->toArray()) }}}</td>
                <td>
                    <span class="badge badge-{{{$model->status_label}}}">{{{$model->status_title}}}</span>
                </td>

                <td>
                    <div class="row">
                        <div class="col">
                            <a href="{{route('admin.users.edit',['user' => $model->id])}}">
                                <button class="btn btn btn-primary">Edit</button>
                            </a>
                        </div>
                        <div class="col">
                            <form method="post"
                                  action="{{route('admin.users.destroy',['user' => $model->id])}}">

                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button class="btn btn btn-warning">Delete</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $models->links() }}
@endsection
