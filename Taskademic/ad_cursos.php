<?php session_start(); 
include 'connection.php'; 
?>
<!DOCTYPE html>
<html>

<head>
    <title>Adicionar Curso/os</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>

<body background="img/task2.jpg">
    <header style="margin-top: 15px;">
        <img alt="logo" src="img/taskademic.png" style="width: 230px; height: 95px; ">
        <nav class="topnav">
            <a href="tarefas.php">Tarefas</a>
            <a class="active" href="cursos.php">Cursos</a>
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
        <form action="ad_cursos.php" method="POST">
            <br>
            <h1>ADICIONAR CURSO/S</h1>
            <input required="" type="text" placeholder="Nome do Curso" name="curso"><br>
            <input type="submit" value="Adicionar">
        </form>
    </div>

    <?php 
        if (isset($_POST['curso'])){
             
            mysqli_query($sqldb, "INSERT INTO curso(nomeCurso, idAluno) VALUES('{$_POST['curso']}','{$_SESSION['idAluno']}')");
                
            $message = "Curso adicionado com Sucesso!";
                echo "<script type='text/javascript'>alert('$message');</script>";  
            }
           
        
        ?>


</body>

</html>
