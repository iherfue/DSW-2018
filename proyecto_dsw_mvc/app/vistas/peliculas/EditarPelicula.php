<?php require_once "../app/vistas/inc/header.php";
$g = $datos["genero"];
 ?>
<h3><?php echo _('Editar Pelicula')?></h3>

<div class="card" style="padding: 1%;">
<form action="/proyecto_dsw_mvc/peliculas/editar/<?php echo $datos['id_pelicula'] ?>" method="POST">
	<div class="form-row">
		<div class="form-group col-md-3">
			<label for="titulo"><?php echo _('Titulo')?></label>
			<input type="text" class="form-control" id="nombre" required="required" value="<?php echo $datos['titulo'];?>" name="titulo">
		</div>
		<div class="form-group col-md-3">
			<label for="anio"><?php echo _('Año')?></label>
			<input type="number" class="form-control" id="apellidos" required = "required" name="anio" value="<?php echo $datos['anio'];?>">
		</div>
		<!--MULTIPLES GENEROS-->
		<div class="form-group col-md-3">
		<label><?php echo _('Elija los géneros (opción multiple)')?></label>
		<div class="input-group mb-3">
  			<div class="input-group-prepend">
    			<div class="input-group-text">
      			<?php if(strstr($g, 'Fantasy')){?>
	      			<input type="checkbox" value="Fantasy" checked name="genero[]">
	      			<?php }else{?>
	      			<input type="checkbox" value="Fantasy" name="genero[]">
	      			<?php }?>
    			</div>
  			</div>
  			<input type="text" class="form-control" readonly=readonly value="Pelicula de Fantasia">
		</div>

		<div class="input-group mb-3">
  			<div class="input-group-prepend">
    			<div class="input-group-text">
      			<?php if(strstr($g, 'Action')){?>
	      			<input type="checkbox" value="Action" checked name="genero[]">
	      			<?php }else{?>
	      			<input type="checkbox" value="Action" name="genero[]">
	      			<?php }?>
    			</div>
  			</div>
  			<input type="text" class="form-control" readonly=readonly value="Pelicula de Acción">
		</div>
	</div>

	<div class="form-group col-md-3">
		<label><?php echo _('Géneros')?></label>
			<div class="input-group mb-3">
	  			<div class="input-group-prepend">
	    			<div class="input-group-text">
	      			<?php if(strstr($g, 'Sci-Fi')){?>
	      			<input type="checkbox" value="Sci-Fi" checked name="genero[]">
	      			<?php }else{?>
	      			<input type="checkbox" value="Sci-Fi" name="genero[]">
	      			<?php }?>
	    			</div>
	  			</div>
	  			<input type="text" class="form-control" readonly=readonly value="Pelicula de Sci-Fi">
			</div>

			<div class="input-group mb-3">
	  			<div class="input-group-prepend">
	    			<div class="input-group-text">
	      			<?php if(strstr($g, 'Adventure')){?>
	      			<input type="checkbox" value="Adventure" checked name="genero[]">
	      			<?php }else{?>
	      			<input type="checkbox" value="Adventure" name="genero[]">
	      			<?php }?>
	    			</div>
	  			</div>
	  			<input type="text" class="form-control" readonly=readonly value="Pelicula de Aventura">
			</div>
	</div>
	<div class="form-group col-md-3">
		<label><?php echo _('Géneros')?></label>
			<div class="input-group mb-3">
	  			<div class="input-group-prepend">
	    			<div class="input-group-text">
	    			<?php if(strstr($g, 'Family')){?>
	      			<input type="checkbox" value="Family" checked name="genero[]">
	      			<?php }else{?>
	      			<input type="checkbox" value="Family" name="genero[]">
	      			<?php }?>
	    			</div>
	  			</div>
	  			<input type="text" class="form-control" readonly=readonly value="Pelicula Familiar">
			</div>

			<div class="input-group mb-3">
	  			<div class="input-group-prepend">
	    			<div class="input-group-text">
	      			<?php if(strstr($g, 'Drama')){?>
	      			<input type="checkbox" value="Drama" checked name="genero[]">
	      			<?php }else{?>
	      			<input type="checkbox" value="Drama" name="genero[]">
	      			<?php }?>
	    			</div>
	  			</div>
	  			<input type="text" class="form-control" readonly=readonly value="Pelicula de Drama">
			</div>
	</div>
	<div class="form-group col-md-3">
		<label><?php echo _('Géneros')?></label>
			<div class="input-group mb-3">
	  			<div class="input-group-prepend">
	    			<div class="input-group-text">
					<?php if(strstr($g, 'Animation')){?>
	      			<input type="checkbox" value="Animation" checked name="genero[]">
	      			<?php }else{?>
	      			<input type="checkbox" value="Animation" name="genero[]">
	      			<?php }?>
	    			</div>
	  			</div>
	  			<input type="text" class="form-control" readonly=readonly value="Pelicula de Animación">
			</div>

			<div class="input-group mb-3">
	  			<div class="input-group-prepend">
	    			<div class="input-group-text">
	      			<?php if(strstr($g, 'Thriller')){?>
	      			<input type="checkbox" value="Thriller" checked name="genero[]">
	      			<?php }else{?>
	      			<input type="checkbox" value="Thriller" name="genero[]">
	      			<?php }?>
	    			</div>
	  			</div>
	  			<input type="text" class="form-control" readonly=readonly value="Pelicula de Thriller">
			</div>
	</div>

		<div class="form-group col-md-3">
	    	<label for="calificaion"><?php echo _('Calificación')?></label>
	    	<input type="text" class="form-control"  name="calificacion" value="<?php echo $datos['calificacion'];?>">
	  	</div>
	</div>
	<button type="submit" class="btn btn-primary" name="envia"><?php echo _('Enviar')?></button>
</form>
</div>
<br>
<a href="/proyecto_dsw_mvc/peliculas"><button class="btn btn-danger"><?php echo _('Cancelar')?></button></a>

<?php require_once "../app/vistas/inc/footer.php"; ?>
