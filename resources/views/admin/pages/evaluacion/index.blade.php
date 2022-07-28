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
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <div class="list-group">
                        @if (Auth::user()->id_rol == 2)
                            @foreach  ($users as $item)
                                <a href="{{route('index.evaluacion',$item->id)}}" class="list-group-item list-group-item-action @if($item->id == $id_user) active  @endif">
                                    {{$item->name}}
                                        <br>
                                    {{$item->email}}
                                </a>
                            @endforeach
                        @else
                            @foreach  ($detalle as $item)
                                <a href="{{route('index.evaluacion',$item->id)}}" class="list-group-item list-group-item-action @if($item->id == $id_user) active  @endif">
                                    {{$item->name}}
                                        <br>
                                    {{$item->email}}
                                </a>
                            @endforeach
                        @endif
                        </div> 
                    </div>
                    <div class="col-7">
                        <div class="row">
                            <div class="col-md-10 offset-md-1">
                                <body wire:ignore.self>
                                    <canvas id="myChart" height="100px"></canvas>
                                </body>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
                                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                <script type="text/javascript">
                                    
                                const ctx = document.getElementById('myChart').getContext('2d');
                                const myChart = new Chart(ctx, {
                                    type: 'pie',
                                    data: {
                                        labels: [
                                            'Cerrados',
                                            'Abiertos',
                                            'Proceso'
                                        ],
                                        datasets: [{
                                            label: 'My First Dataset',
                                            data: 
                                                {{$data}}
                                            ,
                                            backgroundColor: [
                                            'rgb(255, 99, 132)',
                                            'rgb(92, 205, 70)',
                                            'rgb(255, 205, 86)'
                                            ],
                                            hoverOffset: 4
                                        }]
                                    },
                                });
                                </script>
                            </div>
                            @foreach ($users as $user)
                                @if ($user->id == $id_user)
                                    <h5>{{$user->name}}</h5>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


