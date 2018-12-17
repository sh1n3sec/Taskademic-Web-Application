<?php include 'connection.php'; ?>
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
        <?php if(isset($smsg)){ ?>
        <div role="alert">
            <?php echo $smsg; ?> </div>
        <?php } ?>
        <?php if(isset($fmsg)){ ?>
        <div role="alert">
            <?php echo $fmsg; ?> </div>
        <?php } ?>
        <form method="POST">
            <h1>Recuperação de Password</h1>
            <h3>Insira o seu Email</h3>
            <div>
                <input type="text" name="mail" placeholder="Email" required>
            </div>
            <br>
            <button type="submit" style="height: 30px; width: 250px; font-size: 14px">Enviar nova Password</button><br><br>

        </form>
    </div>
</body>

</html>

<?php
require_once('connection.php');

if(isset($_POST) & !empty($_POST)){
	$mail = mysqli_real_escape_string($sqldb, $_POST['mail']);
	$sql = "SELECT * FROM aluno WHERE emailAluno = '$mail'";
	$res = mysqli_query($sqldb, $sql);
	$count = mysqli_num_rows($res);
	if($count == 1){
		$r = mysqli_fetch_assoc($res);
		$password = $r['passHash'];
		$to = $r['emailAluno'];
		$subject = "Recuperação de Password - TasKademic";

		$message = "A sua Password é: " . $password;
		$headers = "From : pfalcaog@gmail.com";
		if(mail($to, $subject, $message, $headers)){
			echo "A sua password foi enviada para o seu email!";
		}else{
			echo "O envio da nova password falhou, tente novamente!";
		}

	}else{
		echo "Esse email não existe!";
	}
}


?>
