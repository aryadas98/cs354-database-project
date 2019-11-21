<?php
require "../../enforcelogin.php";
require "../../dbconnect.php";

if (!isset($_POST["name"]))
    die("Sponsor name not mentioned.");

$sql = "INSERT INTO sponsors VALUES (right(rand(),5), '".$_POST["name"]."')";

for($i = 0; $i < 5; $i++) {
    if ($conn->query($sql) === TRUE) {
        $_SESSION["message"] = "New sponsor inserted.";
        Header("Location: ../?page=viewsponsors");
        die();
        break;
    }
}
$_SESSION["message"] = "Insertion Failed";
$_SESSION["err"] = "true";
Header("Location: ../?page=viewsponsors");

$conn->close();
?>