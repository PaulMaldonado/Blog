@extends('adminlte::page')

@section('title', 'Nueva categoría')

@section('content_header')
    <h1>Editar categoría</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <form action="{{ route('admin.categories.update', ['id' => $category->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-group">
                                <label>Nombre de la categoría: </label>
                                <input type="text" name="name" value="{{ $category->name }}" class="form-control" placeholder="Nombre de la categoría...">
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">
                                Actualizar
                            </button>
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