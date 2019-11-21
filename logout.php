<?php

require "enforcelogin.php";

session_unset();
session_destroy();

session_start();
$_SESSION["indexmsg"] = "Logged out";
Header("Location: /");
?>