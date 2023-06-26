function cerrarSesion() {
    $.ajax({
        url: "../php/cerrarSession.php?function=add&id_pag=1",
        type: "POST",
        cache: false,
        success: function() {
            // Redireccionar a otra página después de cerrar la sesión
            window.location.href = "../index.html";
        }
    });
}