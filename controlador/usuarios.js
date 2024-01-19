$(document).ready(function(){

    console.log('jquery desde usuarios...');


    listarUsuarios();

    function listarUsuarios(){
        $.ajax({
            url:'server/usuarios/listarUsuario.php',
            type:'POST',
            success:function(respuesta){

                let usuarios=JSON.parse(respuesta);

                

                let template='';

                usuarios.forEach(usuario => {
                    template+=`
                        <tr puestoid="${usuario.id}">
                            <th scope="row">${usuario.id}</th>
                            <td>${usuario.usuario}</td>
                            <td>${usuario.password}</td>
                            <td>${usuario.correo}</td>
                            <td>
                                <a class="btn btn-info btn-sm usuario-unico" data-bs-toggle="modal" data-bs-target="#editarusuarioModal" href="#">Editar</a> |  
                                <a class="btn btn-danger btn-sm borrar-usuario" href="#">Eliminar</a>
                            </td>
                        </tr>
                    
                        `
                });
                
                $('#usuarios').html(template);

            }

        });
    }


    $('#guardar-usuario').click(function(){
        
        if($('#usuario').val()==''){
            alertify.alert("","Todos los campos son obligatorios", function(){
                alertify.message('OK');
            });

            return false;
        }

        let datos={
            usuario:$('#usuario').val(),
            correo:$('#correo').val(),
            password:$('#contrasena').val()
        };
        //console.log(datos);
        $.ajax({
            url:'server/usuarios/agregarUsuario.php',
            type:'POST',
            data:datos,
            success:function(res){
                if(res==1){
                    $('#form-agregausuario').trigger('reset');
                        alertify.success('Agregado con exito.');
                        listarUsuarios();
                }
            }
        });

    });


    $(document).on('click', '.borrar-usuario', function(){

            let elemento= $(this)[0].parentElement.parentElement;
            let id= $(elemento).attr('puestoid');
            ///console.log(id);
            $.ajax({
                url:'server/usuarios/eliminarUsuario.php',
                type:'POST',
                data:{id},
                success:function(resp){
                    if(resp==1){
                        //console.log('Se elimino el usuario..');
                        alertify.success('Se ha borrado con exito');
                        listarUsuarios();
                    }else{
                        console.log('Error al conectar');
                    }
                }
    
            });


    });


    $(document).on('click', '.usuario-unico', function(){
            
        let elemento= $(this)[0].parentElement.parentElement;
        let id=$(elemento).attr('puestoid');

        $.ajax({
            url:'server/usuarios/usuarioUnico.php',
            type:'POST',
            data:{id},
            success:function(res){
                
                let usuario = JSON.parse(res);
               // console.log(usuario);
             $('#edit-usuario').val(usuario.usuario);
             $('#edit-correo').val(usuario.correo);
             $('#edit-contrasena').val(usuario.password);
             $('#id-edit-usuario').val(usuario.id);
            }
        });

    });


    $('#guardar-edit-usuario').click(function(){

            if($('#edit-usuario').val()=='' || $('#edit-correo').val()=='' ||  $('#edit-contrasena').val()=='' ){
                alertify.alert("", "Llene todos los campos", function(){
                    alertify.message('OK');
                });

                return false;
            }

            let datos={
                id:$('#id-edit-usuario').val(),
                usuario:$('#edit-usuario').val(),
                correo:$('#edit-correo').val(),
                password:$('#edit-contrasena').val()
            };

            console.log(datos);
            $.ajax({
                url:'server/usuarios/actualizarUsuario.php',
                type:'POST',
                data:datos,
                success:function(resp){
                    ///console.log(resp);
                        if(resp==1){
                            alertify.success('Se ha actualizado el registro');
                            listarUsuarios();
                        }
                }
            })



    });


});