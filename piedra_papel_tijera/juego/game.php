<?php //COMPROBACIONES
error_reporting(0);

function check($juega_maquina,$juega_persona){
    
    $empate = "Habéis empatado";
    $gana_maquina = " La máquina te ha ganado :D";
    $gana_persona = " Jugador gana!!";
    
  //  echo $juega_maquina;
    //echo $juega_persona;
    
    if($juega_maquina == $juega_persona){
        
        return $empate;
        
    }else if(($juega_maquina == 'Tijera') && ($juega_persona == 'Papel')){
        
        return $gana_maquina;
       
    }else if(($juega_maquina == 'Piedra') && ($juega_persona == 'Papel')){
        
        return $gana_persona;
        
    }else if(($juega_maquina == 'Papel') && ($juega_persona == 'Tijera')){
        
        return $gana_persona;
        
    }else if(($juega_maquina == 'Papel') && ($juega_persona == 'Piedra')){
        
        return $gana_maquina;
        
    }else if(($juega_maquina == 'Tijera') && ($juega_persona == 'Piedra')){
        
        return $gana_persona;
        
    }else if(($juega_maquina == 'Piedra') && ($juega_persona == 'Tijera')){
    
    return $gana_maquina;
    
    }

    
    
}


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Iván Piedra Papel Tijera</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<style type="text/css">
*{
    font-family: 'Open Sans', sans-serif;
}
</style>
</head>
<body>

<?php 


if(empty($_REQUEST)){
    
    echo "Falta el nombre del parámetro";
    die();
    
}else {
    
    echo "<h1>Piedra Papel o Tijera</h1>";
    echo 'Bienvenido: ' . $_GET['name'] . "<br>";
    echo "<form action='' method='POST'> ";
    echo "<select name='tirada'>
            <option value='0'>Piedra</option>
            <option value='1'>Papel</option>
            <option value='2'>Tijera</option>
          </select>";
    
   echo "<input type='submit' name='juega' value='Jugar'>";
   echo "<input type='submit' value='Logout'  name='desconectar'>";
   
   echo "</form>";
   
  
}

if(isset($_POST["desconectar"])){
    
    header("location: index.php");
}

$juega_persona = $_POST["tirada"]; //trabajamos con la variable de la persona (valor que selecciona)


if(isset($_POST["juega"])){
    
    //Juega la persona
    
    if($_POST["tirada"] == 0){
        
        $juega_persona = "Piedra";
    }else if($_POST["tirada"] == 1){
        
        $juega_persona = "Papel";
    }else if($_POST["tirada"] == 2){
        
        $juega_persona = "Tijera";
    }
    
    //echo $juega_persona = "Has jugado " . $_POST["tirada"] . "<br>";
    //$juega_persona = $juega_persona;
    
    //ORDENADOR JUEGA
    
    $maquina = array("Piedra","Papel" ,"Tijera");
    
   /* $maquina = array();
    $maquina ["0"] = "Piedra";
    $maquina ["1"] = "Papel";
    $maquina ["2"] = "Tijera";*/
    
    print_r($maquina);
    
    shuffle($maquina); //HACEMOS UN ALEATORIO DEL ARRAY
    
    echo "<br> <h3>Array Aleatorio</h3>";
    
    print_r($maquina);
    
    $juega_maquina = $maquina[1];  //ACCEDO SIEMPRE A LA POSICIÓN 1 DEL ARRAY SEGÚN EL VALOR QUE TOQUE(ALEATORIAMENTE)
    
    for($c=0;$c<3;$c++) {
        
        for($h=0;$h<3;$h++) {
            
            $r = check($maquina[$h], $maquina[$c]); //pasamos a la funcion cada iteraccion
            
            print "<pre style='background-color: #F5F5F5'> La persona saca = $maquina[$c] La máquina saco = $maquina[$h] Resultado = $r\n </pre>";
            
        }
        
    }
    
}

?>
<h3>Partida</h3>
<pre style="background-color: #F5F5F5";>
<p> <b>El Jugador saco: <?php echo $juega_persona?></b><br>
 <b>La máquina saco: <?php echo $juega_maquina?> </b><br>
 Resultado = <?php echo check($juega_maquina,$juega_persona)?>
 <p>
 </pre>
</body>
</html>