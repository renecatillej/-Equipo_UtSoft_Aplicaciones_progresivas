$(document).ready(function() {
    Notification.requestPermission(function(permission) {
        if (Notification.permission === "granted") {
            var options = {
                body: "Descripción o cuerpo de la notificación",
                icon: "http://localhost/configuraciones/imagenes/foto.jpgimagenes/foto.jpg",
                dir: "ltr"
            };
            var notification = new Notification("Hola :)", options);
        } else {
            Notification.requestPermission(function(permission) {
                if (Notification.permission === "granted") {
                    alerta();
                }
            });
        }
    });


    /*if (Notification.permission === "granted") {
        alert("alertas activadas")
    } else {
        alert("alertas desactivadas")
    }*/
});

function alerta() {
    var options = {
        body: "Descripción o cuerpo de la notificación",
        icon: "http://localhost/configuraciones/imagenes/foto.jpgimagenes/foto.jpg",
        dir: "ltr"
    };
    var notification = new Notification("Hola :)", options);
}