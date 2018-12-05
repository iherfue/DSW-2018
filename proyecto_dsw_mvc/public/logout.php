<?php
session_start();
session_destroy();

header("Location: /proyecto_dsw_mvc/home");

?>