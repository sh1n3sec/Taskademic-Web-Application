<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>TasKademic</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <style>
        a#registo {

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
    <img style="margin-top: 40px;" alt="logo" src="img/taskademic.png">
    <br>
    <div id="logintext">
        <form method="POST">
            <br>
            <h1>LOGIN</h1>
            <input type="email" required='' placeholder="Email" name="email"><br>
            <input type="password" required='' placeholder="Password" name="pass"><br><br>
            <a href="esquecime.php">Esqueci-me da Password!</a><br><br>
            <input style="opacity: 1;" type="submit" value="LOGIN"><br><br>
            <a href="registo.php" id="registo">Não é membro? Registe-se Agora!</a><br><br>
        </form>
    </div>
    <?php    
    
    
    $result = mysqli_query($sqldb, "SELECT * FROM aluno");
    $num_rows = mysqli_num_rows($result);
    
    if(isset($_POST['email'], $_POST['pass'])){
        
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        
        if ($num_rows == 0){
            $message = "Não existem Utilizadores registados!";
            echo "<script type='text/javascript'>alert('$message');</script>"; 
        }
        
        while($row = $result -> fetch_assoc()){
            
            
            if($email == 'admin@admin.pt' && $pass == '123'){
                 session_start();
                 $_SESSION['nomeAdmin'] = 'Admin';
                 
                header("Location: pagina_entrada2.php"); 
                exit();
                
            }
            
            
            if($row['emailAluno']  == $email && $row['passHash'] == md5($pass)){
            
            session_start();
            $_SESSION['idAluno'] = $row['idAluno'];
            $_SESSION['nome'] = $row['nomeAluno'];
            
            header("Location: pagina_entrada.php"); /* Redirect browser */
            exit();
            
            }
            
            
            
            if($row['emailAluno'] != $email || $row['passHash'] != md5($pass)){
            $message = "O utilizador não existe na base de dados ou a palavra pass está incorreta! Deseja criar um novo utilizador?";
            echo "<script type='text/javascript'>var r = confirm('$message'); "
                    . "if (r==true){"
                    . "window.location.href='registo.php';}</script>"; 

            }
        }
    }   
    ?>
</body>

</html>
