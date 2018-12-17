<?php session_start(); 
include 'connection.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Listar todas Tarefas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <style>
        table {
            color: white;
            border: 1px solid #94ca50;
            text-align: center;
            background-color: #666666;
        }

    </style>
</head>

<body background="img/task2.jpg">
    <header style="margin-top: 15px;">
        <img alt="logo" src="img/taskademic.png" style="width: 230px; height: 95px; ">
        <nav class="topnav">
            <a href="listar_todos_utilizadores.php">Utilizadores</a>
            <a class="active" href="listar_todas_tarefas.php">Tarefas</a>
            <div style="display: inline; float: right;">
                <a href="home.php"><img src="img/logout.png" alt="logOut" style="width: 20px; display: inline; margin-top: 0px; vertical-align: top;">&nbsp;&nbsp;&nbsp;Logout</a>
            </div>
            <a style="float: right;" href="#">
                <img src='img/admin.png' alt="admin" style="width: 22px; display: inline; margin-top: 0px; vertical-align: top;">&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['nomeAdmin'];?>
            </a>
        </nav>
    </header><br>

    <div align="center" style="margin-top: 5%">
        <table border="1px">
            <tr>
                <th>ID Tarefa</th>
                <th>ID Aluno</th>
                <th>Nome Aluno</th>
                <th>Nome Tarefa</th>
                <th>Tipo Tarefa</th>
                <th>Tipo Avaliação</th>
                <th>Tipo Época</th>
                <th>Nome da Disciplina</th>
                <th>Data Início</th>
                <th>Data Fim</th>
                <th>Progresso</th>
                <th>Descrição</th>
            </tr>
            <?php 
        $result = mysqli_query($sqldb, "SELECT aluno.nomeAluno, tipo_tarefa.tipoTarefa, tarefa.nomeTarefa, tipo_epoca.tipoEpoca, tipo_avaliacao.tipoAvaliacao, disciplina.nomeDisciplina, tarefa.dataInicio, tarefa.dataFim, tarefa.progresso, tarefa.descricao, tarefa.idAluno, tarefa.idTarefa FROM tarefa JOIN aluno ON tarefa.idAluno = aluno.idAluno"
                    . "                     JOIN tipo_tarefa ON tarefa.idTipoTarefa = tipo_tarefa.idTipoTarefa"
                    . "                     LEFT JOIN tipo_epoca ON tarefa.idTipoEpoca = tipo_epoca.idTipoEpoca"
                    . "                     LEFT JOIN tipo_avaliacao ON tarefa.idTipoAvaliacao = tipo_avaliacao.idTipoAvaliacao"
                    . "                     LEFT JOIN associada ON tarefa.idTarefa = associada.idTarefa"
                    . "                     LEFT JOIN disciplina ON associada.idDisciplina = disciplina.idDisciplina"
                    . "                     ");
         
        
         while($row = $result -> fetch_assoc()){
                echo utf8_encode("<tr><td>".$row['idTarefa']."</td><td>".$row['idAluno']."</td><td>".$row['nomeAluno']."</td><td>".$row['nomeTarefa']."</td><td>".$row['tipoTarefa']."</td><td>".$row['tipoAvaliacao']."</td><td>".$row['tipoEpoca']."</td><td>".$row['nomeDisciplina']."</td><td>".$row['dataInicio']."</td><td>".$row['dataFim']."</td><td>".$row['progresso']."%</td><td>".$row['descricao']."</td></tr>");
            } 
        
        
        
        ?>
        </table>
    </div>
</body>

</html>
