<?php
session_start();
?>
<h1>Borrar datos (1)</h1>
  <form action="borrar-2.php" method="GET">
    <p>Marque los datos a borrar:</p>
    <table>
      <tbody>
          <?php
            foreach ($_SESSION as $i => $valor) {
                    echo "<tr>";
                    echo "<td>";
                    echo "<input type='checkbox' name='$i' value='$valor' </td>";
                    echo "<td>$i:$valor</td>";
                    echo "</tr>";
              }
          ?>
        </tr>
      </tbody>
    </table>
    <p>
      <input type="submit" value="Borrar" />
      <input type="reset" value="Desmarcar casillas" />
    </p>
  </form>
