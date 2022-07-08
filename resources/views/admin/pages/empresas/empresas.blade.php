@extends('admin.layouts.admin')

@section('cabecera')

        <!-- Page Cabecera -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Empresas</h1>
    </div>

@endsection

@section('contenido')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div>
                    <button for="#agregar" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregar">Agregar</button>
                    <a  href="{{route('index.quejas')}}"><button  type="button" class="btn btn-secondary">Regresar</button></a>
                </div>
            </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Folio</th>
                            <th>Nombre</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($empresas as $empresa)
                        <tr class="text-center">
                            <td>
                                {{$empresa->id}}
                            </td>
                            <td>
                                {{$empresa->name}}
                            </td>
                            <td >
                                <a for="#editar-{{$empresa->id}}" type="button" class="btn btn-circle btn-primary" data-bs-toggle="modal" data-bs-target="#editar-{{$empresa->id}}">
                                    <i class="fas fa-highlighter"></i>
                                </a>
                                <a for="#eliminar-{{$empresa->id}}" type="button" class="btn btn-circle btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar-{{$empresa->id}}">
                                    <i class="fas fa-duotone fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <!-- Modales -->
                            <!-- Modal Editar--->
                                <div class="modal fade" id="editar-{{$empresa->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                   @livewire('company-edit',['id_company'=>$empresa->id])
                                </div>
                            <!-- Modal Editar --> 
                            <!-- Modal Eliminar -->
                                <div class="modal fade" tabindex="-2" id="eliminar-{{$empresa->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">¡Atención!</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Estas Seguro de Eliminar?</p>
                                            <small>{{$empresa->name}}</small>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <form action="{{route('destroy.empresas',$empresa->id)}}" method="post">
                                                @csrf
                                                {{ method_field('PUT')}}
                                                <button  type="submit" class="btn btn-primary">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- Modal Eliminar -->   
                        <!-- Modales -->
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    @livewire('company')

@endsection


