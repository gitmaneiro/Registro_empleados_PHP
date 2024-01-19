$(document).ready(function(){

    ////console.log('jquery funcionando desde puestos...');

    listarPuestos();

    function listarPuestos(){
        $.ajax({
            url:'server/puestos/listarPuesto.php',
            type:'POST',
            success:function(respuesta){

                let puestos=JSON.parse(respuesta);

                

                let template='';

                puestos.forEach(puesto => {
                    template+=`
                        <tr puestoid="${puesto.id}">
                            <th scope="row">${puesto.id}</th>
                            <td>${puesto.puesto}</td>
                            <td>
                                <a class="btn btn-info btn-sm puesto-unico" data-bs-toggle="modal" data-bs-target="#actualizarModal" href="#">Editar</a> | 
                                <a class="btn btn-danger btn-sm borrar-puesto" href="#">Eliminar</a>
                            </td>
                        </tr>
                    
                        `
                });
                
                $('#puestos').html(template);

            }

        });
    }
    
    
    $('#guardar-puesto').click(function(){

        if($('#nombredelpuesto').val()==''){
            alertify.alert("","Todos los campos son obligatorios", function(){
                alertify.message('OK');
            });
            return false
        }

           /// console.log('agregando puesto.');
            let dato={
                nombrepuesto:$('#nombredelpuesto').val()
            };

            ///console.log(dato);
            $.ajax({
                url:'server/puestos/agregarPuesto.php',
                type:'POST',
                data:dato,
                success:function(respuesta){ 
                    if(respuesta==1){
                        $('#form-agregapuesto').trigger('reset');
                        alertify.success('Agregado con exito.');
                        listarPuestos();
                    }

                    
                }
            });
    });


    $(document).on('click', '.borrar-puesto', function(){

            let elemento= $(this)[0].parentElement.parentElement;
            //console.log(elemento);
            let id= $(elemento).attr('puestoid');
            ///console.log(id);
    
            $.ajax({
                url:'server/puestos/eliminarPuesto.php',
                type:'POST',
                data:{id},
                success:function(respuesta){
                    if(respuesta==1){
                        //console.log('Se elimino el puesto..');
                        alertify.success('Se ha borrado con exito');
                        listarPuestos();
                    }else{
                        console.log('Error al conectar');
                    }
                }
    
            });       

    });

    

    $(document).on('click', '.puesto-unico', function(){
            let elemento= $(this)[0].parentElement.parentElement;
            let id=$(elemento).attr('puestoid');

            $.ajax({
                url:'server/puestos/puestoUnico.php',
                type:'POST',
                data:{id},
                success:function(res){
                    
                    let puesto = JSON.parse(res);

                    ////console.log(puesto);

                 $('#actualizarpuesto').val(puesto.puesto);
                 $('#id-puesto').val(puesto.id);
            
                }
            });


    });


    $('#btn-actzpuesto').click(function(){


        if($('#actualizarpuesto').val()==''){
            alertify.alert("","Todos los campos son obligatorios", function(){
                alertify.message('OK');
            });
            return false
        }

        let datos={
            id:$('#id-puesto').val(),
            puesto:$('#actualizarpuesto').val()
        };

        console.log(datos);
        $.ajax({
            url:'server/puestos/actualizarPuesto.php',
            type:'POST',
            data:datos,
            success:function(resp){
                ///console.log(resp);
                    if(resp==1){
                        alertify.success('Se ha actualizado el registro');
                        listarPuestos();
                    }
            }
        })

    })


    ///new DataTable('#table-puestos');

});