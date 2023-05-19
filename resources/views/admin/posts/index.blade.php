@extends('adminlte::page')

@section('title', 'Lista de publicaciones')

@section('content_header')
    <h1>Lista de publicaciones</h1>
    <a href="posts/create" class="btn btn-primary">Nueva publicación</a>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Título</th>
                                        <th>Descripción</th>
                                        <th>Categoría</th>
                                        <th>Autor</th>

                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->description }}</td>
                                            <td>{{ $post->category->name }}</td>
                                            <td>{{ $post->author }}</td>

                                            <td>
                                                <a href="{{ route('admin.posts.edit', ['id' => $post->id]) }}" class="btn btn-success">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>

                                            <td>
                                                <form action="/admin/posts/delete" method="POST">
                                                    <input type="hidden" value="{{ $post->id }}" name="id">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop