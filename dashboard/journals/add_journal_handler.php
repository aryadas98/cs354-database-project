<?php
require "../../enforcelogin.php";
require "../../dbconnect.php";

if (!isset($_POST["name"]))
    die("Journal name not mentioned.");

if (!isset($_POST["od"]))
    $_POST["od"] = "";

$sql = "INSERT INTO journals VALUES (right(rand(),5), '".$_POST["name"]."', '".$_POST["od"]."')";

for($i = 0; $i < 5; $i++) {
    if ($conn->query($sql) === TRUE) {
        $_SESSION["message"] = "New journal inserted.";
        Header("Location: ../?page=viewjournals");
        die();
        break;
    }
}
$_SESSION["message"] = "Insertion Failed";
$_SESSION["err"] = "true";
Header("Location: ../?page=viewjournals");

$conn->close();
?>