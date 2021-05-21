<?php
header('Access-Control-Allow-Origin: *');
    include('connection.php');
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $titulo = $_POST["tituloL"];//Se extraen los datos del ajax
            $editorial = $_POST["cveEditorial"];
            $autor = $_POST["cveAutor"];
            $sql = "INSERT INTO libro (TITULO_LIBRO, CVE_EDITORIAL, CVE_AUTOR) VALUES ('$titulo', $editorial, $autor)";
            $resultado = mysqli_query($conn, $sql);
            if(!$resultado){
                die('Insercion fallida');
            }
            echo "insercion exitosa";
            mysqli_close($conn);
        } else{
            header("HTTP/1.1 400 Bad Request");
        }
?>