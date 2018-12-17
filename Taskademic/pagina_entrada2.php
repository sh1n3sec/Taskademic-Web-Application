<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Entrada</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>

<body background="img/task2.jpg">
    <header style="margin-top: 15px;">
        <img alt="logo" src="img/taskademic.png" style="width: 230px; height: 95px; ">
        <nav class="topnav">
            <a href="listar_todos_utilizadores.php">Utilizadores</a>
            <a href="listar_todas_tarefas.php">Tarefas</a>
            <div style="display: inline; float: right;">
                <a href="home.php"><img src="img/logout.png" alt="logOut" style="width: 20px; display: inline; margin-top: 0px; vertical-align: top;">&nbsp;&nbsp;&nbsp;Logout</a>
            </div>
            <a style="float: right;" href="#">
                <img src='img/admin.png' alt="admin" style="width: 22px; display: inline; margin-top: 0px; vertical-align: top;">&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['nomeAdmin'];?>
            </a>
        </nav>
    </header><br>

</body>

</html>
