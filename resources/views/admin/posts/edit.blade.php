@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar publicaciones</h1>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
            <div class="card shadow-lg">
                <div class="card-body">
                    <form action="/admin/posts/update" method="POST">
                        <input type="hidden" name="id" value="{{ $post->id }}">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6 col-xxl-6">
                                <div class="form-group">
                                    <label>Título: </label>
                                    <input type="text" class="form-control" value="{{ $post->title }}" name="title" placeholder="Título..." required>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6 col-xxl-6">
                                <div class="form-group">
                                    <label>Descripción: </label>
                                    <textarea name="description" rows="1" class="form-control" placeholder="Descripción..." required>{{ $post->description }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6 col-xxl-6">
                                <div class="form-group">
                                    <label>Categoría: </label>
                                    <select name="category_id" class="form-control" required>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6 col-xxl-6">
                                <div class="form-group">
                                    <label>Autor: </label>
                                    <input type="text" name="author" value="{{ $post->author }}" class="form-control" placeholder="Autor...">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Actualizar</button>
                    </form>
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