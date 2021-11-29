$(document).ready(function() {
    var datos = new FormData();
    datos.append("menu", "ok")
    $.ajax({
        url: "ctrl_menu",
        type: 'POST',
        processData: false,
        contentType: false,
        data: datos,
        success: function(resp) {
            console.log(resp)
            document.getElementById("menu_php").innerHTML =
                resp;
        }
    });
});