@extends('admin.layouts.admin')

@section('cabecera')

    <!-- Page Cabecera -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Evaluación al Desempeño</h1>
        </div>
    <!-- Page Cabecera -->

@endsection

@section('contenido')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td class="text-center">
                                <img class="avatar" src="@if( $user->profile_photo_path == null ) {{  $user->profile_photo_url }} @else {{ asset('storage/'. $user->profile_photo_path) }}  @endif" />
                            </td>
                            <td>
                                {{$user->name}}
                            </td>
                            <td>
                                {{$user->email}}
                            </td>
                            <td class="text-center">
                                @if ( isset(json_decode(Auth::user()->rol->permisos,true)['usuarios.update']))
                                    <a for="#ver-{{$user->id}}" type="button" class="btn btn-circle btn-warning" data-bs-toggle="modal" data-bs-target="#ver-{{$user->id}}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                        <!-- Modales -->
                            <!-- Modal Ver-->
                                <div class="modal fade" id="ver-{{$user->id}}" tabindex="-3" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Evaluación</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row g-3 align-items-center">
                                                    <div class="col-auto">
                                                        <div class="container">
                                                            <div class="row">
                                                              <div class="col">
                                                                <select class="form-control" aria-label=".form-select-sm example">
                                                                    <option selected>Seleccionar Año</option>
                                                                    @for($i=date('o'); $i>=1910; $i--)
                                                                        @if ($i == date('o'))
                                                                            <option value="{{$i}}">{{$i}}</option>
                                                                        @else
                                                                            <option value="{{$i}}">{{$i}}</option>
                                                                        @endif
                                                                    @endfor
                                                                </select>
                                                              </div>
                                                              <div class="col">
                                                                <select class="form-control" aria-label=".form-select-sm example">
                                                                <option selected>Seleccionar Mes</option>
                                                                <option>Enero</option>
                                                                <option>Febrero</option>
                                                                <option>Marzo</option>
                                                                <option>Abril</option>
                                                                <option>Mayo</option>
                                                                <option>Junio</option>
                                                                <option>Julio</option>
                                                                <option>Agosto</option>
                                                                <option>Septiembre</option>
                                                                <option>Octubre</option>
                                                                <option>Noviembre</option>
                                                                <option>Diciembre</option>
                                                                    <!--<?php
                                                                        $Meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio','Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
                                                                        for ($i=1; $i<=12; $i++) {
                                                                            if ($i == date('m'))
                                                                        echo '<option value="'.$i.'"selected>'.$Meses[($i)-1].'</option>';
                                                                            else
                                                                        echo '<option value="'.$i.'">'.$Meses[($i)-1].'</option>';
                                                                        }
                                                                    ?>-->
                                                                    <!--<option selected>Seleccionar Mes</option>
                                                                        @for ($i=1; $i<=12; $i++) 
                                                                        @if ($i == date('m'))
                                                                            <option value="{{$i}}">{{$i}}</option>
                                                                        @else
                                                                            <option value="{{$i}}">{{$i}}</option>
                                                                        @endif
                                                                    @endfor-->
                                                                </select>
                                                              </div>
                                                            </div>
                                                          </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="card shadow mb-4">
                                                    <div class="chart-pie pt-4">
                                                        {{-- <canvas id="myPieChart"></canvas> --}}
                                                        <div id="chartdiv"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- Modal Ver --> 
                        <!-- Modales -->
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Styles -->
<style>
    #chartdiv {
      width: 100%;
      height: 300px;
    }
    </style>
    
@endsection


