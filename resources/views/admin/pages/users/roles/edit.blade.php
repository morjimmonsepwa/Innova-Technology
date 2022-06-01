@extends('admin.layouts.admin')

@section('cabecera')

        <!-- Page Cabecera -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Roles & Permisos</h1>
    </div>

@endsection

@section('contenido')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
        <div class="card-body">
            <div class="table-responsive">
                    <form action="{{ route('update.role',$rol->id) }} " method="POST">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name" name="name" id="name" class="form-label">Nombre</label>
                                <input type="text"  name="name" id="name" value="{{$rol->name}}" class="form-control" aria-describedby="nombre">
                            </div>
                            <label for="permisos" class="form-label">Permisos:</label>
                            <div class="mb-3">
                                <div class="container overflow-hidden">
                                    <div class="container">
                                        <div class="row row-cols-3">
                                            @foreach ($permisos as $key=>$value ) 
                                                <div class="col">
                                                    <input class="form-check-input" name="permisos[]" value="{{$key}}" type="checkbox" role="switch" id="flexSwitchCheckDefault"
                                                    
                                                        @if( $rol->permisos == null)
                                                        @else
                                                            @foreach( $rol->permisos as $key1 => $boolean)
                                
                                                                @if($key1==$key)
                                                                    checked
                                                                @endif

                                                            @endforeach
                                                        @endif
                                                        >                                                  
                
                                                    <label class="form-check-label" for="flexSwitchCheckDefault">{{ str_replace('.',' ',$key ) }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                        <a href="{{ route('index.role') }}" class="btn btn-secondary">Regresar</a>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
        </div>
    </div>
    </div>
    <!-- /.container-fluid -->

@endsection
