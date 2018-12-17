<?php session_start(); 
include 'connection.php'; 
?>
<!DOCTYPE html>
<html>

<head>
    <title>Adicionar Disciplina/as</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>

<body background="img/task2.jpg">
    <header style="margin-top: 15px;">
        <img alt="logo" src="img/taskademic.png" style="width: 230px; height: 95px; ">
        <nav class="topnav">
            <a href="tarefas.php">Tarefas</a>
            <a href="cursos.php">Cursos</a>
            <a class="active" href="disciplinas.php">Disciplinas</a>
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
            <h1>ADICIONAR DISCIPLINA/S</h1>
            <input required="" type="text" placeholder="Nome da disciplina" name="disciplina"><br>
            <input required="" type="number" min="0" step="1" placeholder="Ano" name="ano"><br>
            <input required="" type="number" min="1" max="2" placeholder="Semestre" name="semestre"><br>
            <input type="email" placeholder="Email do professor" name="emailProf"><br>

            <select name="curso" required="">
                    
                    <option selected hidden>Insira o curso</option>
                        <?php 
                        $result = mysqli_query($sqldb, "SELECT * FROM curso WHERE idAluno = '{$_SESSION['idAluno']}'");
                        
                        while($row = $result -> fetch_assoc()){
                            ?>
                               <option value="<?php echo $row['idCurso']; ?>"> 
                            
                          <?php print_r($row['nomeCurso']);?>
         
                               </option>
                              <?php                        
                        }
                                  
                                ?>   
                </select><br>
            <input type="submit" value="Adicionar">
        </form>
    </div>

    <?php
        if (isset($_POST['disciplina'], $_POST['ano'], $_POST['semestre'])){    
            
            mysqli_query($sqldb, "INSERT INTO disciplina(nomeDisciplina, ano, semestre, emailProf, idCurso, idAluno) VALUES('{$_POST['disciplina']}','{$_POST['ano']}','{$_POST['semestre']}','{$_POST['emailProf']}','{$_POST['curso']}','{$_SESSION['idAluno']}')");
            $message = "Disciplina adicionado com Sucesso!";
                echo "<script type='text/javascript'>alert('$message');</script>";
                
            $result = mysqli_query($sqldb, "SELECT * FROM curso WHERE idAluno = '{$_SESSION['idAluno']}'");
                        
            while($row = $result -> fetch_assoc()){
    
                if($row['idCurso'] == '') { 
                        $message = "Não tem nenhum Curso selecionado ou criado, pertende criar um novo Curso?";           
                        echo "<script type='text/javascript'>var r = confirm('$message'); "
                                . "if (r==true){"
                                . "window.location.href='ad_cursos.php';}</script>"; 
                }
                   
            }
            
    
        }
    
        ?>



</body>

</html>
