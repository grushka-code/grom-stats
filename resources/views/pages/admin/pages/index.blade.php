@extends('layouts.admin')
@section('title','Pages')

@section('content')
    @include('partials.admin.status')

    <a href="{{route('admin.pages.create')}}">
        <button class="btn btn-success btn-lg"> Create New Page</button>
    </a>
    <table class="table table-striped" style="margin-top: 10px">
        <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Text</th>
            <th scope="col">Status</th>
            <th scope="col">Author</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($models as $model)
            <tr>
                <td>{{{\Illuminate\Support\Str::limit($model->title,25)}}}</td>
                <td>{{{\Illuminate\Support\Str::limit($model->text,150)}}}</td>
                <td>
                    <span class="badge badge-{{{$model->status_label}}}">{{{$model->status_title}}}</span>
                </td>
                <td> {{{$model->author_id}}}</td>
                <td>
                    <div class="row">
                        <div class="col">
                            <a href="{{route('admin.pages.edit',['page' => $model->id])}}">
                                <button class="btn btn-sm btn-primary">Edit</button>
                            </a>
                            <form method="post"
                                  action="{{route('admin.pages.destroy',['page' => $model->id])}}">

                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button class="btn btn-sm btn-warning">Delete</button>
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