<?php
require "../../enforcelogin.php";
require "../../dbconnect.php";

if (!isset($_POST["id"]))
    die("Sponsor id not mentioned.");

if (!isset($_POST["name"]))
    die("Sponsor name not mentioned.");

$sql = "UPDATE sponsors SET name='".$_POST["name"]."' where sid='".$_POST["id"]."'";

for($i = 0; $i < 5; $i++) {
    if ($conn->query($sql) === TRUE) {
        $_SESSION["message"] = "Edit successful.";
        Header("Location: ../?page=viewsponsors");
        die();
        break;
    }
}
$_SESSION["message"] = "Edit Failed";
$_SESSION["err"] = "true";
Header("Location: ../?page=viewsponsors");

$conn->close();
?>