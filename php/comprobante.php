<?php
    if ( !($_GET['function']='add' && $_GET['id_pag'])){
        header("Location: ../html/Principal.html");
        exit;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<script type="text/javascript" src="validacionForm.js"></script>-->
    <title>Comprobante</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&family=Sacramento&display=swap" rel="stylesheet">

    <script src="../js/bootstrap.bundle.min.js" ></script>

    </head>
    <body class="position-relative">
        <video autoplay muted loop id="myVideo">
            <source src="../video/Video_BG.mp4" type="video/mp4">
          </video>
            <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary  navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="../html/Principal.html">Rythm</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="comprobante.php?function=add&id_pag=1">Comprobante</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="formulario.php?function=add&id_pag=1">Agendar Evento</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="adminForms.php?function=add&id_pag=1">Administrador</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>  


        <main>
            <section class=" contenedor w-75 p-3 container my-4 position-relative" id="contComprobante" >
                <h1>Comprobante</h1>                
                <form action="RecPDF.php?function=add&id_pag=1" method="post" id="recuperarComprobante" name="recuperarComprobante">
                    <fieldset>
                        <div class="recuperar">
                            <label for="folio"><p>En caso de haber perdido tu comprobante al generar la cita  puedes recuperarlo ingresando tu <span>CURP</span> y la <span>fecha del evento</span></p></label>
                            <input id="folio" name="folio" type="text" placeholder="Ejem.PEBJ031015HDFRRNA9-10-05-2023" class="input-group mb-3" required><br><br>
                        </div>
                    </fieldset>
                    <input type="submit" id="botonComprobante" class="boton-submit position-absolute  start-50 translate-middle-x" value="Generar comprobante"></input>
                </form>
            </section>
            <section class="pregunta  col-sm-12 col-md-4 col-lg-4 col-xl-4 py-4">
                <a href=""><p>¿Aún no tienes una cita? agendala aqui</p></a>
            </section>
        </main>
        <div class="footer position-absolute fixed-bottom">
            <footer>
                <ul class="nav justify-content-center pb-3 ">
                    <li class="nav-item"><span class="nav-link px-5 text-body-secondary">Contáctanos: 55 12345678</span></li>
                    <li class="nav-item"><span class="nav-link px-5 text-body-secondary">Encuéntranos en <a class="instagram" href="#">@NoTenemosIG</a></span></li>
                </ul>
            </footer>
        </div>
    </body>
</html>