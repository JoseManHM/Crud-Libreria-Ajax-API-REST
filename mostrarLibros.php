<?php
include('connection.php');
header('Access-Control-Allow-Origin: *');
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $sql = "SELECT A.CVE_AUTOR CLAVE_AUTOR, A.NOM_AUTOR NOMBRE, A.APELLIDO_AUTOR APELLIDOS, E.CVE_EDITORIAL CLAVE_EDITORIAL, E.NOMBRE_EDITORIAL EDITORIAL, L.CVE_LIBRO CLAVE_LIBRO, L.TITULO_LIBRO LIBRO FROM autor A INNER JOIN editorial E INNER JOIN libro L ON A.CVE_AUTOR = L.CVE_AUTOR AND E.CVE_EDITORIAL = L.CVE_EDITORIAL;";
    $resultado = mysqli_query($conn, $sql);
    if(!$resultado){
        die('Consulta fallida'.mysqli_error($conn));
    } else{
        while($data = mysqli_fetch_assoc($resultado)){
            $arreglo["data"][] = $data;
        }
        echo json_encode($arreglo);
    }
    mysqli_free_result($resultado);
    mysqli_close($conn);    
} else{
    header("HTTP/1.1 400 Bad Request");
}  
?>  