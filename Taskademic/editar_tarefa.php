<?php include 'connection.php'; 
session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <title>Criar Tarefa</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos.css">
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

        <form method="POST">
            <br>
            <h1>EDITAR TAREFA</h1>
            <?php

                $idTarefa = filter_input(INPUT_POST, 'idTarefa');
                $nt1 = filter_input(INPUT_POST, 'nomeTarefa');
                $di = filter_input(INPUT_POST, 'dataInicio');
                $df = filter_input(INPUT_POST, 'dataFim');
                $pg = filter_input(INPUT_POST, 'progresso');
                $des1 = filter_input(INPUT_POST, 'descricao');
                //echo ($idTarefa);
    
                //$result = mysqli_query($sqldb, "SELECT * FROM tarefa WHERE idTarefa = ".$idTarefa);          
                            
                $nt = utf8_decode($nt1);            
                $des = utf8_decode($des1);
                $di2 = new DateTime($di);
                $df2 = new DateTime($df);  
                
                ?>

                <input name="idTarefa" type="hidden" value="<?php echo $idTarefa; ?>">
                <input required="" type="text" placeholder="Nome da tarefa" name="nomeTarefa" value="<?php echo utf8_encode($nt); ?>"><br>
                <p style="display:inline; color:white;"><b>Data Inicio</b></p>
                <input style="width:415px;" type="datetime-local" name="dataInicio" value="<?php echo $di2->format('Y-m-d\TH:i'); ?>"><br>
                <p style="display:inline; color:white; padding-right:13px;"><b>Data Fim</b></p>
                <input style="width:415px;" type="datetime-local" name="dataFim" value="<?php echo $df2->format('Y-m-d\TH:i'); ?>"><br>
                <input required="" placeholder="Progresso da Tarefa (%)" type="number" min="0" max="100" step="1" name="progresso" value="<?php echo $pg; ?>"><br>
                <textarea placeholder="Descrição da tarefa" name="descricao" rows="5" cols="70"><?php echo utf8_encode($des); ?></textarea><br>
                <input type="submit" name="editar" value="Editar Tarefa">
                <br>
        </form>
    </div>
    <?php  
    
    if(isset($_POST['editar'])){
       
       $idTarefa = $_POST['idTarefa'];
       $nt = utf8_decode($_POST['nomeTarefa']);
       $di = $_POST['dataInicio'];
       $df = $_POST['dataFim'];
       $pg = $_POST['progresso'];
       $des = utf8_decode($_POST['descricao']);           

       $var1 = mysqli_query($sqldb, "UPDATE tarefa SET nomeTarefa ='$nt', dataInicio ='$di', dataFim ='$df', progresso ='$pg', descricao ='$des' WHERE idTarefa ='$idTarefa'");  
        
       //echo ("UPDATE tarefa SET nomeTarefa ='$nt', dataInicio ='$di', dataFim ='$df', progresso ='$pg', descricao ='$des' WHERE idTarefa =".$_POST['idTarefa'].";");
       //header("location: listar_tarefa.php");
       //exit();
    }

    
    
   ?>
</body>

</html>
