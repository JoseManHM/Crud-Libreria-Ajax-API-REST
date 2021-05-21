<?php
    include('connection.php');
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Access-Control-Allow-Methods: PUT');
    if($_SERVER['REQUEST_METHOD'] === 'PUT'){
    $data = (file_get_contents("php://input"));//Traemos los datos en texto
    $dataJ = json_decode($data,true);//Convertimos los datos a JSON
    foreach ($dataJ as $valores){
        $valor[] = $valores['value'];//Cada valor se guarda en un array
    }
    $sql = "UPDATE libro SET TITULO_LIBRO = '$valor[1]', CVE_EDITORIAL = '$valor[2]', CVE_AUTOR = '$valor[3]' WHERE CVE_LIBRO = '$valor[0]'";
    $resultado = mysqli_query($conn, $sql);
    } else{
        header("HTTP/1.1 400 Bad Request");
    }
    mysqli_close($conn);
?>