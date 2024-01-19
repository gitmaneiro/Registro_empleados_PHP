$(document).ready(function(){

    ///console.log('jquery funcionando desde empleados');
    listarEmpleados();
    llenarSelect();

    function listarEmpleados(){
        $.ajax({
            url:'server/empleados/listarempleado.php',
            type:'POST',
            success:function(respuesta){

                let empleados=JSON.parse(respuesta);
                let ruta=String('serverImg/');
                let rutacv=String('servercv/');
                let template='';

                empleados.forEach(empleado => {
                    template+=`
                            <tr empleadoid="${empleado.id}">
                                <th scope="row">${empleado.p_nombre} ${empleado.p_apellido}</th>
                                <td><img src="${ruta}${empleado.foto}" width="40" /></td>
                                <td><a href="${rutacv}${empleado.cv}">${empleado.cv}</a></td>
                                <td>${empleado.puesto}</td>
                                <td>${empleado.fecha}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm carta" target="_blank" href="secciones/cartaRecemendacion.php?id=${empleado.id}">Carta</a> | 
                                    <a class="btn btn-info btn-sm empleado-unico" data-bs-toggle="modal" data-bs-target="#act_empleado_Modal" href="#">Editar</a> | 
                                    <a class="btn btn-danger btn-sm borrar-empleado" href="#">Eliminar</a>
                                </td>
                            </tr>
                    
                        `
                });
                
                $('#body-empleados').html(template);

            }

        });
    }



    function llenarSelect(){
        $.ajax({
            url:'server/empleados/llenarSelect.php',
            type:'POST',
            success:function(resp){
                let puestos= JSON.parse(resp);
                    ///console.log(puestos);
                let template='';

                puestos.forEach(puesto=>{
                    template+=`
                    <option value="${puesto.id}">${puesto.puesto}</option>
                    `
                });

                $('#selectagregaempleado').append(template);
                $('#selectagregaempleadou').append(template);
            }
        });
    }



    $('#btn-agrega-empleado').click(function(){

        ///console.log('agregando empleado...');

        if($('#primernombre').val()==''|| $('#segundonombre').val()=='' || $('#primerapellido').val()=='' || $('#segundoapellido').val()=='' || $('#foto').val()=='' || $('#cv').val()=='' || $('#selectagregaempleado').val()==0 || $('#fechadeingreso').val()==''){
            alertify.alert("","Todos los campos son obligatorios", function(){
                alertify.message('OK');
            });
            return false

        }

        let formData=new FormData(document.getElementById('form-agregaempleado')); 
        console.log(formData);
        $.ajax({
            url:'server/empleados/agregaEmpleado.php',
            type:'POST',
            data:formData,
            contentType: false,
            processData: false,
            success:function(res){ 
                   console.log('archivo agregado...');
                    $('#form-agregaempleado').trigger('reset');
                   alertify.success('Agregado con exito.');
                    listarEmpleados();
            }
        });

            
    });



    $(document).on('click', '.borrar-empleado', function(){

        let elemento= $(this)[0].parentElement.parentElement;
        //console.log(elemento);
        let id= $(elemento).attr('empleadoid');
        console.log(id);

        $.ajax({
            url:'server/empleados/eliminarEmpleado.php',
            type:'POST',
            data:{id},
            success:function(respuesta){
                if(respuesta==1){
                    console.log('Se elimino el puesto..');
                    alertify.success('Se ha borrado con exito');
                    listarEmpleados();
                }else{
                    console.log('Error al conectar');
                }
            }

        }); 

    });



    $(document).on('click', '.empleado-unico', function(){

        let elemento= $(this)[0].parentElement.parentElement;
        let id= $(elemento).attr('empleadoid');
        console.log(id);
        let ruta=String('serverImg/');
        $.ajax({
            url:'server/empleados/empleadoUnico.php',
            type:'POST',
            data:{id},
            success:function(res){
                
                let empleado = JSON.parse(res);

                //console.log(empleado);

             $('#primernombreu').val(empleado.p_nombre);
             $('#segundonombreu').val(empleado.s_nombre);
             $('#primerapellidou').val(empleado.p_apellido);
             $('#segundoapellidou').val(empleado.s_apellido);
                $('#img-act-empleado').attr('src', `${ruta}${empleado.foto}`);
                $('#cvu-a').attr('href', `${empleado.cv}`);
             $('#cvu-a').text(`${empleado.cv}`);
             $('#primernombreu').val(empleado.p_nombre);
             $('#selectagregaempleadou').val(empleado.id_puesto);
             $('#fechadeingresou').val(empleado.fecha);
             $('#id-edit-empleado').val(empleado.id);
        
            }
        });



    });


    $('#btn-act-empleado').click(function(){

        let formData=new FormData(document.getElementById('form-act-empleado')); 

        $.ajax({
            url:'server/empleados/actualizarEmpleado.php',
            type:'POST',
            data:formData,
            contentType: false,
            processData: false,
            success:function(resp){
                console.log(resp);
                if(resp==1){
                    alertify.success('Se ha actualizado el registro');
                    listarEmpleados();
                }
                
            }
        });


    });


   // $(document).on('click', '.carta', function(){

    //    let elemento= $(this)[0].parentElement.parentElement;
     //   let id= $(elemento).attr('empleadoid');
      //  console.log(id);
        
   /// });

 

   // $('#example').DataTable({
    //    'ajax':{
    ///     'url':'server/empleados/listarempleado.php',
     //    "type": "POST",
     //    "dataSrc":""
      //  },
      //  "columns":[
      //      {"data":"p_nombre"},
       ///     {"data":"foto"},
        //    {"data":"cv"},
       //     {"data":"puesto"},
       //     {"data":"fecha"},
       ///     {"defaultContent":"<button class='btn btn-info'>Editar</button>"}
       // ]

    // });

  

});