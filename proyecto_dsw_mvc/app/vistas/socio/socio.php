<?php require_once "../app/vistas/inc/header.php";   ?>

<div class="container box">
<h1><?php echo _('Vista de socio')?></h1>
<a href="/proyecto_dsw_mvc/"><button class="btn btn-success"><?php echo _('Volver')?></button></a><br><br>
<a href="/proyecto_dsw_mvc/socios/add"><button style="float:right;" type="button" class="btn btn-info"><?php echo _('Añadir')?></button></a>
<table id="myTable" class="table table-striped table-hover">
    <thead>
    <tr>
        <th><?php echo _('Nombre')?></th>
        <th><?php echo _('Apellido')?></th>
        <th>DNI</th>
        <th><?php echo _('Consultar')?></th>
        <th><?php echo _('Editar')?></th>
        <th><?php echo _('Eliminar')?></th>
    </tr>
    </thead>
    <tbody>
        <?php foreach($datos["socios"] as $r): ?>
        <tr>
         <td><?php echo $r->nombre; ?></td>
            <td><?php echo $r->apellidos; ?></td>
            <td><?php echo $r->dni; ?></td>
            <td><a href="/proyecto_dsw_mvc/socios/buscar/<?php echo $r->id_socio;?>"><?php echo _('Detalles')?></a></td>
            <td>
                <a href="/proyecto_dsw_mvc/socios/editar/<?php echo $r->id_socio;?>" class='btn btn-warning'><?php echo _('Editar')?></a></td>
            </td>
            <td>
                <a  href="/proyecto_dsw_mvc/socios/eliminar/<?php echo $r->id_socio;?>" class='btn btn-danger'><?php echo _('Eliminar')?></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
<?php require_once "../app/vistas/inc/footer.php";   ?>
