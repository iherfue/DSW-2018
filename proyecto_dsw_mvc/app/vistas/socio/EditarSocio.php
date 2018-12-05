<?php require_once "../app/vistas/inc/header.php";   ?>
<h3><?php echo _('Editar Socio')?></h3>
<?php
if(isset($_SESSION["error"])){

	echo '<div class="alert alert-danger" role="alert">'. htmlentities($_SESSION['error']).'</div>';
	unset($_SESSION["error"]);
}
?>
<div class="card" style="padding: 1%;">
<form action="/proyecto_dsw_mvc/socios/editar/<?php echo $datos['id_socio'] ?>" method="POST">
	<div class="form-row">
		<div class="form-group col-md-3">
			<label for="nombre"><?php echo _('Nombre')?></></label>
			<input type="text" class="form-control" id="nombre" required="required" value="<?php echo $datos['nombre'];?>" name="nombre">
		</div>
		<div class="form-group col-md-3">
			<label for="apellidos"><?php echo _('Apellidos')?></label>
			<input type="text" class="form-control" id="apellidos" required = "required" name="apellidos" value="<?php echo $datos['apellidos'];?>">
		</div>
		<div class="form-group col-md-4">
	    	<label for="direccion"><?php echo _('Direccion')?></label>
	    	<input type="text" class="form-control" id="direccion" required = "required" name="direccion"  value="<?php echo $datos['direccion'];?>">
	  	</div>
		<div class="form-group col-md-3">
	    	<label for="tel"><?php echo _('Telefono')?></label>
	    	<input type="tel" class="form-control" id="tel"  maxlength="9" minlength=9 name="telefono" value="<?php echo $datos['telefono'];?>">
	  	</div>
		<div class="form-group">
			<label for="dni">DNI</label>
	    	<input type="text" class="form-control" id="dni" minlength=9 maxlength="9" name="dni" value="<?php echo $datos['dni'];?>">
		</div>
	</div>
	<button type="submit" class="btn btn-primary" name="envia"><?php echo _('Enviar')?></button>
</form>
</div>
<br>
<a href="/proyecto_dsw_mvc/socios"><button class="btn btn-danger"><?php echo _('Cancelar')?></button></a>

<?php require_once "../app/vistas/inc/footer.php"; ?>
