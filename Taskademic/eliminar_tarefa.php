<?php include 'connection.php'; 
session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Eliminar Tarefas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos.css">

    <style>
        input#eliminar {

            border-radius: 5px;
            border: 1px solid #006600;
            background-color: #339900;
            color: #fff;
            font-size: 16px;
            text-decoration: none;
            padding: 7px;

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
        <form method="POST">
            <br>
            <h1>ELIMINAR TAREFA</h1>
            <h3>Selecione a tarefa que pertende eliminar</h3>
            <select required="" name="eliminarTarefa">
                    <option selected hidden>Escolha uma Tarefa</option>
                    <?php 
                        $result = mysqli_query($sqldb, "SELECT * FROM tarefa WHERE idAluno = '{$_SESSION['idAluno']}'");
                        
                        while($row = $result -> fetch_assoc()){
                            ?>
                    <option id="idt" value="<?php echo $row['idTarefa']; ?>"> 
                            
                          <?php 
                          
                          echo utf8_encode($row['nomeTarefa']);?>
                            
                    </option>

                        <?php  
                        
                        }
                                  
                        ?>   
                    
                    
                </select>
            <br>
            <input id="eliminar" type="submit" name="eliminar" value="Eliminar Tarefa" style="width: 250px;">
            <br><br>
        </form>
    </div>

    <?php
    
    if (isset($_POST['eliminar'])){                       
        
        $idt = $_POST['eliminarTarefa'];
        //echo ("DELETE FROM tarefa WHERE idTarefa = ".$idt);
         mysqli_query($sqldb, "DELETE FROM tarefa WHERE idTarefa = '".$idt."';");
         
         $message = "Tarefa Eliminada com Sucesso!";
         echo "<script type='text/javascript'>alert('$message');window.location.href='tarefas.php';</script>";
         //header("location: tarefas.php");
        }          
        
    ?>

</body>

</html>
