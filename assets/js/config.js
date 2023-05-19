$(function(){
    /******************************************/
    /************ AUTENTICACIÓN ***************/
    /******************************************/
    $("#bingresa").click(function(){
        Validar();
        return false;
    });
    /******************************************/
    $("#usuario").keypress(function(e){
        if(e.which == 13){
            Validar();
            return false;
        }
    });
    /******************************************/
    $("#clave").keypress(function(e){
        if(e.which == 13){
            Validar();
            return false;
        }
    });
    /******************************************/
    function Validar(){
        var usuario = $("#usuario").val();
        var clave = $("#clave").val();
        if(usuario == ''){
            Swal.fire({
            title: 'Iniciar Sesión',
            text: "Debe ingresar su usuario",
            icon: 'warning'
            });
            //alert('¡Error, debe ingresar su usuario!');
            $("#usuario").focus();
            return false;
        }
        if(clave == ''){
            Swal.fire({
            title: 'Iniciar Sesión',
            text: "Debe ingresar su contraseña",
            icon: 'warning'
            });
            //alert('¡Error, debe ingresar su contraseña!');
            $("#usuario").focus();
            return false;
        }
        autenticarUsuario();
    }
    /******************************************/
    function autenticarUsuario(){
        $("#proceso").val('IniciarProceso');
        var EnviarDatos = $("#fapps").serialize();
        $.ajax({
            data: EnviarDatos,
            url: 'config/validar-usuarios.php',
            type: 'POST',
            dataType: 'json',
            beforeSend: function(){
                $("#bingresa").val('PROCESANDO DATOS, ESPERE...');
            },
            success: function(datos){
                var respuesta = datos.respuesta;
                if(respuesta == 'SI'){
                    $("#bingresa").val('REDIRECCIONANDO, ESPERE...');
                    setTimeout(function(){
                        window.location.href = "dashboard.php";
                    }, 1000)
                }else{
                    $("#bingresa").val('¡ERROR, DATOS INCORRECTOS!');
                        Swal.fire({
                        icon: 'error',
                        title: 'Error...',
                        text: 'Datos Incorrectos',
                        })
                    setTimeout(function(){
                        $("#usuario").val('');
                        $("#clave").val('');
                        $("#bingresa").val('INICIAR SESIÓN');
                        $("#usuario").focus();
                    }, 2000)
                }
            }
        })
    }
    /******************************************/
})