@extends('layouts.app')

@section('htmlheader_title')
  Home
@endsection


@section('main-content')

<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top">
        <a class="navbar-brand" href="#">FIFA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" href="{{url('/')}}">Nuevo Equipo <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('estadistica')}}">Estadisticas</a>
                </li>   
            </ul>
        </div>
    </nav>
  <div class="container spark-screen" style="margin-top: 3em;">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$equipos}}</h3>

              <p>Total Equipos</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$jugadores}}<sup style="font-size: 20px"></sup></h3>

              <p>Total Jugadores</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$suplentes}}</h3>

              <p>Total Jugadores Suplentes</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$promedio_edades}}</h3>

              <p>Edad Promedio de Jugadores</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

         <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$promedio_suplente}}</h3>

              <p>Promedio Jugadores suplentes</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
         <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$promedio_titular}}</h3>

              <p>Promedio de Jugadores</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
  </div>

  <div class="col-md-6 col-xs-12 col-lg-6 col-md-offset-3">
     <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jugador Mas Joven</span>
                <div class="table-responsive">
                <table id="example3" class="table no-margin">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Posicion</th>
                    <th>Fecha de Nacimiento</th>


                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($joven as $j)

                  <tr>
                    <td>{{$j->nombre}}</td>
                    <td>{{$j->apellido}}</td>
                    <td>{{$j->posicion_jugador}}</td>
                    <td>{{$j->fecha_nacimiento}}</td>


                  </tr>
                  @endforeach
                  
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jugador Mas Viejo</span>
             <div class="table-responsive">
                <table id="example3" class="table no-margin">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Posicion</th>
                    <th>Fecha de Nacimiento</th>


                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($viejo as $j)

                  <tr>
                    <td>{{$j->nombre}}</td>
                    <td>{{$j->apellido}}</td>
                    <td>{{$j->posicion_jugador}}</td>
                    <td>{{$j->fecha_nacimiento}}</td>


                  </tr>
                  @endforeach
                  
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Equipo con mas jugadores suplentes</span>
              <div class="table-responsive">
                <table id="example3" class="table no-margin">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Maximo</th>


                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($mas_suplentes as $j)

                  <tr>
                    <td>{{$j->nombre_equipo}}</td>
                    <td>{{$j->maximo}}</td>
                    

                  </tr>
                  @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tecnico mas Viejo</span>
              <div class="table-responsive">
                <table id="example3" class="table no-margin">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Nacionalidad</th>




                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($tecnico_viejo as $j)
                  <tr>
                    <td>{{$j->nombre}}</td>
                    <td>{{$j->apellido}}</td>
                    <td>{{$j->nacionalidad}}</td>

                    

                  </tr>
                  @endforeach
                  
                  </tbody>
                </table>
              </div>
            </div>
        </div>
         <!-- /.info-box -->
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tecnico Nacionalidad Distintas</span>
              <div class="table-responsive">
                <table id="example3" class="table no-margin">
              
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Nacionalidad</th>




                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($tecnico_nacionalidad as $j)
                  <tr>
                    <td>{{$j->nombre}}</td>
                    <td>{{$j->apellido}}</td>
                    <td>{{$j->nacionalidad}}</td>

                    

                  </tr>
                  @endforeach
                  
                  </tbody>
                </table>
              </div>
            </div>
        </div>

@endsection