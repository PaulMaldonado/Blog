@extends('adminlte::page')

@section('title', 'Admin - Categorías')

@section('content')
  <h1 class="text-primary mt-4">Categorías</h1> 

  <a href="categories/create" type="button" class="btn btn-primary">
    Nueva categoría
</a>

  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12 mt-4">
          <div class="card shadow-lg">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="categories">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Editar</th>
                      <th>Eliminar</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>

                        <td>
                          <a href="{{ route('admin.categories.edit', ['id' => $category->id]) }}" class="btn btn-success">
                            <i class="fas fa-edit"></i>
                          </a>
                        </td>

                        <td>
                          <form action="{{ route('admin.categories.delete', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $category->id }}">

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

  <!-- Modal -->
<div class="modal fade" id="categories-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
  <script>
    $(document).ready(function() {
        $('#categories').DataTable( {
            "order": [[ 3, "desc" ]]
        } );
    });
  </script>
@stop