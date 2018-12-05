<?php require_once "../app/vistas/inc/header.php";?>
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<h4><?php echo _('Eliminar un alquiler')?></h4>
					<form method="POST">
						<input type="submit" class="btn btn-danger btn-sm" name="elimina" value="Eliminar">
						<input type="hidden" name="id_socio" value="">
					</form>
					<div class="alert alert-warning">
            <strong><?php echo _('Atención!')?></strong><?php echo _('Seguro que desea realizar esta operación')?>
          </div>
          <a href="/proyecto_dsw_mvc/alquileres"><button class="btn"><?php echo _('Volver')?></button></a>
			</div>
		</div>
	</div>
<?php require_once "../app/vistas/inc/footer.php";?>
