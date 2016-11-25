<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Titulo crazy</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script type="text/javascript" src="js/ajax.js"></script>
</head>
<body>
  <nav class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Menu o algo</a>
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
              <tr>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>5</td>
                <td>5</td>
                <td>5</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-danger">Seleccione</button>
                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a>Eliminar</a></li>
                      <li><a>Actualizar</a></li>
                    </ul>
                  </div>
                </td>
              </tr>
             </tbody>
        </table>
      </div>

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
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
  </html>