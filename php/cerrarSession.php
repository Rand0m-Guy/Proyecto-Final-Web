<?php
    if ( !($_GET['function']='add' && $_GET['id_pag'])){
        header("Location: ../index.html");
        exit;
    }
    session_start();
    session_destroy();
?>