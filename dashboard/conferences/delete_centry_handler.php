<?php
require "../../enforcelogin.php";
require "../../dbconnect.php";

if (!isset($_POST["id"]))
    die("Conference publication id not mentioned.");

$sql = "DELETE FROM conf_authors WHERE centryid = '".$_POST["id"]."'";

for($i = 0; $i < 5; $i++) {
    if ($conn->query($sql) === TRUE) {
        $sql = "DELETE FROM conf_pubs WHERE centryid = '".$_POST["id"]."'";
        $conn->query($sql);
        $_SESSION["message"] = "Deletion successful.";
        Header("Location: ../?page=conferences");
        die();
        break;
    }
}
$_SESSION["message"] = "Delete Failed";
$_SESSION["err"] = "true";
Header("Location: ../?page=conferences");

$conn->close();
?>