$(document).ready(function(){

    //console.log('Login y registro..');
    $('#form_login').submit(function(e){
        e.preventDefault();

        if($('#correo').val()=='' || $('#password').val()==''){
            alertify.alert('', 'Debes llenar todos los campos');
            return false;
        }

        let datos={
            'correo':$('#correo').val(),
            'password':$('#password').val()
        };

        //console.log(datos);
        $.ajax({
            url:'server/relogin.php',
            type:'POST',
            data:datos,
            success:function(respuesta){

                //console.log(respuesta);
                if(respuesta==1){
                    window.location='index.php';
                    alertify.success('Bienvenido al sistema de empleados.');
                }else{
                    alertify.alert('', 'Credenciales no validas');
                }
            }
        });

    });


});