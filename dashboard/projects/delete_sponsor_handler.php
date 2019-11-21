<?php
require "../../enforcelogin.php";
require "../../dbconnect.php";

if (!isset($_POST["id"]))
    die("Sponsor id not mentioned.");

$sql = "DELETE FROM sponsors WHERE sid = '".$_POST["id"]."'";

for($i = 0; $i < 5; $i++) {
    if ($conn->query($sql) === TRUE) {
        $_SESSION["message"] = "Deletion successful.";
        Header("Location: ../?page=viewsponsors");
        die();
        break;
    }
}
$_SESSION["message"] = "Delete Failed";
$_SESSION["err"] = "true";
Header("Location: ../?page=viewsponsors");

$conn->close();
?>