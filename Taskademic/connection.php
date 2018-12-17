<?php
    $config = parse_ini_file("config.ini", true);
    $sqldb = mysqli_connect($config['Hostname'], $config['Username'],  $config['Password'], $config['DatabaseName']);
    
    if (!$sqldb) {
        echo 'A base de dados não existe!';
    }




/*
$connection = mysqli_connect('localhost', 'root', 'Rvm@i[9)0?~=');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'pixelw3p_demo');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
*/

?>
