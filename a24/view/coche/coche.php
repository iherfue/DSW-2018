<?php
if (!isset($_SESSION['name']) ) {
  die('
  <h1>Welcome to the automobiles Database</h1>
  <a href="login.php">Please login in</a>
');
}
 ?>
<h3>Hola <?php echo $_SESSION["name"];  ?></h3>
<h1 class="page-header">Tabla de Coches</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Coche&a=Crud">Nuevo coche</a>
</div>

<table class="table table-striped" border="1px">
    <thead>
        <tr>
            <th>id</th>
            <th>Marca</th>
            <th>Año</th>
            <th>KM</th>
            <th>Acción</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>

    <?php foreach($this->model->Listar() as $r): //$r->tal cual se llama en BD?>
        <tr>
            <td><?php echo $r->auto_id; ?></td>
            <td><?php echo $r->make; ?></td>
            <td><?php echo $r->year; ?></td>
            <td><?php echo $r->mileage; ?></td>

            <td>
                <a href="?c=Coche&a=Crud&id=<?php echo $r->auto_id; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Coche&a=Eliminar&id=<?php echo $r->auto_id; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<a href="logout.php">Cerrar sesión</a>
