<?php
session_start();

if (!isset($_SESSION['usr_name'])) {
    header("Location: index.php");
}

    session_destroy();
    unset($_SESSION['userSession']);
    header("Location: signin.php");
?>