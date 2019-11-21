<?php
require "../../enforcelogin.php";
require "../../dbconnect.php";

if (!isset($_POST["name"]))
    die("Faculty name not mentioned.");

if (!isset($_POST["email"]))
    $_POST["email"] = "";

$sql = "INSERT INTO faculty VALUES (right(rand(),5), '".$_POST["name"]."', '".$_POST["email"]."')";

for($i = 0; $i < 5; $i++) {
    if ($conn->query($sql) === TRUE) {
        $_SESSION["message"] = "New faculty entry inserted.";
        Header("Location: ../?page=faculty");
        die();
        break;
    }
}
$_SESSION["message"] = "Insertion Failed";
$_SESSION["err"] = "true";
Header("Location: ../?page=faculty");

$conn->close();
?>