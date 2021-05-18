<?php
    include('connection.php');
            $titulo = $_POST["tituloL"];
            $editorial = $_POST["cveEditorial"];
            $autor = $_POST["cveAutor"];
            
            $sql = "INSERT INTO libro (TITULO_LIBRO, CVE_EDITORIAL, CVE_AUTOR) VALUES ('$titulo', $editorial, $autor)";
            $resultado = mysqli_query($conn, $sql);
            if(!$resultado){
                die('Insercion fallida');
            }
            echo "insercion exitosa";
            mysqli_close($conn);
    
?>