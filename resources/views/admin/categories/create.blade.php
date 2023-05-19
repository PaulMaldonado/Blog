@extends('adminlte::page')

@section('title', 'Nueva categoría')

@section('content_header')
    <h1>Nueva categoría</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <form action="/admin/categories/store" method="POST">
                            @csrf
                            
                            <div class="form-group">
                                <label>Nombre de la categoría: </label>
                                <input type="text" name="name" class="form-control" placeholder="Nombre de la categoría...">
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">
                                Guardar
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