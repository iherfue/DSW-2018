<?php require_once "../app/vistas/inc/header.php";?>
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<h4><?php echo _('Eliminar Pelicula')?></h4>
					<form method="POST">
						<input type="submit" class="btn btn-danger btn-sm" name="elimina" value="Eliminar">
					</form>
					<div class="alert alert-warning">
                        <strong><?php echo _('Atención!')?></strong><?php echo _('Seguro que desea realizar esta operacion')?>
                    </div>
                    <a href="/proyecto_dsw_mvc/peliculas"><button class="btn"><?php echo _('volver')?></button></a>
			</div>
		</div>
	</div>
<?php require_once "../app/vistas/inc/footer.php";?>
