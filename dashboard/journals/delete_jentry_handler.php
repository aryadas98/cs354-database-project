<?php
require "../../enforcelogin.php";
require "../../dbconnect.php";

if (!isset($_POST["id"]))
    die("Journal publication id not mentioned.");

$sql = "DELETE FROM journal_authors WHERE jentryid = '".$_POST["id"]."'";

for($i = 0; $i < 5; $i++) {
    if ($conn->query($sql) === TRUE) {
        $sql = "DELETE FROM journal_pubs WHERE jentryid = '".$_POST["id"]."'";
        $conn->query($sql);
        $_SESSION["message"] = "Deletion successful.";
        Header("Location: ../?page=journals");
        die();
        break;
    }
}
$_SESSION["message"] = "Delete Failed";
$_SESSION["err"] = "true";
Header("Location: ../?page=journals");

$conn->close();
?>