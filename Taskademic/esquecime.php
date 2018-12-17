<?php include 'connection.php';
session_start();?>
<!DOCTYPE html>
<html>

<head>
    <title>Esqueceu-se da Password</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>

<body background="img/task2.jpg">
    <img style="margin-top: 40px;" alt="logo" src="img/taskademic.png">
    <br>
    <div id="logintext">
        <form method="POST">
            <h1>Recuperação de Password</h1>
            <h3>Insira o seu Email</h3>
            <input type="text" name="email" placeholder="Email" required>
            <h3>Pergunta de Segurança</h3>
            <input type="text" name="pSeg" placeholder="Qual é a sua cor favorita?" required>
            <br>
            <button type="submit" style="height: 30px; width: 250px; font-size: 14px">Confirmar</button><br><br>
        </form>
    </div>

    <?php
    $result = mysqli_query($sqldb, "SELECT * FROM aluno");
    
    if(isset($_POST['email'], $_POST['pSeg'])){
        
        $email = $_POST['email'];
        $pSeg = $_POST['pSeg'];
       
        while($row = $result -> fetch_assoc()){
        if($row['emailAluno']  == $email && $row['pSegura'] == $pSeg){
            session_start();
            $_SESSION['email']=$email;
            header("Location: mudar_pass.php"); /* Redirect browser */
            exit();
            }
            
            else{
             $message = "Os dados inseridos não se encontram corretos, tente novamente!";
                    echo "<script type='text/javascript'>alert('$message');</script>";
            
            }
        
         }
    }    
    
  ?>

</body>

</html>
