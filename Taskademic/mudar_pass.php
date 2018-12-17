<?php include 'connection.php'; 
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Mudança de Password</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>

<body background="img/task2.jpg">
    <img style="margin-top: 40px;" id="logo" src="img/taskademic.png">
    <div align="center" style="margin-top: 5%">
        <form method="POST">
            <br>
            <h1>Atualização de Password</h1>
            <input required="" type="password" placeholder="Nova Password" name="pass"><br>
            <input required="" type="password" placeholder="Repita a nova password" name="pass2"><br><br>
            <input type="submit" style="width: 250px" value="Mudar Password"><br><br>
            <br>
        </form>
    </div>

    <?php
     if(isset($_POST['pass'], $_POST['pass2'])){
            $pass = $_POST['pass'];
            $pass2 = $_POST['pass2'];           
            $result = mysqli_query($sqldb, "SELECT * FROM aluno");
            
            if ($_POST['pass'] != $_POST['pass2']) {
                $message = "As Passwords não coincidem! Tente novamente.";
                    echo "<script type='text/javascript'>alert('$message');</script>";
             }
            
         
            if($_POST['pass'] == $_POST['pass2']){
            while($row = $result -> fetch_assoc()){  
                
            $passHash = md5($_POST['pass']);
            $email2 = $_SESSION['email'];    
            mysqli_query($sqldb, "UPDATE aluno SET passHash='$passHash' WHERE emailAluno='$email2'");
            
            header("Location: pass_sucesso.php"); /* Redirect browser */
            }
            
            }
            
          
        }

    
    
?>


</body>

</html>
