<?php include 'connection.php'; 
session_start();               
?>
<!DOCTYPE html>
<html>

<head>
    <title>Listar e Eliminar Cursos</title>
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
        <table border="1px">
            <tr>
                <th>Nome do Curso</th>
                <th>Eliminar Curso</th>

            </tr>
            <?php 
            $result = mysqli_query($sqldb, "SELECT * FROM curso WHERE idAluno = '{$_SESSION['idAluno']}'");
            
            while($row = $result -> fetch_assoc()){
                
                print("<tr><td>".$row['nomeCurso']."</td><td><form style='background-color: initial;' action='eliminar_curso.php' method='POST'><input type='hidden' name='idCurso' value='".$row['idCurso']."'><button style='background-color: red; width: 80px; height: 30px; align: center; font-size: 13px;'>Eliminar</button></form></td></tr>");
                
                if(isset($_POST['idCurso'])){
                  $_SESSION['curso'] = $row['idCurso'];      
                  }
  
            }

            ?>
        </table>
    </div>
</body>

</html>
