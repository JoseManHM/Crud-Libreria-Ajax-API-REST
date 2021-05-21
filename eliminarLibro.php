<?php
    include('connection.php');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Access-Control-Allow-Methods: DELETE');
    if($_SERVER['REQUEST_METHOD'] === 'DELETE'){
        $data = file_get_contents("php://input");//Se extrae el Id que viene del ajax y se guarda en una variable
        $sql = "DELETE FROM libro WHERE CVE_LIBRO = '$data'";
        $resultado = mysqli_query($conn, $sql);
        mysqli_close($conn);
    } else{
        header("HTTP/1.1 400 Bad Request");
    }
?>