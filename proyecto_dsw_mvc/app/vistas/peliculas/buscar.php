<?php require_once "../app/vistas/inc/header.php";?>
  <table class="table table-striped">
    <thead>
      <th>ID</th>
      <th><?php echo _('Titulo')?></th>
      <th><?php echo _('Año')?></th>
      <th><?php echo _('Genero')?></th>
      <th><?php echo _('Calificación')?></th>
      <th><?php echo _('Imagen')?></th>
    </thead>
    <?php //var_dump($datos);?>
      <tr>
        <td><?php echo $datos["id_pelicula"]?></td>
        <td><?php echo $datos["titulo"]?></td>
        <td><?php echo $datos["anio"]?></td>
        <td><?php echo $datos["genero"]?></td>
        <td><?php echo $datos["calificacion"]?></td>
        <?php
        $d = $datos["imagen"];

        if(strstr($d, 'http')){?>
          <td><?php echo '<img src=' . $datos["imagen"] .' width="100">'?></td>

        <?php }

        if(!strstr($d, 'http')){

          if(strstr($d, 'N/A')){

            echo '<td>Imagen no disponible</td>';
          }else{

          echo '<td><img src=/proyecto_dsw_mvc/img/' . $datos["imagen"] .' width="100"></td>';
         }

       }
        ?>
      </tr>
  </table>
    <a href="/proyecto_dsw_mvc/peliculas"><button class="btn btn-success"><?php echo _('Volver')?></button></a>
  </div>
<?php require_once "../app/vistas/inc/footer.php"; ?>
