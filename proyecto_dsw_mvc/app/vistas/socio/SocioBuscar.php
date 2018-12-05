<?php require_once "../app/vistas/inc/header.php";

?>
<!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#datos"><?php echo _('Datos')?></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#pelis"><?php echo _('Peliculas Alquiladas')?></a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane container active" id="datos">
    <table class="table table-striped">
        <thead>
            <th>Id</th>
            <th><?php echo _('Nombre')?></th>
            <th><?php echo _('Apellidos')?></th>
            <th><?php echo _('Dirección')?></th>
            <th><?php echo _('Teléfono')?></th>
            <th>DNI</th>
        </thead>
        <tr>
      <?php foreach($datos as $r){
            echo "<td>" . $r ."</td>";
        }?>
        </tr>
    </table>
    <a href="/proyecto_dsw_mvc/socios"><button class="btn btn-success"><?php echo _('Volver')?></button></a>
  </div>

  <div class="tab-pane container fade" id="pelis"><br>

    <?php

        foreach ($data as $r) {

          echo '<button type="button" class="btn btn-primary">
            Total de peliculas Alquiladas <span class="badge badge-light">'.$r .'</span>
          </button><br/><br/>';
      }
      //var_dump($pelis);
      ?>

      <?php

        foreach ($pelis as $p) {
        $a = $p["imagen"];

        if(!strstr($a, 'http')) {

          if(strstr($a, 'N/A')) {
          echo 'Imagen no disponible';
        }else{

          echo '<img src="/proyecto_dsw_mvc/img/'.$p["imagen"] . '"width="200">';
        }
      }

        if(strstr($a, 'http')) {
          echo '<img src="'.$p["imagen"] . '"width="200">';
        }


        }
    ?>

  </div>
  <div class="tab-pane container fade" id="menu2">...</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>
