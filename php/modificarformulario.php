<?php
    session_start();
    $curp=$_SESSION['curp'];
    $folio=$_SESSION['folio'];
    $nombre=$_SESSION['nombre'];
    $appat=$_SESSION['ap'];
    $apmat=$_SESSION['am'];
    $curp=$_SESSION['curp'];
    $correo=$_SESSION['mail'];
    $calle=$_SESSION['calle'];
    $num_ext=$_SESSION['nex'];
    $num_int=$_SESSION['nin'];
    $colonia=$_SESSION['col'];
    $cp=$_SESSION['cop'];
    $entidad=$_SESSION['entidad'];
    $alc_o_mun=$_SESSION['alcmun'];
    $lugar=$_SESSION['lugar'];
    $fecha=$_SESSION['date'];
    $hora=$_SESSION['hora'];
    $tipo_evento=$_SESSION['tipo'];
    $num_personas=$_SESSION['np'];
    $menu=$_SESSION['menu'];
echo "<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../js/validacionForm.js"></script>
    <title>Formulario</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&family=Sacramento&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="../js/bootstrap.bundle.min.js" ></script>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body class="position-relative bodyRegistro">
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
                            <a class="nav-link active" href="formulario.php?function=add&id_pag=1">Agendar Evento</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="adminForms.php?function=add&id_pag=1">Administrador</a>
                        </li>
                    </ul>
                </div>
        </div>
    </nav>

    <section class=" contenedor w-75 p-3 my-3 position-relative container"  id="contForm" >
        <form name="registro" action="validar.php?function=add&id_pag=1" method="POST" id="registro" onsubmit="return validaciones()">
            <div class="row">
                <div class="col">
                    <label for="nombre">Nombre(s)<span aria-label="required">*</span></label><br>
                    <input class="input-group mb-3" type="text" id="nombre" name="nombre" placeholder="Juan Rubén" required>
                </div>
                <div class="col">
                    <label for="apellidoP">Apellido Paterno<span aria-label="required">*</span></label><br>
                    <input class="input-group mb-3" type="text" id="apellidoP" name="apellidoP" placeholder="Pérez" required>
                </div>
                <div class="col">
                    <label for="apellidoM">Apellido Materno<span aria-label="required">*</span></label><br>
                    <input class="input-group mb-3" type="text" id="apellidoM" name="apellidoM" placeholder="Bárcenas" required>
                </div>
            </div>
            <div class="row line-bottom">
                <div class="col">
                    <label for="curp">CURP<span aria-label="required">*</span></label><br>
                    <input class="input-group mb-3" type="text" id="curp" name="curp" placeholder="SABC560626MDFLRN09" required>
                </div>
                <div class="col">
                    <label for="correo">Correo Electrónico<span aria-label="required">*</span></label><br>
                    <input class="input-group mb-3" type="email" id="correo" name="correo" placeholder="jperez@company.com" required>
                </div>
                <div class="col">
                    <label for="telefono">Teléfono<span aria-label="required">*</span></label><br>
                    <input class="input-group mb-3" type="tel" id="telefono" name="telefono" placeholder="5512345678" minlength="10" pattern="[0-9]{10}" required>
                </div>
            </div>
            <fieldset>
                <!-- <legend>Dirección</legend> -->
                <div class="row">
                    <div class="col">
                        <label for="calle">Calle<span aria-label="required">*</span></label><br>
                        <input class="input-group mb-3" type="text" id="calle" name="calle" placeholder="José Antonio Alzate" required>
                    </div>

                    <div class="col">
                        <label for="num">Número<span aria-label="required">*</span></label><br>
                        <input class="input-group mb-3" type="number" id="num" name="num" placeholder="184" min="1" required>
                    </div>
                    <div class="col">
                        <label for="interior">Interior</label><br>
                        <input class="input-group mb-3" type="text" id="interior" name="interior" placeholder="9A">
                    </div>
                    <div class="col">
                        <label for="entidad">Entidad Federativa<span aria-label="required">*</span></label><br>
                        <select class="input-group mb-3" id="entidad" name="entidad" required>
                            <option value="ninguno">-- Seleccione uno --</option>
                            <option value="aguascalientes">Aguascalientes</option>
                            <option value="bajacalifornia">Baja California</option>
                            <option value="bajacaliforniasur">Baja California Sur</option>
                            <option value="campeche">Campeche</option>
                            <option value="chiapas">Chiapas</option>
                            <option value="chihuahua">Chihuahua</option>
                            <option value="cdmx">CDMX</option>
                            <option value="coahuila">Coahuila</option>
                            <option value="colima">Colima</option>
                            <option value="durango">Durango</option>
                            <option value="guanajuato">Guanajuato</option>
                            <option value="guerrero">Guerrero</option>
                            <option value="hidalgo">Hidalgo</option>
                            <option value="jalisco">Jalisco</option>
                            <option value="edomex">Estado de México</option>
                            <option value="michoacan">Michoacán</option>
                            <option value="morelos">Morelos</option>
                            <option value="nayarit">Nayarit</option>
                            <option value="nuevoleon">Nuevo León</option>
                            <option value="oaxaca">Oaxaca</option>
                            <option value="puebla">Puebla</option>
                            <option value="queretaro">Querétaro</option>
                            <option value="quintanaroo">Quintana Roo</option>
                            <option value="sanluispotosi">San Luis Potosí</option>
                            <option value="sinaloa">Sinaloa</option>
                            <option value="sonora">Sonora</option>
                            <option value="tabasco">Tabasco</option>
                            <option value="tamaulipas">Tamaulipas</option>
                            <option value="tlaxcala">Tlaxcala</option>
                            <option value="veracruz">Veracruz</option>
                            <option value="yucatan">Yucatán</option>
                            <option value="zacatecas">Zacatecas</option>
                        </select>
                    </div>
                </div>
                <div class="row line-bottom">
                    <div class="col">
                        <label for="colonia">Colonia<span aria-label="required">*</span></label><br>
                        <input class="input-group mb-3" type="text" id="colonia" name="colonia" placeholder="Santa María la Ribera" required>
                    </div>

                    <div class="col">
                        <label for="cp">CP<span aria-label="required">*</span></label><br>
                        <input class="input-group mb-3" type="number" id="cp" name="cp" placeholder="06400" required>
                    </div>

                    <div class="col">
                        <label for="municipio" id="municipiotxt" style="display: none;">Municipio<span aria-label="required">*</span></label>
                        <input class="input-group mb-3" type="text" id="municipio" name="municipio" placeholder="Mazapil" style="display: none;">
                        <label for="alcaldia" id="alcaldiatxt" style="display: none;">Alcaldía<span aria-label="required">*</span></label>
                        <select class="input-group mb-3" id="alcaldia" name="alcaldia" style="display: none;">
                            <option value="ninguno">-- Seleccione uno --</option>
                            <option value="alvaroobregon">Álvaro Obregón</option>
                            <option value="azcapotzalco">Azcapotzalco</option>
                            <option value="bj">Benito Juárez</option>
                            <option value="coyoacan">Coyoacán</option>
                            <option value="cuajimalpa">Cuajimalpa de Morelos</option>
                            <option value="cuauhtemoc">Cuauhtémoc</option>
                            <option value="madero">Gustavo A. Madero</option>
                            <option value="iztacalco">Iztacalco</option>
                            <option value="iztapalapa">Iztapalapa</option>
                            <option value="mcontreras">Magdalena Contreras</option>
                            <option value="hidalgo">Miguel Hidalgo</option>
                            <option value="malta">Milpa Alta</option>
                            <option value="tlahuac">Tláhuac</option>
                            <option value="tlalpan">Tlalpan</option>
                            <option value="carranza">Venustiano Carranza</option>
                            <option value="xochimilco">Xochimilco</option>
                        </select>
                    </div>
                </div>
            </fieldset>

            <div class="row">
                <div class="col">
                    <label for="lugar">Lugar<span aria-label="required">*</span></label><br>
                        <select class="input-group mb-3" id="lugar" name="lugar" required>
                            <option value="ninguno">-- Seleccione uno --</option>
                            <option value="salona">Salón A</option>
                            <option value="salonb">Salón B</option>
                            <option value="jardin">Jardín</option>
                    </select>
                </div>

                <div class="col">
                    <label for="fecha">Fecha del Evento<span aria-label="required">*</span></label><br>
                    <input class="input-group mb-3 input-date" type="date" id="fecha" name="fecha" onchange="onChangeFecha()" required>
                </div>

                <div class="col">
                    <label for="hora">Horario<span aria-label="required">*</span></label><br>
                        <select class="input-group mb-3" id="hora" name="hora" required>
                            <option value="ninguno">-- Seleccione uno --</option>
                    </select>
                </div>

                <div class="col">
                    <label for="numpersonas">Número de Personas<span aria-label="required">*</span></label><br>
                    <input class="input-group mb-3" type="number" id="numpersonas" min="75" max ="200" name="numpersonas" placeholder="100" required>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="tipo">Tipo de Evento<span aria-label="required">*</span></label><br>
                        <select class="input-group mb-3" id="tipo" name="tipo" required>
                            <option value="ninguno">-- Seleccione uno --</option>
                            <option value="bautizo">Bautizo</option>
                            <option value="comunion">Primera Comunión</option>
                            <option value="quince">XV años</option>
                            <option value="boda">Boda</option>
                            <option value="cumple">Cumpleaños</option>
                            <option value="otro">Otro</option>
                    </select>
                </div>

                <div class="col">
                    <label for="eventootro" id="eventootrotxt" style="display: none;">Evento<span aria-label="required">*</span></label>
                    <input class="input-group mb-3" type="text" id="eventootro" name="eventootro" placeholder="Graduación" style="display: none;">
                </div>

                <div class="col">
                    <label for="menu">Menú<span aria-label="required">*</span></label><br>
                        <select class="input-group mb-3" id="menu" name="menu" required>
                            <option value="ninguno">-- Seleccione uno --</option>
                            <option value="economico">Económico</option>
                            <option value="ejecutivo">Ejecutivo</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col text-center">
                    <input class="boton-submit mx-xxl-5" type="submit" value="Enviar">
                    <input class="boton-submit mx-xxl-5" type="reset" value="Limpiar">
                </div>
            </div>
        </form>
    </section>
    <div class="footer position-absolute fixed-bottom">
        <footer>
            <ul class="nav justify-content-center pb-3 ">
                <li class="nav-item"><span class="nav-link px-5 text-body-secondary">Contáctanos: 55 12345678</span></li>
                <li class="nav-item"><span class="nav-link px-5 text-body-secondary">Encuéntranos en <a class="instagram" href="#">@NoTenemosIG</a></span></li>
            </ul>
        </footer>
    </div>
<script src="../js/actualizacionDinamica.js"></script>

</body>
</html>";
?>