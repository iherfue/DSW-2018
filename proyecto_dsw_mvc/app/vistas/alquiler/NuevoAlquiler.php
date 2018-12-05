<?php require_once "../app/vistas/inc/header.php"; ?>

<h1><?php echo _('Realizar un alquiler')?></h1>
<a href="/proyecto_dsw_mvc/alquileres"><button class="btn btn-success"><?php echo _('Volver')?></button></a><br/><br/>
	<form method="POST">
		<?php echo _('Socio')?>
		<input list="socios" name="socios">
			<datalist id="socios">
			<?php foreach ($datos["socios"] as $r):?>

				<option value="<?php echo $r->id_socio?>"><?php echo $r->nombre?> <?php echo $r->apellidos?></option>

			<?php endforeach;?>

		</datalist>
		<?php echo _('Pelicula')?>
		<input list="peliculas" name="peliculas">
			<datalist id="peliculas">
				<?php foreach ($datos["peliculas"] as $r):?>

				<option value="<?php echo $r->id_pelicula?>"><?php echo $r->titulo?> (<?php echo $r->anio?>)</option>

				<?php endforeach;?>

			</datalist><br><br>
			<b><?php echo _('Enviar por correo')?></b> <input type="checkbox" value="Si" name="enviar_correo">
			<input type="email" name="email" placeholder="example@example.com"><br/><br/>
			<input type="submit" class="btn btn-primary" name="envia" value="Enviar">
	</form>
<?php require_once "../app/vistas/inc/footer.php"; ?>
