<?php

    include('connection.php');
    $idLibro = $_POST["IdLibro"];

    $sql = "DELETE FROM LIBRO WHERE CVE_LIBRO = '$idLibro'";
    $resultado = mysqli_query($conn, $sql);

    mysqli_free_result($resultado);
    mysqli_close($conn);

?>