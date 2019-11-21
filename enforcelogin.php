<?php
if (!isset($_SESSION))
    session_start();
if (!isset($_SESSION["loggedin"])) {
    $_SESSION["indexmsg"] = "Login to access the page";
    $_SESSION["indexmsgerr"] = true;
    Header("Location: /");
    die();
}
?>