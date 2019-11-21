<?php
require "../../enforcelogin.php";
require "../../dbconnect.php";

if (!isset($_POST["name"]))
    die("Conference name not mentioned.");

if (!isset($_POST["date"]))
    die("Conference date is not set.");

if (!isset($_POST["location"]))
    $_POST["location"] = "";

if (!isset($_POST["od"]))
    $_POST["od"] = "";

$sql = "INSERT INTO conferences VALUES (right(rand(),5), '".$_POST["name"]."', '".$_POST["location"]."', '".$_POST["date"]."', '".$_POST["od"]."')";

for($i = 0; $i < 5; $i++) {
    if ($conn->query($sql) === TRUE) {
        $_SESSION["message"] = "New conference inserted.";
        Header("Location: ../?page=viewconferences");
        die();
        break;
    }
}
$_SESSION["message"] = "Insertion Failed";
$_SESSION["err"] = "true";
Header("Location: ../?page=viewconferences");

$conn->close();
?>