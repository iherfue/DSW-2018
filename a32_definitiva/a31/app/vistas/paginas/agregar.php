<?php
require_once "../app/vistas/inc/header.php";

 ?>
<a href="<?php echo RUTA_URL; ?>/paginas" class="btn btn-light"><i class="fa fa-backward"> Volver</i></a>
<div class="card card-body bg-light mt-5">
    <h2>Agregar usuarios</h2>
    <form action="<?php echo RUTA_URL; ?>/paginas/agregar" method="POST">
        <div class="form-group">
            <label for="nombre">Nombre: <sup>*</sup></label>
            <input type="text" name="nombre" class="form-control form-control-lg">
        </div>
        <div class="form-group">
            <label for="email">Email: <sup>*</sup></label>
            <input type="email" name="email" class="form-control form-control-lg">
        </div>
        <div class="form-group">
            <label for="tlf">Teléfono: <sup>*</sup></label>
            <input type="text" name="tlf" class="form-control form-control-lg">
        </div>
        <input type="submit" class="btn btn-success" value="Agregar usuario">
    </form>
</div>    

<?php require_once "../app/vistas/inc/footer.php";?>