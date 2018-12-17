<?php include 'connection.php'; 
session_start();               
?>
<!DOCTYPE html>
<html>

<head>
    <title>Listar Tarefas</title>
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
            <a class="active" href="tarefas.php">Tarefas</a>
            <a href="cursos.php">Cursos</a>
            <a href="disciplinas.php">Disciplinas</a>
            <div style="display: inline; float: right;">

                <a href="home.php"><img src="img/logout.png" alt="logOut" style="width: 20px; display: inline; margin-top: 0px; vertical-align: top;">&nbsp;&nbsp;&nbsp;Logout</a>
            </div>
            <a style="float: right;" href="perfil.php">
                <img src='img/user.png' alt="user" style="width: 22px; display: inline; margin-top: 0px; vertical-align: top;">&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['nome'];?>
            </a>
        </nav>
    </header>
    <div align="center" style="margin-top: 5%">
        <table border="1px">
            <tr>
                <th>Nome da Tarefa</th>
                <th>Tipo</th>
                <th>Época</th>
                <th>Tipo de Avaliação</th>
                <th>Disciplina</th>
                <th>Data de Início</th>
                <th>Data de Fim</th>
                <th>Progresso</th>
                <th>Descrição</th>
                <th>Editar Tarefa</th>
            </tr>
            <?php 
            $result = mysqli_query($sqldb, "SELECT tarefa.idTarefa, tipo_tarefa.tipoTarefa, tarefa.nomeTarefa, tipo_epoca.tipoEpoca, tipo_avaliacao.tipoAvaliacao, disciplina.nomeDisciplina, tarefa.dataInicio, tarefa.dataFim, tarefa.progresso, tarefa.descricao FROM tarefa"
                    . "                     JOIN tipo_tarefa ON tarefa.idTipoTarefa = tipo_tarefa.idTipoTarefa"
                    . "                     LEFT JOIN tipo_epoca ON tarefa.idTipoEpoca = tipo_epoca.idTipoEpoca"
                    . "                     LEFT JOIN tipo_avaliacao ON tarefa.idTipoAvaliacao = tipo_avaliacao.idTipoAvaliacao"
                    . "                     LEFT JOIN associada ON tarefa.idTarefa = associada.idTarefa"
                    . "                     LEFT JOIN disciplina ON associada.idDisciplina = disciplina.idDisciplina"
                    . "                     WHERE tarefa.idAluno = '$_SESSION[idAluno]'");
            
            while($row = $result -> fetch_assoc()){
                echo utf8_encode("<form style='background-color: initial;' action='editar_tarefa.php' method='POST'><tr><td><input type='hidden' name='nomeTarefa' value='".$row['nomeTarefa']."'>".$row['nomeTarefa']."</td><td>".$row['tipoTarefa']."</td><td>".$row['tipoEpoca']."</td><td>".$row['tipoAvaliacao']."</td><td>".$row['nomeDisciplina']."</td><td><input type='hidden' name='dataInicio' value='".$row['dataInicio']."'>".$row['dataInicio']."</td><td><input type='hidden' name='dataFim' value='".$row['dataFim']."'>".$row['dataFim']."</td><td><input type='hidden' name='progresso' value='".$row['progresso']."'>".$row['progresso']."%</td><td><input type='hidden' name='descricao' value='".$row['descricao']."'>".$row['descricao']."</td><td><input type='hidden' name='idTarefa' value='".$row['idTarefa']."'><button style='width: 80px; height: 30px; align: center; font-size: 13px; type='submit'>Editar</button></td></tr></form>");
            }    
            ?>
        </table>
    </div>
</body>

</html>
