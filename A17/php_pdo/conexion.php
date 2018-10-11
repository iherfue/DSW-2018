<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=clientes','ivan', 'majada');
//errores
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
