<?php require_once "../app/vistas/inc/header.php"; ?>

<h1><?php echo _('Vista de los alquileres')?></h1>
<a href="/proyecto_dsw_mvc/"><button class="btn btn-success"><?php echo _('Volver')?></button></a><br/><br/>
<a href="/proyecto_dsw_mvc/alquileres/add"><button style="float:right;" type="button" class="btn btn-info"><?php echo _('Añadir')?></button></a>
<table id="myTable" class="table table-striped table-hover">
    <thead>
    <tr>
        <th><?php echo _('Nombre')?></th>
        <th><?php echo _('Apellidos')?></th>
        <th>DNI</th>
        <th><?php echo _('Título')?></th>
        <th><?php echo _('Eliminar')?></th>
    </tr>
    </thead>
    <tbody>
        <?php foreach($datos["alquiladas"] as $r): ?>
        <tr>
         <td><?php echo $r->nombre; ?></td>
            <td><?php echo $r->apellidos; ?></td>
            <td><?php echo $r->dni; ?></td>
            <td><?php echo $r->titulo; ?></td>

            <td>
                <a  href="/proyecto_dsw_mvc/alquileres/eliminar/<?php echo $r->id_socio;?>/<?php echo $r->id_pelicula;?>" class='btn btn-danger'><?php echo _('Eliminar')?></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>

    </body>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" language="javascript" src="../../proyecto_dsw_mvc/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">

$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
