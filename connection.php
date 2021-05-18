<?php
    $servername = "localhost";
    $username = "adminSD";
    $password = "adminSD12345";
    $dbname = "libreria";
    // $servername = "sql207.epizy.com";
    // $username = "epiz_28618007";
    // $password = "QavE1l80XVh";
    // $dbname = "epiz_28618007_libreria";
    // $servername = "localhost";
    // $username = "id16815001_adminsd";
    // $password = "G0dNOt3xx15sT666-";
    // $dbname = "id16815001_libreria";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn){
        die("Error de conexión: ".mysqli_connect_errno());
    }
?>