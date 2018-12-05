<?php require_once "../app/vistas/inc/header.php";
if(isset($_SESSION["notfound"])){

  echo '<div class="alert alert-danger" role="alert">'. $_SESSION["notfound"] .'</div>';
  unset($_SESSION["notfound"]);

}
 ?>

<!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#datos"><?php echo _('Insertar pelicula automáticamente')?></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#manual"><?php echo _('Insertar pelicula manualmente')?></a>
  </li>
</ul>

  <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
  	<div class="porcentaje"></div>
  </div>

 	<div id="carga" style="display: none;">
 		<h3><b><?php echo _('Cargando información desde la API por favor espere')?></b></h3>
 	</div>
 	</div>
<?php
//se comprueba si una de las claves esxiste en el array, eso quiere decir que el usuario busca una peli y se muestra el form
if(array_key_exists('Title',$datos)){

	flush();
	$total = 200;

	for ($i = 0; $i <= $total; $i = $i + 30):

    	$actual = $i;
    	$porcentaje = round(($actual / $total) * 111, 0);
    ?>
    	<script type="text/javascript">
    		document.getElementById("carga").style.display = "block";
        	document.getElementsByClassName("progress-bar")[0].style.width = "<?php echo $porcentaje; ?>%";//mueve barra
        	document.getElementsByClassName("porcentaje")[0].innerHTML = "<?php echo $porcentaje; ?>%";//mueve porcentaje
    	</script>
    <?php
    	@ob_flush();

	    flush();
    	usleep(500000);
	endfor;

	echo '<style>.form-dos { display:block;}</style>';
	?>

	<script type="text/javascript">

		if(document.getElementsByClassName("porcentaje")[0].innerHTML == "100%"){
			console.log("100%");
			document.getElementsByClassName("porcentaje")[0].style.display = "none";
			document.getElementById("carga").style.display = "none";
		}
	</script>
	<?php } //FIN DEL IF GENERAL;?>

<div class="container">
	<div class="tab-content">
		<div class="tab-pane container active" id="datos">
	<h2><?php echo _('Buscar pelicula')?></h2>
 <div class="col-md-5">
	<form method="POST" class="form-inline">
		<div class="form-group">
			<label for="nombre"><?php echo _('Nombre')?></label>
			<input type="text" class="form-control" id="nombre" name="pelicula">
		</div>
		<button type="submit" class="btn btn-primary" name="busca_peli"><?php echo _('Buscar')?></button><br><br><br>

	</form>
	</div>
	<div class="form-dos col-md-5">
	<h2><?php echo _('Resultado')?></h2>
	 	<form action="/proyecto_dsw_mvc/peliculas/add" method="POST">
	 		<div class="form-group">
	 		<label for="titulo"><?php echo _('Título')?></label>
	 			<input type="text" class="form-control" readonly="readonly" id="titulo" value="<?php echo $datos->Title;?>" name="titulo">
	 		<label for="anio"><?php echo _('Año')?></label>
	 			<input type="text" class="form-control" readonly="readonly" id="anio" value="<?php echo $datos->Year;?>" name="anio">
	 		<label for="genero"><?php echo _('Género')?></label>
	 			<input type="text" class="form-control" readonly="readonly" id="genero" value="<?php echo $datos->Genre;?>" name="genero">
	 			<?php echo _('Calificación')?><input type="text" readonly="readonly" class="form-control" value="<?php echo  $datos->imdbRating;?>" name="calificacion">
	 			<input type="text" readonly="readonly" style="display: none;" value="<?php echo  $datos->Poster;?>" name="imagen"><br/>
	 			<input type="submit" class="btn btn-primary mb-2" name="envia_auto" value="<?php echo _('Enviar')?>">
	 			<a href="/proyecto_dsw_mvc/peliculas"><input type="button" class="btn btn-danger mb-2" value="<?php echo _('Cancelar')?>"></a>
	 		</div>
	 	</form>
	</div>
	</div>


	<div class="tab-pane container fade" id="manual">
		<div class="col-md-9">
			<h2>Insertar una película</h2>
	 	<form action="/proyecto_dsw_mvc/peliculas/add" method="POST" enctype="multipart/form-data">
	 		<div class="form-group">
	 		<label for="titulo"><b>Título</b></label>
	 			<input type="text" class="form-control" id="titulo" required name="titulo">
	 		<label for="anio"><b>Año</b></label>
	 			<input type="numeric" maxlength="4" minlength="4" required class="form-control" id="anio" name="anio">
	 		<label for="genero"><b>Género</b></label><br/>
	 			<input type="checkbox" value="Fantasy" name="genero[]"><b>Fantasia</b>
	 			<input type="checkbox" value="Action" name="genero[]"><b>Acción</b>
	 			<input type="checkbox" value="Sci-Fi" name="genero[]"><b>Sci-Fi"</b>
	 			<input type="checkbox" value="Adventure" name="genero[]"><b>Adventure</b>
	 			<input type="checkbox" value="Family" name="genero[]"><b>Familiar</b>
	 			<input type="checkbox" value="Drama" name="genero[]"><b>Drama</b>
	 			<input type="checkbox" value="Animation" name="genero[]"><b>Animación</b>
	 			<input type="checkbox" value="Thriller" name="genero[]"><b>Thriller</b>
        <br/>
	 			<label><b>Calificación</b></label>
	 			<input type="text" class="form-control" name="calificacion">
	 			<b><label>Imagen</label> (No debe contener espacios)</b><br/>
	 			<input type="file" name="imagen"><br/><br/>

	 			<input type="submit" class="btn btn-primary mb-2" name="envia_manual" value="enviar">
	 			<a href="/proyecto_dsw_mvc/peliculas"><input type="button" class="btn btn-danger mb-2" value="Cancelar"></a>
	 		</div>
	 	</form>
		</div>
	</div>
</div>
	<a href="/proyecto_dsw_mvc/peliculas"><button class="btn btn-success">Volver</button></a>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>
