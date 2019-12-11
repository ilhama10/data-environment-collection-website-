<?php
    session_start();
    if (isset($_SESSION["username"])) {
        header('location: index.php?lokasi='.$_SESSION["id_lokasi"]);
    }
    /*
    $helper = array_keys($_SESSION);
    foreach ($helper as $key) {
        unset($_SESSION[$key]);
    }
    */
    session_destroy();
header('location: index.php');
?>