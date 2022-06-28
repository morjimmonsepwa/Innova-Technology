@extends('admin.layouts.admin')

@section('cabecera')

        <!-- Page Cabecera -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Reportes</h1>
    </div>

@endsection

@section('contenido')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                
                <div>
                <a href="{{route('excel.reportes')}}"><button type="button" class="btn btn-primary">Reporte General</button></a>
                </div>
            </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Folio</th>
                            <th>Asunto</th>
                            <th>Motivo</th>
                            <th>Cliente</th>
                            <th>Asignado a</th>
                            <th>Generado por</th>
                            <th>N° Reportado</th>
                            <th>Status</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($tickets as $ticket)
                        <tr>
                            <td>
                                {{$ticket->id}}
                            </td>
                            <td>
                                {{$ticket->affair}}
                            </td>
                            <td>
                                {{$ticket->reason}}
                            </td>
                            <td>
                                {{$ticket->client}}
                            </td>
                            <td>
                                {{$ticket->asignado->name ?? 'Sin asignación' }}
                            </td>
                            <td>
                                {{$ticket->generado->name ?? 'Sin Generado'   }}
                            </td>
                            <td>
                               1
                            </td>
                            <td>
                                @if ($ticket->status == 1)
                                    <p class="text-success">Abierto</p>
                                @endif
                                @if ($ticket->status == 2)
                                    <p class="text-warning">Proceso</p>
                                @endif
                                @if ($ticket->status == 3)
                                    <p class="text-danger">Cerrado</p>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{route('pdf.reportes',$ticket->id)}}" class="btn btn-danger">
                                    <i class="fas fa-file-pdf"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    <!-- /.container-fluid -->

    
@endsection