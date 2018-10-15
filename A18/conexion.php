<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=misc','root', '78597168G');
//errores
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
