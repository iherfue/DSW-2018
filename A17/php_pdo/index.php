<?php
   require_once('conexion.php');  //agregamos la conexion

   //INSERTAR USUARIOS
   if(isset($_POST["enviar"])){

       $sql = "insert into cliente (nombre,apellido,email,password) values(:nombre,:apellido,:email,:password)";
       //echo("<pre>\n" .$sql."\n</pre>\n");
       $prepar = $pdo->prepare($sql);   //pepara la consulta y ejecuta (solo si recibe parametros)
       $prepar->execute(array(
         ':nombre' => $_POST['nombre'],
         ':apellido' => $_POST['apellido'],
         ':email' => $_POST['email'],
         ':password' => $_POST['password']
       ));
       header("Location: {$_SERVER['PHP_SELF']}");
   }//fin del if


   //ELIMINAR USUARIOS

   if(isset($_POST["eliminar"])){

       $sql = "delete from cliente where id_cliente = :id";
       echo "<pre>\n$sql\n</pre>\n";
       $prepare = $pdo->prepare($sql);
       $prepare->execute(array(
         ':id' => $_POST['id_cliente']
       ));

       header("Location: {$_SERVER['PHP_SELF']}");
   }

    ?>
<html lang="es">
   <head>
      <title>Usuarios</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   </head>
   <body style="margin-left: 10px; width:600px;">
      <table class="table table-striped" style="text-align:center">
         <h2>Usuarios del Sistema</h2>
         <?php
            $consulta = $pdo->query("select id_cliente,nombre,apellido,email,password from cliente");
              while($row = $consulta->fetch(PDO::FETCH_ASSOC) ){  //array asociativo

                echo "<tr><td>";
                echo(strtoupper($row['nombre']));
                echo("</td><td>");
                echo(strtoupper($row['apellido']));
                echo("</td><td>");
                echo($row['email']);
                echo("</td><td>");
                echo($row['password']);
                echo("</td><td>");
                echo('<form method="POST"><input type="hidden" ');
                echo('name="id_cliente" value="'.$row['id_cliente'].'">'."\n");
                echo('<input type="submit" value="Eliminar" name="eliminar">');
                echo("\n</form>\n");
                echo("</td></tr>\n");
              }

            ?>
      </table>
      <!--Formulario de Registro-->
      <div>
         <h2>Añadir usuarios</h2>
         <form action="index.php" method="POST">
            <div class="form-group">
               <label for="nombre">Nombre</label>
               <input type="text" name="nombre" class="form-control" id="nombre" placeholder="nombre" required="required">
            </div>
            <div class="form-group">
               <label for="apellido">Apellido</label>
               <input type="text" name="apellido" class="form-control" id="apellido" placeholder="apellido" required="required">
            </div>
            <div class="form-group">
               <label for="email">Email</label>
               <input type="text" name="email" class="form-control" id="email" placeholder="email" required="required">
            </div>
            <div class="form-group">
               <label for="contraseña">Contraseña</label>
               <input type="text" name="password" class="form-control" id="contraseña" placeholder="password" required="required">
            </div>
            <button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
         </form>
      </div>
   </body>
</html>
