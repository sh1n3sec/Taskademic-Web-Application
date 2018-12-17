<?php session_start(); 
include 'connection.php'; 
?>
<!DOCTYPE html>
<html>

<head>
    <title>Ver Perfil</title>
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
            <a href="tarefas.php">Tarefas</a>
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
                <th>Nome</th>
                <th>Email</th>
            </tr>
            <tr>
                <?php 
            $result = mysqli_query($sqldb, "SELECT * FROM aluno WHERE idAluno = '{$_SESSION['idAluno']}'");
            while($row = $result -> fetch_assoc()){
                
                print("<tr><td>".$row['nomeAluno']."</td><td>".$row['emailAluno']."</td></tr>");
              }
            ?>
            </tr>



        </table>


    </div>




</body>

</html>
