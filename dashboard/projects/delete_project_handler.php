<?php
require "../../enforcelogin.php";
require "../../dbconnect.php";

if (!isset($_POST["id"]))
    die("Project id not mentioned.");

$sql = "DELETE FROM project_co_pi WHERE pid = '".$_POST["id"]."'";

for($i = 0; $i < 5; $i++) {
    if ($conn->query($sql) === TRUE) {
        $sql = "DELETE FROM sponsored_by WHERE pid = '".$_POST["id"]."'";
        $conn->query($sql);

        $sql = "DELETE FROM projects WHERE pid = '".$_POST["id"]."'";
        $conn->query($sql);

        $_SESSION["message"] = "Deletion successful.";
        Header("Location: ../?page=projects");
        die();
        break;
    }
}
$_SESSION["message"] = "Delete Failed";
$_SESSION["err"] = "true";
Header("Location: ../?page=projects");

$conn->close();
?>