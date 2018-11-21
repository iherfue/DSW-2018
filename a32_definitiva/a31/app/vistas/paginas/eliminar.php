<?php
require_once "../app/vistas/inc/header.php";

 ?>

<div class="container">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<h4>Eliminar Usuario</h4>
					<form method="POST">
						<input type="submit" class="btn btn-danger btn-sm" name="elimina" value="Eliminar">
					</form>
					<div class="alert alert-warning">
                        <strong>Atención!</strong>Seguro que desea realizar esta operación
                    </div>
                    <a href="<?php echo RUTA_URL; ?>/paginas"><button class="btn">volver</button></a>
			</div>
		</div>
	</div>
</div>
</body>
</html>