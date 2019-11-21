<?php
require "../../enforcelogin.php";
require "../../dbconnect.php";

if (!isset($_POST["id"]))
    die("Faculty id not mentioned.");

if (!isset($_POST["name"]))
    die("Faculty name not mentioned.");

if (!isset($_POST["email"]))
    $_POST["email"] = "";

$sql = "UPDATE faculty SET name='".$_POST["name"]."', email='".$_POST["email"]."' where fid='".$_POST["id"]."'";

for($i = 0; $i < 5; $i++) {
    if ($conn->query($sql) === TRUE) {
        $_SESSION["message"] = "Edit successful.";
        Header("Location: ../?page=faculty");
        die();
        break;
    }
}
$_SESSION["message"] = "Edit Failed";
$_SESSION["err"] = "true";
Header("Location: ../?page=faculty");

$conn->close();
?>