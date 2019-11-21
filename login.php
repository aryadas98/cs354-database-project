<?php

require "enforcelogout.php";

session_unset();
session_destroy();

session_start();

require "dbconnect.php";

if (!isset($_POST["user"]) || !isset($_POST["pass"])) {
    $_SESSION["indexmsg"] = "Login to access the page";
    $_SESSION["indexmsgerr"] = true;
    Header("Location: /");
    die();
}

$user = $_POST["user"];
$pass = md5($_POST["pass"]);

$sql = $conn->prepare("SELECT * FROM php_ui_users WHERE user=? AND pass=?");
$sql->bind_param('ss',$user,$pass);
$sql->execute();
$sql->store_result();

$num_rows = $sql->num_rows;
$sql->close();
$conn->close();

if ($num_rows == 1) {
    $_SESSION["loggedin"] = true;
    $_SESSION["user"] = $user;
    Header("Location: /dashboard/");
} else {
    $_SESSION["indexmsg"] = "Incorrect Credentials";
    $_SESSION["indexmsgerr"] = true;
    Header("Location: /");
}

die();

?>