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
<?php foreach($this->modelos->Mostrar() as $r): //$r->tal cual se llama en BD?>
        <tr>
            <td><?php echo $r->id_plato; ?></td>
            <td><?php echo $r->nombre; ?></td>
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
