function cerrarSesion() {
    $.ajax({
        url: "../php/cerrarSession.php",
        type: "POST",
        cache: false,
        success: function() {
            // Redireccionar a otra página después de cerrar la sesión
            window.location.href = "../html/Principal.html";
        }
    });
}