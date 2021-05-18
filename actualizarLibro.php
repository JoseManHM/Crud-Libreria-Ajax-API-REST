<?php
    include('connection.php');
    $idLibro = $_POST["IdLibro"];
    $tituloLibro = $_POST["tituloL"];
    $idEditorial = $_POST["cveEditorial"];
    $idAutor = $_POST["cveAutor"];

    $sql = "UPDATE libro SET TITULO_LIBRO = '$tituloLibro', CVE_EDITORIAL = '$idEditorial', CVE_AUTOR = '$idAutor' WHERE CVE_LIBRO = '$idLibro'";
    $resultado = mysqli_query($conn, $sql);

   // mysqli_free_result($resultado);
    mysqli_close($conn);
?>