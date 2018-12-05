<?php require_once "../app/vistas/inc/header.php";?>
<div class="row">
<div class="col-md-5">
		<form  method="POST">
        <h3>Iniciar Sesión</h3>
  			<div class="form-group">
    			<label for="email">Email</label>
    			<input type="email" required name ="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="email">
  			</div>
  			<div class="form-group">
    			<label for="pass">Contraseña</label>
    			<input type="password" required name="password" class="form-control" id="pass" placeholder="Contraseña">
  			</div>

  		<button type="submit" name="envia" class="btn btn-primary">Enviar</button>
      <a href="/proyecto_dsw_mvc/logins/registrar"><button type="button" name="envia" class="btn btn-info">Registrarme</button></a>
		</form>
</div>
</div>
<?php require_once "../app/vistas/inc/footer.php";   ?>
