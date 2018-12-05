<?php require_once "../app/vistas/inc/header.php";   ?>

<h3><?php echo _('Insertar')?></h3>
<?php
if(isset($_SESSION["error"])){

	echo '<div class="alert alert-danger" role="alert">'. htmlentities($_SESSION['error']).'</div>';
	unset($_SESSION["error"]);
}
?>
<div class="card" style="padding: 1%;">
<form method="POST">
	<div class="form-row">
		<div class="form-group col-md-3">
			<label for="nombre"><?php echo _('Nombre')?></label>
			<input type="text" class="form-control" id="nombre" required = "required" name="nombre">
		</div>
		<div class="form-group col-md-3">
			<label for="apellidos"><?php echo _('Apellidos')?></label>
			<input type="text" class="form-control" id="apellidos" required = "required" name="apellidos">
		</div>
		<div class="form-group col-md-4">
	    	<label for="direccion"><?php echo _('Dirección')?></label>
	    	<input type="text" class="form-control" id="direccion" placeholder= "C/Galicia,4" required = "required" name="direccion">
	  	</div>
		<div class="form-group col-md-3">
	    	<label for="tel"><?php echo _('Teléfono')?></label>
	    	<input type="tel" class="form-control" id="tel" minlength=9 maxlength="9" name="telefono">
	  	</div>
		<div class="form-group">
			<label for="dni">DNI*</label>
	    	<input type="text" class="form-control" id="dni" minlength=9 maxlength="9" name="dni">
		</div>
</div>
	<p><b><?php echo _('Son obligatorios')?></b></p>
	<button type="submit" class="btn btn-primary" name="envia"><?php echo _('Enviar')?></button>
	<a href="/proyecto_dsw_mvc/socios"><button type="button" class="btn btn-info" name="envia"><?php echo _('Cancelar')?></button></a>
</form>
</div>

<?php require_once "../app/vistas/inc/footer.php"; ?>
