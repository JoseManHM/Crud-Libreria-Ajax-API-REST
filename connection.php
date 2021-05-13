<?php
    $servername = "localhost";
    $username = "adminSD";
    $password = "adminSD12345";
    $dbname = "libreria";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn){
        die("Error de conexión: ".mysqli_connect_errno());
    }
?>