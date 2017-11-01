<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Landing FIFA ">
    <meta name="author" content="Nahum Silva">

    <meta property="og:title" content="FIFA" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Descripcion FIFA" />
   

    <title>FIFA</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
   <script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('/js/smoothscroll.js') }}"></script>
    <script src="{{ url('/js/intro.js') }}"></script>

</head>

<body data-spy="scroll" data-offset="0" data-target="#navigation">

<!-- Fixed navbar -->

<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top">
<a class="navbar-brand" href="#">FIFA</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNav">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="#">Nuevo Equipo <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Estadisticas</a>
    </li>
    </li>
  </ul>
</div>
</nav>


<section id="home" name="home"></section>
<div id="intro" >
<form id="formulario" action="{{url('new_team')}}" method="post"
 style="padding-left:10em; padding-right:10em;padding-top:2em;padding-bottom:3em;">
 <input type="hidden" id="_token"  name="_token" value="{{csrf_token()}}">
  <div class="form-group">
    <label for="exampleFormControlInput1">Nombre del Equipo</label>
    <input type="text" name="name_team" class="form-control" id="name_team" placeholder="Nombre">
  </div>
  <div class="form-group">
  <label for="exampleFormControlFile1">Imagen de la bandera</label>
  <input type="file" name="imagen_bandera" class="form-control-file" id="imagen_bandera">
</div>
<div class="form-group">
    <label for="exampleFormControlFile1">imagen del escudo del equipo</label>
    <input type="file" name="imagen_escudo" class="form-control-file" id="imagen_escudo">
</div>

   <fieldset>
      <label>Jugadores</label>
      <input type="button" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" value="+" />
      <input type="button"  class="btn btn-danger" id="btnDel" value="-" />
   </fieldset>
   <fieldset style="margin-top:2em;">
      <label>cuerpo tecnico</label>
      <input type="button" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2" value="+" />
      <input type="button"  class="btn btn-danger" id="btnDel" value="-" />
   </fieldset>
   <button type="button" id="formulario_completo" class="btn btn-primary">Crear Equipo</button>
</form>
</div>
<!-- Modal -->
<div class="modal fade" style="padding-top:10em;" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Jugador del equipo</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
            <fieldset id="input1" class="clonedInput">
        <label for="exampleFormControlFile1" style="font-size: xx-large;">Nuevo jugador</label>
            <div class="form-group">
                <label for="exampleFormControlFile1">Foto del jugador</label>
                <input type="file" name="foto_jugador1" class="form-control-file" id="foto_jugador1">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Nombre del jugador</label>
                <input type="text" name="nombre_jugador1" id="nombre_jugador1" class="form-control" placeholder="Nombre">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Apellido del jugador</label>
                <input type="text" name="apellido_jugador1" id="apellido_jugador1" class="form-control" placeholder="Apellido">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Fecha de nacimiento</label>
                <input type="date" name="fecha_nacimiento1" id="fecha_nacimiento1" class="form-control" placeholder="Nombre">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">posición del jugador</label>
                <input type="text" name="posicion_jugador1" id="posicion_jugador1" class="form-control" placeholder="Nombre">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Numero de camiseta</label>
                <input type="number" name="numero_camiseta_jugador1" id="numero_camiseta_jugador1" class="form-control" placeholder="Numero">
            </div>
            <div class="form-group">
            <label for="exampleFormControlInput1">Es titular?</label>
            <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="" type="radio" name="radioYES_jugador1" id="radioYES_jugador1" value=""> Si
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="" type="radio" name="radioNO_jugador1" id="radioNO_jugador1" value=""> No
            </label>
          </div>
          
        </fieldset>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="button" id="jugador_new" class="btn btn-primary">Save changes</button>
    </div>
  </div>
</div>
</div>
<div class="modal fade" style="padding-top:10em;" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">cuerpo tecnico</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
            <fieldset id="input1" class="clonedInput">
        <label for="exampleFormControlFile1" style="font-size: xx-large;">Nuevo tecnico</label>
           
            <div class="form-group">
                <label for="exampleFormControlInput1">Nombre del tecnico</label>
                <input type="text" name="nombre_tecnico1" id="nombre_tecnico1" class="form-control" placeholder="Nombre">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Apellido del tecnico</label>
                <input type="text" name="apellido_tecnico1" id="apellido_tecnico1" class="form-control" placeholder="Apellido">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Fecha de nacimiento</label>
                <input type="date" name="fecha_nacimiento_tecnico1" id="fecha_nacimiento_tecnico1" class="form-control" placeholder="Nombre">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Nacionalidad del tecnico</label>
                <input type="text" name="nacionalidad_tecnico" id="nacionalidad_tecnico" class="form-control" placeholder="Nacionalidad">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Rol del tecnico   </label>
                <input type="text" name="rol_tecnico1" id="rol_tecnico1" class="form-control" placeholder="Rol">
            </div>
            
        </fieldset>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="button" id="new_tec" class="btn btn-primary">Save changes</button>
    </div>
  </div>
</div>
</div>


</body>
</html>
