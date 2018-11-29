<?php
require_once "../app/vistas/inc/header.php";

// Este código ha de ir antes que cualquier llamada a gettext()

// Definimos el idioma del usuario
/**$user_locale = 'en_US.utf8';

// Establece variables de entorno en el idioma del usuario
putenv("LANGUAGE=$user_locale");
putenv("LANG=$user_locale");  // Por si LANGUAGE falla

if (!defined('LC_MESSAGES')) define('LC_MESSAGES', 5);
// Establece la información de la configuración regional
setlocale(LC_MESSAGES, $user_locale);
// al que pertenecen: el nombre de nuestros archivos MO
//bindtextdomain("en_US", "/var/www/html/a32/app/locale");
textdomain("en_US");*/


 ?>

 <table class="table table-striped">
 	<thead>
 		<th>Id</th>
 		<th><?php echo _('Nombre');?></th>
 		<th><?php echo _('Correo');?></th>
 		<th><?php echo _('Telefono');?></th>
 		<th><?php echo _('Accion');?></th>
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
