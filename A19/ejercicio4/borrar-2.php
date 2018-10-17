<?php
session_start();

unset($_SESSION['nombre']);
unset($_SESSION['valor']);
header("Location: index.php");

?>
