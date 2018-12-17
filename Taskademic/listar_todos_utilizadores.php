<?php session_start(); 
include 'connection.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Lista Utilizadores</title>
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
            <a class="active" href="listar_todos_utilizadores.php">Utilizadores</a>
            <a href="listar_todas_tarefas.php">Tarefas</a>
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
                <th>ID_utilizador</th>
                <th>Nome Utilizador</th>
                <th>Email Utilizador</th>
                <th style="align-content: center">Eliminar Conta</th>
            </tr>

            <?php 
        
         $result = mysqli_query($sqldb, "SELECT * FROM aluno");
         
          while($row = $result -> fetch_assoc()){
              if($row['emailAluno'] == 'admin@admin.pt'){
                
              }
                                
              else{         
                    
                      print("<tr><td>".$row['idAluno']."</td><td>".$row['nomeAluno']."</td><td>".$row['emailAluno']."</td><td><form style='background-color: initial;' action='eliminar_utilizador.php' method='POST'><input type='hidden' name='idAluno' value='".$row['idAluno']."'><button style='background-color: red; width: 80px; height: 30px; align: center; font-size: 13px;'>Eliminar</button></form></td></tr>");

                      if(isset($_POST['idAluno'])){
                      $_SESSION['aluno'] = $row['idAluno'];      
                    }
                  
                }    
            }
                 
        ?>
        </table>
    </div>
</body>

</html>
