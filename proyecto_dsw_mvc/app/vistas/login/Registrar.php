<?php require_once "../app/vistas/inc/header.php";?>
<div class="row">
	<div class="col-md-5">
		<form method="POST">
			<h3>Registrarse</h3>
			<div class="form-group">
				<label for="email">Email</label>
					<input type="email" required name="email" class="form-control">
			</div>
			<div class="form-group">
				<label for="password">Contraseña</label>
					<input type="password" required class="form-control" name="pass">
			</div>
			<button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
			<a href="/proyecto_dsw_mvc/logins/"><button type="button"  class="btn btn-success">Volver</button></a>
		</form>
	</div>
</div>
<?php require_once "../app/vistas/inc/footer.php";   ?>
