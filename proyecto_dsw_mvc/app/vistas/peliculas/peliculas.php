<?php require_once "../app/vistas/inc/header.php"; ?>

<h1><?php echo _('Vista de Peliculas')?></h1>
<a href="/proyecto_dsw_mvc/"><button class="btn btn-success"><?php echo _('volver')?></button></a><br><br>
<a href="/proyecto_dsw_mvc/peliculas/add"><button style="float:right;" type="button" class="btn btn-info"><?php echo _('Añadir')?></button></a>
<table id="myTable" class="table table-striped table-hover">
    <thead>
    <tr>
        <th><?php echo _('Título')?></th>
        <th><?php echo _('Año')?></th>
        <th><?php echo _('Género')?></th>
        <th><?php echo _('Consultar')?></th>
        <th><?php echo _('Editar')?></th>
        <th><?php echo _('Eliminar')?></th>
    </tr>
    </thead>
    <tbody>
        <?php foreach($datos["peliculas"] as $r): ?>
        <tr>
         <td><?php echo $r->titulo; ?></td>
            <td><?php echo $r->anio; ?></td>
            <td>
            <?php
            $genre = $r->genero;

            //echo $genre;
                 if(strstr($genre, 'Drama')){

                    echo '<span class="badge badge-info">Drama</span>';
                }
                if(strstr($genre, 'Action')){

                    echo '<span class="badge badge-danger">Acción</span>';
                }
                if(strstr($genre, 'Family')){

                    echo '<span class="badge badge-success">Familiar</span>';
                }
                if(strstr($genre, 'Adventure')){

                    echo '<span class="badge badge-warning">Aventura</span>';
                }
                if(strstr($genre, 'Thriller')){

                    echo '<span class="badge badge-dark">Thriller</span>';
                }
                if(strstr($genre, 'Animation')){

                    echo '<span class="badge badge-primary">Animación</span>';
                }
                if(strstr($genre, 'Sci-Fi')){

                    echo '<span class="badge badge-secondary">Sci-Fi</span>';
                }
                if(strstr($genre, 'Fantasy')){

                    echo '<span class="badge badge-light">Fantasía</span>';
                }

                if(strstr($genre, 'Documentary')){

                    echo '<span class="badge badge-light">Documental</span>';
                }

             ?>

            </td>
            <td><a href="/proyecto_dsw_mvc/peliculas/buscar/<?php echo $r->id_pelicula;?>"><?php echo _('Detalles')?></a></td>
            <td>
                <a href="/proyecto_dsw_mvc/peliculas/editar/<?php echo $r->id_pelicula;?>" class='btn btn-warning'><?php echo _('Editar')?></a></td>
            </td>
            <td>
                <a  href="/proyecto_dsw_mvc/peliculas/eliminar/<?php echo $r->id_pelicula;?>" class='btn btn-danger'><?php echo _('Eliminar')?></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
</div>
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

</html>
