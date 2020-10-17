<?php
    Session_start();
    Session_destroy();
    header('Location: /view/home/home.php');
?>