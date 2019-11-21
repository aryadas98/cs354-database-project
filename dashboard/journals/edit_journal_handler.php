<?php
require "../../enforcelogin.php";
require "../../dbconnect.php";

if (!isset($_POST["id"]))
    die("Journal id not mentioned.");

if (!isset($_POST["name"]))
    die("Journal name not mentioned.");

if (!isset($_POST["od"]))
    $_POST["od"] = "";

$sql = "UPDATE journals SET name='".$_POST["name"]."', other_details='".$_POST["od"]."' where jid='".$_POST["id"]."'";

for($i = 0; $i < 5; $i++) {
    if ($conn->query($sql) === TRUE) {
        $_SESSION["message"] = "Edit successful.";
        Header("Location: ../?page=viewjournals");
        die();
        break;
    }
}
$_SESSION["message"] = "Edit Failed";
$_SESSION["err"] = "true";
Header("Location: ../?page=viewjournals");

$conn->close();
?>