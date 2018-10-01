<?php
$numero_introducido = isset($_POST["guess"]) ? $_POST["guess"] : ''; 
$numero = 10;
/*$guess = $_GET; */
        if (isset($_POST["envia"])) {
            
            if ($_POST["guess"] != null) {

                if (is_numeric($_POST["guess"])) {

                    if ($_POST["guess"] == $numero) {

                        echo '<h2>Enhorabuena. Has acertado</h2>';
                    } else if ($_POST["guess"] > $numero) {

                        echo '<h2>el numero es menor</h2>';
                    } else if ($_POST["guess"] < $numero) {

                        echo '<h2>el numero es mayor</h2>';
                    }
                } else { /* ELSE DEL IS NUMERIC */

                    echo '<h2>No has puesto un número</h2>';
                }
            } else {

                echo '<h2>no has introducido número</h2>';
            }
            /* ELSE SI ESTA OPERATIVA GET */
        } else { 

            echo '<h2>No has especificado ningún parámetro</h2>';
        }

?>

<html>
<head>
<title>Iván Hernández Fuentes</title>
<meta charset="utf-8">
</head>

<body>
	<form action="ejemplo.php" method="POST">
	<label for="number">Introduzca un número</label>
		<input type="text" name="guess" id="number" value=<?php echo htmlentities($numero_introducido)?>>
		<input type="submit" name="envia" value="enviar">
	</form>
</body>

</html>
