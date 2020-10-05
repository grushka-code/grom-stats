@extends('layouts.admin')
@section('title','Directories')


@section('content')

   @include('partials.admin.status')
    <a href="{{route('admin.directories.create')}}">
        <button class="btn btn-success btn-lg"> Create New Directory</button>
    </a>
    <table class="table table-striped" style="margin-top: 10px">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Child's</th>
            <th scope="col">Visible</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($models as $model)
            <tr>
                <td>{{{$model->id}}}</td>
                <td>{{{$model->name}}}</td>
                <td>
                    @if($model->childs->isNotEmpty())
                        {{{ implode(', ',$model->childs->pluck('name')->toArray()) }}}
                    @else
                        --//--
                    @endif
                </td>
                <td>
                    @if($model->visible)
                        <i class="fas fa-check"></i>
                    @else
                        <i class="fas fa-times"></i>
                    @endif
                </td>
                <td>
                    <div class="row">
                        <div class="col-1">
                            <a href="{{route('admin.directories.edit',['directory' => $model->id])}}">
                                <button class="btn btn-sm btn-primary">Edit</button>
                            </a>
                        </div>
                        @if($model->pages->isEmpty() && $model->childs->isEmpty())
                        <div class="col-1">
                            <form method="post"
                                  action="{{route('admin.directories.destroy',['directory' => $model->id])}}">

                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button class="btn btn-sm btn-warning">Delete</button>
                            </form>
                        </div>
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $models->links() }}
@endsection