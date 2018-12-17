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
        <form action="criar_tarefa.php" method="POST">
            <br>
            <h1>CRIAR TAREFA</h1>
            <input required="" type="text" placeholder="Nome da tarefa" name="nomeTarefa"><br>
            <select required="" name="tipoTarefa" onchange="java_script_:show(this.options[this.selectedIndex].value)">
                    <option selected hidden>Tipo de Tarefa</option>
                    <?php 
                        $result = mysqli_query($sqldb, "SELECT * FROM tipo_tarefa");
                        
                        while($row = $result -> fetch_assoc()){
                            ?>
                    <option value="<?php echo $row['idTipoTarefa']; ?>"> 
                            
                          <?php 
                          echo utf8_encode($row['tipoTarefa']);?>
                            
                    </option>

                        <?php  
                        
                        }
                                  
                                ?>   
                    
                    
                </select>
            <br>

            <div id="seForEscolar" style="display:none;">

                <select required="" name="tipoEpoca">
                    
                    <option selected hidden>Tipo de Época</option>
                    
                    <?php 
                        $result = mysqli_query($sqldb, "SELECT * FROM tipo_epoca");
                        
                        while($row = $result -> fetch_assoc()){
                            ?>
                    <option value="<?php echo $row['idTipoEpoca']; ?>">  
                            
                          <?php 
                         echo utf8_encode($row['tipoEpoca']);?>
                            
                    </option>
                              <?php  
                              
                        }
                                  
                                ?>   
                    
                    
                </select>

                <br>

                <select required="" name="tipoAv">
                    <option selected hidden>Tipo de Avaliação</option>
                   <?php 
                        $result = mysqli_query($sqldb, "SELECT * FROM tipo_avaliacao");
                        
                        while($row = $result -> fetch_assoc()){
                            ?>
                    <option value="<?php echo $row['idTipoAvaliacao']; ?>">  
                            
                          <?php 
                          echo utf8_encode($row['tipoAvaliacao']);?>
                            
                    </option>
                              <?php  
                              
                        }
                                  
                                ?>
            </select>
                <br>
                <select required="" name="disciplina">
                    <option selected hidden>Disciplina</option>
                   <?php 
                        $result = mysqli_query($sqldb, "SELECT * FROM disciplina WHERE idAluno = '{$_SESSION['idAluno']}'");
                        
                        while($row = $result -> fetch_assoc()){
                            ?>
                    <option value="<?php echo $row['idDisciplina']; ?>">  
                            
                          <?php                             
                         echo utf8_encode($row['nomeDisciplina'] );?>
                            
                    </option>
                              <?php  
                              
                        }
                                  
                                ?>
            </select>
            </div><br>

            <script type='text/javascript'>
                function show(val) {
                    if (val == "2") {
                        seForEscolar.style.display = 'inline-block';


                    } else {
                        seForEscolar.style.display = 'none';
                        $_POST['tipoAv'] = null;
                        $_POST['tipoEpoca'] = null;
                        $_POST['tipoTarefa'] = 1;
                        $_POST['nomeDisciplina'] = null;
                    }
                }

            </script>
            <p style="display:inline; color:white;"><b>Data Inicio</b></p>
            <input style="width:415px;" required="" type="datetime-local" name="dataInicio"><br>
            <p style="display:inline; color:white; padding-right:13px;"><b>Data Fim</b></p>
            <input style="width:415px;" required="" type="datetime-local" name="dataFim"><br>
            <input required="" placeholder="Progresso da Tarefa (%)" type="number" min="0" max="100" step="0.01" name="progresso"><br>
            <textarea placeholder="Descrição da tarefa" name="descricao" rows="5" cols="70"></textarea><br>
            <input type="submit" value="Criar Tarefa">
        </form>
    </div>

    <?php 
            if (isset($_POST['nomeTarefa'], $_POST['tipoTarefa'], $_POST['dataInicio'], $_POST['dataFim'], $_POST['progresso'], $_POST['descricao'])){
                
                 $tf = $_POST['tipoTarefa'];
                 $di = $_POST['dataInicio'];
                 $df = $_POST['dataFim'];
                 $pg = $_POST['progresso'];
                 $ta = $_POST['tipoAv'];
                 $te = $_POST['tipoEpoca'];
                 $idisc = $_POST['disciplina'];
                 $nt = $_POST['nomeTarefa'];                
                 $dc = $_POST['descricao'];  
                 $nt2 = utf8_decode($nt);
                 $dc2 = utf8_decode($dc);
                         
                     
                    if($df > $di){
                             if($tf == 1){
                             
                              utf8_encode(mysqli_query($sqldb, "INSERT INTO tarefa(nomeTarefa, idTipoTarefa, dataInicio, dataFim, progresso, descricao, idAluno) VALUES('$nt2','$tf','$di','$df','$pg','$dc2','{$_SESSION['idAluno']}')"));
                             $message = "Tarefa Criada com Sucesso!";
                             echo "<script type='text/javascript'>alert('$message');</script>";
                             }
                             
                            elseif($tf ==2){
                                mysqli_query($sqldb, "INSERT INTO tarefa(nomeTarefa, idTipoTarefa, dataInicio, dataFim, progresso, descricao, idAluno, idTipoEpoca, idTipoAvaliacao) VALUES('$nt2','2','$di','$df','$pg','$dc2','{$_SESSION['idAluno']}','$te','$ta')");
                                
                                        //echo "INSERT INTO associada(idTarefa, idDisciplina) VALUES('{$sqldb->insert_id}', $idisc)";
                                        mysqli_query($sqldb, "INSERT INTO associada(idTarefa, idDisciplina) VALUES('{$sqldb->insert_id}', $idisc)");
                                   
                                $message = "Tarefa Criada com Sucesso!";
                                echo "<script type='text/javascript'>alert('$message');</script>";
                            
                            }
                         }
                         
                    if($df < $di){
                            $message = "A data Final não pode ser mais recente que a data Inicial!";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                    
                         }
                
                if($df == $di){
                            $message = "A data Inicia e Final não podem ser iguais!";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                    
                         }
                         
            }
    
        ?>

</body>

</html>
