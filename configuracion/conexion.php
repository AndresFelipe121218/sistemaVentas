<?php

require_once "global.php";

$conexion= new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

mysqli_query($conexion, 'SET NAMES "'.DB_ENCODE.'"');

if(msqli_connect_errno()){
    printf("Fallo la conexción a la base de datos: %s\n",msqli_connect_error());
    exit();
}

function executeQuery($sql){

    global $conexion;
    $query = $conexion->query($sql);
    return $query;
}

function executeSingleQuery(){

    global $conexion;
    $query = $conexion->query($sql);
    $row=$query->fetch_assoc();
    return $row;
}

function executeReturnableQueryID(){

    global $conexion;
    $query = $conexion->query($sql);
    return $conexion->insert_id; 
}

function cleanChain($str){

    global $conexion;
    $str = mysqli_real_escape_string($conexion,trim($str));
    return htmlspecialchars($str);
}

?>