<?php
session_start();
include 'connection.php';

$ida2 = $_SESSION['aluno'];

mysqli_query($sqldb, "DELETE FROM aluno WHERE idAluno = ".$ida2);
// Para limpar a associada tem de ser com um while e tem de ser pelo id da tarefa ou disciplina que se vai buscar pelo id da SESSION. Pelo menos penso eu.
//mysqli_query($sqldb, "DELETE FROM associada WHERE idAluno = '{$_SESSION['idAluno']}'");
mysqli_query($sqldb, "DELETE FROM disciplina WHERE idAluno = ".$ida2);
mysqli_query($sqldb, "DELETE FROM curso WHERE idAluno = ".$ida2);
mysqli_query($sqldb, "DELETE FROM tarefa WHERE idAluno = ".$ida2);

header("Location: listar_todos_utilizadores.php");
exit();
?>
