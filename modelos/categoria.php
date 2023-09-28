<?php


require_once "../configuracion/conexion.php";

class Categoria{

    public function __contruct(){


    }
    //Funcion para insertar
    public funcion insert($nombre, $descripcion){

        $sql="INSERT INTO categoria(nombre, descripcion, condicion) VALUES('$nombre', '$descripcion', '1')";
        return executeQuery($sql);
    }

    //Funcion para editar
    public funcion edit($idcategoria, $nombre, $descripcion){

        $sql="UPDATE categoria SET nombre='$nombre', descripcion='$descripcion' WHERE idcategoria='$idcategoria'";
        return executeQuery($sql);
    }
    
    //Funcion para desactivar categoria
    public funcion deactivate($idcategoria){

        $sql="UPDATE categoria SET condicion='0' WHERE idcategoria='$idcategoria'";
        return executeQuery($sql);
    }

    //Funcion para activar categoria
    public funcion active($idcategoria){

        $sql="UPDATE categoria SET condicion='1' WHERE idcategoria='$idcategoria'";
        return executeQuery($sql);
    }

    //Funcion para mostrar categoria, consulta unica
    public function show($idcategoria){

        $sql="SELECT * FROM categoria WHERE idcategoria='$idcategoria'";
        return executeSingleQuery($sql);

    }

    //Funcion para listar categoria    
    public function list(){

        $sql="SELECT * FROM categoria";
        return executeQuery;

    }

} 

?>