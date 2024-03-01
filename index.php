 <?php

  require_once("./php/sesion.class.php");

  $sesion = new sesion();
  
  if( isset($_POST["iniciar"]) )
  { 
    $usuario  = $_POST["usuario"];
    $password = $_POST["contrasenia"];
    
    if(validarUsuario($usuario,$password) == true){     
      $sesion->set("usuario",$usuario);

                header("Location: /php/login.php");
                echo'<script type="text/javascript"> window.location.href="https://demo.javoxdigital.com.mx/php/login.php";</script>';

    }
    else 
    {
      echo "Verifica tu nombre de usuario y contraseña";
    }
  }
  
  function validarUsuario($usuario, $password)
  {
    $conexion = new mysqli("localhost","javoxdig_freddy","soyelnumero4","javoxdig_demo");
    $consulta = "SELECT contrasena_user FROM usuarios where nombre_user = '$usuario';";
    
    $result = $conexion->query($consulta);
    
    if($result->num_rows > 0)
    {
      $fila = $result->fetch_assoc();
      if( strcmp($password,$fila["contrasena_user"]) == 0 )
        return true;            
      else          
        return false;
    }
    else
        return false;
  }

?>
<html>
<head>
  <title>Página de inicio de sesión</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
</head>

<body>

    <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">

              <form name="frmLogin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                 <h2 class="mt-5 mb-4">Iniciar sesión</h2>
                <div>
                 <div class="form-group"> <label >Usuario: </label> <input type="text" class="form-control" name = "usuario"/></div>
                   <div class="form-group"><label>Contraseña: </label> <input type="password" class="form-control" name = "contrasenia" /></div>
                   <div class="form-group"><input type="submit" class="btn btn-primary"  name ="iniciar" value="Iniciar Sesion"/></div>
                </div>
              </form>
</div>
</div>
</div>
<script src="./js/bootstrap.min.js"></script>
</body>
</html>