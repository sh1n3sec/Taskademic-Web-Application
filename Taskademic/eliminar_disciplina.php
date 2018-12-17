<?php
session_start(); 
include 'connection.php'; 

$idd = filter_input(INPUT_POST, "idDisciplina");

mysqli_query($sqldb, "DELETE FROM disciplina WHERE idDisciplina = ".$idd);
      header("Location: listar_disciplinas.php");
      exit();
?>
