<?php

if(isset($_SESSION["error"])){
  echo "<div class='alert alert-danger' role='alert'>" .htmlentities($_SESSION['error'])."</div>";
  unset($_SESSION["error"]);

}?>

<h1 class="page-header">
    <?php echo $coch->auto_id != null ? $coch->make : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Coche">Coches</a></li>
  <li class="active">
    <?php echo $coch->auto_id != null ?  $coch->make : 'Nuevo Registro'; ?>
  </li>
</ol>

<form id="frm-alumno" action="?c=Coche&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $coch->auto_id; ?>" />

    <div class="form-group">
        <label>Marca</label>
        <input type="text" name="make" value="<?php echo $coch->make; ?>" class="form-control" placeholder="Ingrese la marca" />
    </div>

    <div class="form-group">
        <label>Año</label>
        <input type="text" name="year" value="<?php echo $coch->year; ?>" class="form-control" placeholder="ingrese el año"/>
    </div>

    <div class="form-group">
        <label>KM</label>
        <input type="text" name="mileage" value="<?php echo $coch->mileage; ?>" class="form-control" placeholder="Ingrese los kM" data-validacion-tipo="requerido|email" />
    </div>

    <hr />

    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
        <a href="index.php?c=Coche" class="btn btn-primary">Cancelar</a>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>
