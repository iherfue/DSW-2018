<?php

foreach($this->model->Mostrar() as $r): ?>
        <tr>
            <td><?php echo $r->make; ?></td>
            
            <td>
                <a href="?c=Alumno&a=Crud&id=<?php echo $r->id; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Alumno&a=Eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
