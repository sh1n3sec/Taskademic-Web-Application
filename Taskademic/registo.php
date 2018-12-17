<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Registo</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>

<body background="img/task2.jpg">
    <img style="margin-top: 40px;" id="logo" src="img/taskademic.png">
    <div align="center" style="margin-top: 5%">
        <form method="POST">
            <br>
            <h1>REGISTO</h1>
            <input required="" type="text" placeholder="Nome" name="nome"><br>
            <input required="" type="email" placeholder="Email" name="email"><br>
            <input required="" type="password" placeholder="Password" name="pass"><br>
            <input required="" type="password" placeholder="Repita a password" name="pass2"><br>
            <h3>Pergunta de Segurança</h3>
            <input required="" type="text" placeholder="Qual é a sua cor favorita?" name="pSeg"><br><br>
            <input type="submit" value="REGISTAR">
        </form>
    </div>
    <?php 
        
        
        if(isset($_POST['email'], $_POST['pass'], $_POST['nome'], $_POST['pass2'], $_POST['pSeg'])){
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $nome = $_POST['nome'];
            $pass2 = $_POST['pass2'];
            $pSeg = $_POST['pSeg'];      
            
            $result = mysqli_query($sqldb, "SELECT * FROM aluno");
  
            if ($_POST['pass'] != $_POST['pass2']) {
                $message = "As Passwords não coincidem! Tente novamente.";
                    echo "<script type='text/javascript'>alert('$message');</script>";
             }
             
             $num_rows = mysqli_num_rows($result);
            
            if(($num_rows == 0 && $pass === $pass2)){
                
            $passHash = md5($pass);
            mysqli_query($sqldb, "INSERT INTO aluno(nomeAluno, emailAluno, passHash, pSegura) VALUES('$nome', '$email', '$passHash', '$pSeg')");
            
            header("Location: reg_bem_sucedido.php");
            exit();
                
            }
            
            
            while($row = $result -> fetch_assoc()){
                            
            if ($email === $row['emailAluno']){
                $message = "Este email já existe, por favor insira outro email!";
                    echo "<script type='text/javascript'>alert('$message');</script>";
            }
            
            if (($email != $row['emailAluno'] && $pass === $pass2)){

            $passHash = md5($pass);
            mysqli_query($sqldb, "INSERT INTO aluno(nomeAluno, emailAluno, passHash, pSegura) VALUES('$nome', '$email', '$passHash', '$pSeg')");
            
            header("Location: reg_bem_sucedido.php"); /* Redirect browser */
            exit();
            }
           
          }
        }
        ?>

</body>

</html>
