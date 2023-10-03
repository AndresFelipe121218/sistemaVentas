

var tabla;

function init(){

    mostrarelformulario(false);
    listar();



}


//Funcion para limpiar input
function limpia(){

    $(#nombre).val("");
    $(#descripcion).val("");
    $(#categoria).val("");

}

//Funcion para mostrar el formulario
function mostrarelformulario(x){

    limpiar();

    if(x){

        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled", false);
        $("#btnagregar").hide();

    }else{

        $("#listadoregistros").show();
        $("#formularioregistros").hide();
        $("#btnagregar").show();

    }


}


function cancelarformulario(){

    limpiar();
    mostrarelformulario(false);

}

function listar(){

    tabla=$('#tablalistado').dataTable({

        "aProcessing": true, // Avtivamos el procesamiento del datatables 
        "aServerSide": true, // Paginacion y filtrado realizados por el servidor 
            dom: 'Bfrtip',       // Definimos los elementos del control de la tabla 


            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdf'

            ],

            "ajax":{

                url: '../ajax/categoria.php?op=listar',
                type : "get",
                dataTyoe : "json",
                error: funcion(e){
                    console.log(e.responseText); 
                }
            }, 



    }).DataTable(); 


}




init();