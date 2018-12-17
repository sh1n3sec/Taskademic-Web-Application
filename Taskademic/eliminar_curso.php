<?php
session_start(); 
include 'connection.php';

$idc = filter_input(INPUT_POST, "idCurso");

mysqli_query($sqldb, "DELETE FROM curso WHERE idCurso = ".$idc);
      header("Location: listar_cursos.php");
      exit();
?>
