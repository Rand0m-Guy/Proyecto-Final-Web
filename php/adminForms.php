<?php
    if ( !($_GET['function']='add' && $_GET['id_pag'])){
        header("Location: ../html/Principal.html");
        exit;
    }
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulario Admin</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&family=Sacramento&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
    <script src="../js/bootstrap.bundle.min.js" ></script>
  </head>
  <body class="position-relative bodyAdmin">
    
    <!-- Navbar -->  
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
                            <a class="nav-link " href="comprobante.php?function=add&id_pag=1">Comprobante</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="formulario.php?function=add&id_pag=1">Agendar Evento</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="adminForms.php?function=add&id_pag=1">Administrador</a>
                        </li>
                    </ul>
                </div>
        </div>
    </nav>
    <div class="contenido_Completo">    
        <!-- Div para el formulario -->
        <section class=" contenedor w-75 p-3  container my-3 position-relative"  id="contAdmin" >
            <h1>Administrador</h1>
            <form name="loginAdmin" action="" method="post" id="loginAdmin">
                <fieldset>
                    <div class="loginAdmin ">
                        <label for="usuario" class="">Usuario<span aria-label="required">*</span></label><br><br>
                        <input type="text" id="usuario" name="usuario" placeholder="Juan Rubén" required class="input-group mb-3"><br>
                        <label for="contra">Contraseña<span aria-label="required">*</span></label><br><br>
                        <input type="password" id="contra" name="contra" required class="input-group mb-3"><br>
                    </div>
                </fieldset>
                <input type="submit" id="botonAdmin" class="boton-submit  position-absolute  start-50 translate-middle-x" value="Entrar"></input>
            </form>
        </section>
    </div>
    <!-- footer -->
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