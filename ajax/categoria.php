<?php



require_once "../modelos/categortia.php";


$categoria= new Categoria();

$idcategoria=isset($_POST["idcategoria"]) ? cleanChain($_POST["idcategoria"]) : "";

$nombre=isset($_POST["nombre"]) ? cleanChain($_POST["nombre"]) : "";

$descripcion=isset($_POST["descripcion"]) ? cleanChain($_POST["descripcion"]) : "";


switch(_GET[""op]){

    case 'guardareditar':
        if(empty($idcategoria)){

            $response=$categoria->insert($nombre, $descripcion);
            echo $response ? "Categoria resgistrada" : "Categoria no se pudo registrar";


        }else{

            $response=$categoria->edit($idcategoria,$nombre,$descripcion);
            echo $response ? "Categoria actualizada" : "Categoria no se pudo actualizar";


        }


    break;

    case 'desactive':

            $response=$categoria->desactivate($idcategoria);
            echo $response ? "Categoria desactivada" : "Categoria no se puede desactivar";          
            break;
    break;
        
    case 'active':

            $response=$categoria->active($idcategoria);
            echo $response ? "Categoria activada" : "Categoria no se puede activar";          
            break;


    break;
       
    case 'show':
        break;
        
    case 'list':
        break;
        
        



}

?>