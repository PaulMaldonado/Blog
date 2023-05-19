@extends('adminlte::page')

@section('title', 'Panel de control')

@section('content_header')
    <h1>Panel de control</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 col-lg-4 col-xl-4 col-xxl-4">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $countCategories }} <sup style="font-size: 20px;"></sup></h3>
                        <p>Categorías</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-list"></i>
                    </div>

                    <a href="{{ route('admin.categories.index') }}" class="small-box-footer">Lista de categorías <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-md-4 col-sm-12 col-lg-4 col-xl-4 col-xxl-4">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{ $countPosts }} <sup style="font-size: 20px;"></sup></h3>
                        <p>Publicaciones</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-sticky-note"></i>
                    </div>

                    <a href="{{ route('admin.posts.index') }}" class="small-box-footer">Lista de publicaciones <i class="fas fa-arrow-circle-right"></i></a>
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
