<?php
session_start();
?>
<h1>Borrar datos (1)</h1>
  <form action="borrar-2.php" method="GET">
    <p>Marque los datos a borrar:</p>
    <table>
      <tbody>
        <tr>
          <td><input type="checkbox" name="<?php echo $_SESSION['nombre']?>" value="<?php echo $_SESSION['valor']?>" /></td>
          <td><?php echo $_SESSION['nombre'] . ':' . $_SESSION['valor'] ?></td>
        </tr>
      </tbody>
    </table>
    <p>
      <input type="submit" value="Borrar" />
      <input type="reset" value="Desmarcar casillas" />
    </p>
  </form>
