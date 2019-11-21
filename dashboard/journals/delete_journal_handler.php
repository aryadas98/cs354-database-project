<?php
require "../../enforcelogin.php";
require "../../dbconnect.php";

if (!isset($_POST["id"]))
    die("Journal id not mentioned.");

$sql = "DELETE FROM journals WHERE jid = '".$_POST["id"]."'";

for($i = 0; $i < 5; $i++) {
    if ($conn->query($sql) === TRUE) {
        $_SESSION["message"] = "Deletion successful.";
        Header("Location: ../?page=viewjournals");
        die();
        break;
    }
}
$_SESSION["message"] = "Delete Failed";
$_SESSION["err"] = "true";
Header("Location: ../?page=viewjournals");

$conn->close();
?>