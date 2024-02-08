<?php
  $host = "localhost";
  $user = "root";
  $password = "";
  $db = "sistgestion";

  $conexion = new mysqli($host, $user, $password, $db);

  if ($conexion->connect_errno) {
     echo "Fallo la conexion con la base de datos" . $conexion->connect_error;
  }