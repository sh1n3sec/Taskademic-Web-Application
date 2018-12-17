<?php
session_start();
include 'connection.php';

mysqli_query($sqldb, "DELETE FROM aluno WHERE idAluno = '{$_SESSION['idAluno']}'");
// Para limpar a associada tem de ser com um while e tem de ser pelo id da tarefa ou disciplina que se vai buscar pelo id da SESSION. Pelo menos penso eu.
//mysqli_query($sqldb, "DELETE FROM associada WHERE idAluno = '{$_SESSION['idAluno']}'");
mysqli_query($sqldb, "DELETE FROM disciplina WHERE idAluno = '{$_SESSION['idAluno']}'");
mysqli_query($sqldb, "DELETE FROM curso WHERE idAluno = '{$_SESSION['idAluno']}'");
mysqli_query($sqldb, "DELETE FROM tarefa WHERE idAluno = '{$_SESSION['idAluno']}'");

header("Location: home.php");
exit();
?>
