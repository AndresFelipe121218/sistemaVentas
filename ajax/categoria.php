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

    case 'desactivate':

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

            $response=$categoria->show($idcategoria);
            echo json_encode($response);
            break;

    break;
        
    case 'list':

            $response=$categoria->list();
            $data=Array();


            while($resp=$response->fetch_object()){

                $data[]=array(
                    "0"=>$resp->$idcategoria,
                    "1"=>$resp->$nombre,
                    "2"=>$resp->$descripcion,
                    "3"=>$resp->$condicion,
                );
            }

            $result=array(
                "echo"=>1,
                "totalrecords"=>count($data),
                "itotalDisplay"=>count($data),
            );

    break;
        
        



}

?>