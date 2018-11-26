<?php
require_once "../app/vistas/inc/header.php";

 ?>

 <table class="table table-striped">
 	<thead>
 		<th>Id</th>
 		<th>Nombre</th>
 		<th>Email</th>
 		<th>Telefono</th>
 		<th>Accion</th>
 	</thead>
 	<?php foreach($datos['usuarios'] as $usuarios) :?>
 	<tbody>
 		<tr>
 			<td><?php echo $usuarios->id_usuario;?></td>
 			<td><?php echo $usuarios->nombre;?></td>
 			<td><?php echo $usuarios->email;?></td>
 			<td><?php echo $usuarios->tlf;?></td>
 			<td><a href="<?php echo RUTA_URL;?>/paginas/editar/<?php echo $usuarios->id_usuario; ?>">Editar</a></td>
 			<td><a href="<?php echo RUTA_URL;?>/paginas/eliminar/<?php echo $usuarios->id_usuario; ?>">Eliminar</a></td>
 			<td><a href="<?php echo RUTA_URL;?>/paginas/datos/<?php echo $usuarios->id_usuario; ?>">PDF</a></td>
 			<td><a href="<?php echo RUTA_URL;?>/paginas/correo/">Enviar Correo</a></td>
 		</tr>
 	<?php endforeach;?>
 	</tbody>
 </table>
<?php require_once "../app/vistas/inc/footer.php";?>