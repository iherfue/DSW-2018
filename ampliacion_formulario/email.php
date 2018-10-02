<?php 
error_reporting(0);
if (isset($_POST['apellido']))
    $apellido = $_POST['apellido'];

if (isset($_POST['ocupacion']))
    $ocupacion = $_POST['ocupacion'];

if (isset($_POST['direc_envio']))
    $direc_envio = $_POST['direc_envio'];

if (isset($_POST['email']))
    $email = $_POST['email'];

if (isset($_POST['telefono']))
    $telefono = $_POST['telefono'];

if (isset($_POST['titulo']))
    $titulo = $_POST['titulo'];
?>


<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>
   $(document).ready(function()
   {
      $("#mostrarmodal").modal("show");
   });
</script>
<style type="text/css">

    .container {
        
        width: 500px;
    }
    
</style>
</head>
<body>
<div class="container">

	<h3>Suscripción</h3>

	<form  method="POST">
		<div class="form-group">
			<label for="apellido">Apellido</label>
			<input type="text" name="apellido" class="form-control" id="apellido" placeholder="arribi" aria-describedby="apellido_ayuda" required="required" value="<?php  htmlentities($apellido)?>" >
			<small id="apellido_ayuda" class="form-text text-muted">Es obligatorio</small>
		</div>
		<div class="form-group">
			<label for="ocupacion">Ocupación</label>
			<input type="text" name="ocupacion" class="form-control" placeholder="profesor" id="ocupacion"  value="<?php  htmlentities($ocupacion)?>" >
		</div>
		<div class="form-group">
			<label for="direccion">Dirección de envio</label>
			<input type="text" name="direc_envio" id="direccion" placeholder="C/perico" required="required" class="form-control" aria-describedby="direccion_obligatorio"  required="required" value="<?php htmlentities($direc_envio)?>">
			<small id="direccion_obligarorio" class="form-text text-muted">Es obligatorio</small>
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" name="email" id="email" aria-describedby="email_obli" required="required" placeholder="jesus@.com" class="form-control" value="<?php htmlentities($email)?>">
			<small id="email_obli" class="form-text text-muted">Es obligatorio</small>
		</div>
		<div class="form-group">
			<label for="telefono">Teléfono</label>
	   		<input type="tel" name="telefono" maxlength="9" id="telefono" placeholder="655878555" class="form-control" value="<?php  htmlentities($telefono)?>" >
	   	</div>
	   	<div class="form-group">
	   		<label for="titulo">Título</label>
	   		 <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Informática" value="<?php htmlentities($titulo)?>" >
	   </div>
		<button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
	</form>
<?php 

if(isset($_POST["enviar"])){
    
    $apellido = $_REQUEST["apellido"];
    $ocupacion = $_REQUEST["ocupacion"];
    $direc_envio = $_REQUEST["direc_envio"];
    $email = $_REQUEST["email"];
    $telefono = $_REQUEST["telefono"];
    $titulo = $_REQUEST["titulo"];
    
    $fi = fopen("prueba.txt","a")
    
    or die("problema al crear archivo");
    
    echo '
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Datos enviados, Gracias por su colaboración</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Puede consultarlos <a href="prueba.txt">aqui</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>';
    
    
    
    fwrite($fi,"Datos: ");
    fwrite($fi,"\n");
    fwrite($fi, "Apellido: " . $apellido);
    fwrite($fi,"\n");
    fwrite($fi,"Ocupacion: " . $ocupacion);
    fwrite($fi,"\n");
    fwrite($fi,"Direccion de Envio: " .$direc_envio);
    fwrite($fi,"\n");
    fwrite($fi,"Email: " .$email);
    fwrite($fi,"\n");
    fwrite($fi,"Telefono: " . $telefono);
    fwrite($fi,"\n");
    fwrite($fi,"Titulo: " . $titulo);
    fwrite($fi,"\n");
    
    fwrite($fi,"------------ \n\n");
    
     sleep(2);
}

?>
</div>

</body>
</html>