function ver_tabla() {
    $.ajax({
        url: "tbl_users",
        type: 'POST',
        data: { ver_tabla_user: "ok" },
        success: function(resp) {
            document.getElementById("tabla_usuarios").innerHTML = resp;
            $(document).ready(function() {
                $('#example').DataTable();
            });
        }
    });
}

function tbl_eliminar_usuario() {
    $.ajax({
        url: "tbl_users",
        type: 'POST',
        data: { tbl_eliminar_usuario: "ok" },
        success: function(resp) {
            document.getElementById("tabla_usuarios").innerHTML = resp;
            $(document).ready(function() {
                $('#example').DataTable();
            });
        }
    });
}

function eliminar_usuario(id_usuario) {
    let delete_user = confirm("desea eliminar el usuario con el id " + id_usuario);
    if (delete_user) {
        $.ajax({
            url: "tbl_users",
            type: 'POST',
            data: { del_user: id_usuario },
            success: function(resp) {
                var respuesta = JSON.parse(resp);
                if (respuesta.status == 1) {
                    alert("usuario eliminado correctamente")
                    ver_tabla()
                } else {
                    alert("error al eliminar usuario")
                }
            }
        });
    }
}



function agregar_usuario() {
    if ($('#nombre_usuario').val() == "") {
        alert("Campo NOMBRE USUARIO VACIO")
    } else if ($('#correo_usuario').val() == "") {
        alert("Campo CORREO USUARIO VACIO")
    } else if ($('#contrasena_usuario').val() == "") {
        alert("Campo CONTRASEÑA USUARIO VACIO")
    } else if ($('#tipo_usuario').val() == 0) {
        alert("SELECCIONA UN TIPO DE USUARIO")
    } else {
        var datos = new FormData();
        datos.append("nombre_usuario", $('#nombre_usuario').val());
        datos.append("correo_usuario", $('#correo_usuario').val());
        datos.append("contrasena_usuario", $('#contrasena_usuario').val());
        datos.append("tipo_usuario", $('#tipo_usuario').val());

        $.ajax({
            url: "tbl_users",
            type: 'POST',
            processData: false,
            contentType: false,
            data: datos,
            success: function(resp) {
                var resultado = JSON.parse(resp);
                if (resultado.status == 1) {
                    alert("usuario agregado exitosamente")
                    ver_tabla()
                } else {
                    alert("error al añadir usuario")
                }
            }
        });
    }
}

function modificar_usuario(id_usuario) {
    $.ajax({
        url: "tbl_users",
        type: 'POST',
        data: { modal_mod_usuario: id_usuario },
        success: function(resp) {
            document.getElementById("mdl_mod_usuario").innerHTML = resp;
            $('#modal_mod_users').modal('toggle');
        }
    });
}

function tbl_modificar_usuario() {
    $.ajax({
        url: "tbl_users",
        type: 'POST',
        data: { ver_tabla_mod_user: "ok" },
        success: function(resp) {
            document.getElementById("tabla_usuarios").innerHTML = resp;
            $(document).ready(function() {
                $('#example').DataTable();
            });
        }
    });
}


function modificar_info_usuario() {
    var datos = new FormData();
    datos.append("nombre_usuario_mod", $('#nombre_usuario_mod').val());
    datos.append("correo_usuario_mod", $('#correo_usuario_mod').val());
    datos.append("contrasena_usuario_mod", $('#contrasena_usuario_mod').val());
    datos.append("id_usuario_mod", $('#id_usuario_mod').val());

    $.ajax({
        url: "tbl_users",
        type: 'POST',
        processData: false,
        contentType: false,
        data: datos,
        success: function(resp) {
            var resultado = JSON.parse(resp);
            if (resultado.status == 1) {
                alert("usuario modificado exitosamente")
                ver_tabla()
            } else {
                alert("error al modificar usuario")
            }
        }
    });
}