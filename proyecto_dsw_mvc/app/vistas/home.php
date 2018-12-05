<?php require_once "../app/vistas/inc/header.php"; ?>

<form  method="POST">
  <button type="submit" class="btn btn-light" name="cambia_idioma_en" value="Inglés"><img src="/proyecto_dsw_mvc/img/ingles.png" width="50"></button>
	<button type="submit" class="btn btn-light" name="cambia_idioma_es" value="Español"><img src="/proyecto_dsw_mvc/img/bandera_española.png" width="50"></button>
</form>
<h5><?php echo _('Bienvenido')?> <?php echo $_SESSION["email"]?>
<a href="/proyecto_dsw_mvc/home/logout" style="float: right;"><?php echo _('Cerrar sesión')?></a></h5>
<div class="card-group">
	<div class="col-md-3">
		<a href="/proyecto_dsw_mvc/socios" style="text-decoration: none; color: black">
		<div class="card bg-light">
	  		<div class="card-header"><?php echo _('Socios')?></div>
	  		<div class="card-body">
	    		<h5 class="card-title"><?php echo _('Gestion de socios')?></h5>
	    		<img src="/proyecto_dsw_mvc/img/socios.png" width="100">
	  		</div>
		</div></a>
	</div>

	<div class="col-md-3">
		<a href="/proyecto_dsw_mvc/peliculas" style="text-decoration: none; color: black">
		<div class="card bg-light" style="margin-left:-10px;">
	  		<div class="card-header"><?php echo _('Peliculas')?></div>
	  		<div class="card-body">
	    		<h5 class="card-title"><?php echo _('Gestión de Peliculas')?></h5>
	    		<img src="/proyecto_dsw_mvc/img/peliculas.svg" width="100">
	  		</div>
		</div></a>
	</div>
	<div class="col-md-3">
		<a href="/proyecto_dsw_mvc/alquileres" style="text-decoration: none; color: black">
		<div class="card bg-light" style="margin-left:-10px;">
	  		<div class="card-header"><?php echo _('Peliculas')?></div>
	  		<div class="card-body">
	    		<h5 class="card-title"><?php echo _('Gestión de alquileres')?></h5>
	    		<img src="/proyecto_dsw_mvc/img/peliculas.svg" width="100">
	  		</div>
		</div>
		</a>
	</div>
	<div class="col-md-3">
		<a href="/proyecto_dsw_mvc/home/log"<div class="card bg-light" style="text-decoration: none; color: black;margin-left:-10px;">
	  		<div class="card-header">Log</div>
	  		<div class="card-body">
	    		<h5 class="card-title"><?php echo _('Log de errores')?></h5>
	    		<img src="/proyecto_dsw_mvc/img/log.png" width="100">
	  		</div>
		</div></a>
	</div>
</div>
</body>
</html>
