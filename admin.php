<?php
  include 'conexion.php';

  $base = conecta();
  $query = "SELECT * FROM alumnos;";

  $data = mysqli_query($base, $query);
  
  session_start();

  if (!isset($_SESSION["privilegio"])) {
    header("Location: /DominoCanvas/");
  }else if( !$_SESSION["privilegio"] ){
    header("Location: /DominoCanvas/domino.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Titulo crazy</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bienvenido <?=$_SESSION["nombre"]?><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="morir.php">Cerrar Sesion</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container">
      <div class="starter-template">
        <h1>Gestion de alumnos</h1>
        <button type="button" data-toggle="modal" data-target="#modal" class="btn btn-primary btn-lg" >
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo
        </button>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">Lista de Alumnos</div>
        <table class="table">
          <thead>
            <tr>
              <th>Boleta</th>
              <th>Nombres</th>
              <th>Apellido Paterno</th>
              <th>Apellido Materno</th>
              <th>Correo</th>
              <th>Calificacion 1</th>
              <th>Calificacion 2</th>
              <th>Calificacion 3</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
              <?php   
                foreach($data as $fila):
              ?>
              <tr>
                <td id="<?=$fila['boleta']?>"><?=$fila['boleta']?></td>
                <td id="nombres<?=$fila['boleta']?>"><?=$fila['nombres']?></td>
                <td id="apellidoP<?=$fila['boleta']?>"><?=$fila['apellidoP']?></td>
                <td id="apellidoM<?=$fila['boleta']?>"><?=$fila['apellidoM']?></td>
                <td id="mail<?=$fila['boleta']?>"><?=$fila['mail']?></td>
                <td id="calif1<?=$fila['boleta']?>"><?=$fila['calif1']?></td>
                <td id="calif2<?=$fila['boleta']?>"><?=$fila['calif2']?></td>
                <td id="calif3<?=$fila['boleta']?>"><?=$fila['calif3']?></td>
                <input type="hidden" id="contrasenia<?=$fila['boleta']?>" value="<?=$fila['contrasenia']?>">
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-danger">Seleccione</button>
                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a class="eliminar" href="#" data-toggle="modal" data-target="#modal3" id="<?=$fila['boleta']?>">Eliminar</a></li>
                      <li><a class="actualizar" href="#" data-toggle="modal" data-target="#modal2" id="<?=$fila['boleta']?>">Actualizar</a></li>
                    </ul>
                  </div>
                </td>
              </tr>
              <?php   
                endforeach;
              ?>
             </tbody>
        </table>
      </div>
      <!-- para agregar -->
      <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Nuevo Usuario</h4>
            </div>
            <form role="form" action="ingresar.php" method="POST" name="registrar">
              <div class="col-lg-12">
                <br>
                <div class="form-group">
                  <label>Boleta</label>
                  <input name="boleta" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Nombres</label>
                  <input name="nombres" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Apellido Paterno</label>
                  <input name="app" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Apellido Materno</label>
                  <input name="apm" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Correo</label>
                  <input name="mail" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Contrasenia</label>
                  <input name="contra" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-info btn-lg">Registrar
                </button>
              </div>
            </form>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
      <!-- para modificar -->
      <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Actualiza Alumno</h4>
            </div>
            <form role="form" action="actualizar.php" method="POST" name="actualizar">
              <div class="col-lg-12">
                <br>
                <input type="hidden" id="nuevoBoleta" name="boleta" class="form-control" required>
                <div class="form-group">
                  <label>Nombres</label>
                  <input id="nuevoNombres" name="nombres" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Apellido Paterno</label>
                  <input id="nuevoApp" name="app" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Apellido Materno</label>
                  <input id="nuevoApm" name="apm" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Correo</label>
                  <input id="nuevoMail" name="mail" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Contrasenia</label>
                  <input id="nuevoContra" name="contra" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-info btn-lg">Registrar
                </button>
              </div>
            </form>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
      <!-- para borrar -->
      <div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form  role="form" action="borrar.php" method="POST" name="borrar">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Borrar Alumno</h4>
              </div>
              <div class="modal-body">
                <input type="hidden" id="boletaBye" name="boletaBye">
                Estas seguro de borrar el usuario?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Borrar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/logica.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>