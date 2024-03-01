<?php
 require_once("../php/sesion.class.php");  
  $sesion = new sesion();
  $usuario = $sesion->get("usuario");
  
  if( $usuario == true){ 
        echo'<script type="text/javascript"> 
window.location.href="https://demo.javoxdigital.com.mx/index.php";</script>';
  }else{ ?>


<!DOCTYPE html>
<html lang="es-AR">
  <head>
    <!-- CHARSET -->
    <meta charset="UTF-8" />
    <!-- IE-EDGE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- VIEWPORT -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- DESCRIPTION -->
    <meta name="description" content="Desarrollo web desde cero" />
    <!-- AUTHOR -->
    <meta name="author" content="Javier Freddy" />
    <!-- TITTLE -->
    <title>Javier Freddy| CRUD-AJAX</title>
    <!-- STYLES -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
     <link rel="stylesheet" type="text/css" href="../css/principal.css">
  </head>
  <body>
    <nav class="navbar bg-primary">
      <div class="container-fluid">
        <a href="/index.php" class="navbar-brand fw-bold text-light">CRUD</a>
        	
              <h1>Hola  <?php echo $sesion->get("usuario"); ?> </h1>
        <form class="d-flex">
          <input type="search" id="search" placeholder="Buscar" class="form-control me-2" />
          <button type="submit" class="btn btn-warning">Buscar</button>
        </form>
      </div>
    </nav>

    <div class="container my-5">
      <div class="row p-4">
        <div class="col-md-5">
          <div class="card">
            <div class="card-body">
              <form id="task-form">
                <div class="form-group">
                  <input
                    type="text"
                    id="nombre"
                    placeholder="Nombre"
                    class="form-control my-2"
                  />
                 </div>
                 <div class="form-group">
                  <input
                    type="text"
                    id="apellido"
                    placeholder="Apellido"
                    class="form-control my-2"
                  />
                </div>
                 <div class="form-group">
                  <input
                    type="email"
                    id="correo"
                    placeholder="Correo"
                    class="form-control my-2"
                  />
                </div>
                <div class="form-group">
                  <textarea
                    name="domicilio"
                    id="domicilio"
                    cols="30"
                    rows="10"
                    class="form-control my-2"
                    placeholder="Domicilio"
                  ></textarea>
                </div>
                <input type="hidden" id="taskId" />
                <button type="submit" class="btn btn-primary text-center w-100">
                  Guardar Personal
                </button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-7">
          <div class="card my-4" id="task-result">
            <div class="card-body">
              <ul id="container"></ul>
            </div>
          </div>

          <table class="table table-bordered table-sm">
            <thead>
              <tr>
                <td class="text-center">ID</td>
                <td class="text-center">Nombre</td>
                <td class="text-center">Apellido</td>
                <td class="text-center">Domicilio</td>
                <td class="text-center">Correo</td>
              </tr>
            </thead>
            <tbody id="tasks"></tbody>
          </table>
        </div>
      </div>
    </div>

    <footer class="bg-dark p-2 mt-5 text-light position-fixed bottom-0 w-100 text-center">

    </footer>
    <script src="../js/jquery.js"></script>
    <script src="../js/ajax.js"></script>
  </body>
</html>


<?php	} ?>