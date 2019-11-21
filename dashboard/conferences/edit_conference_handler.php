<?php
require "../../enforcelogin.php";
require "../../dbconnect.php";

if (!isset($_POST["id"]))
    die("Conference id not mentioned.");

if (!isset($_POST["name"]))
    die("Conference name not mentioned.");

if (!isset($_POST["date"]))
    die("Conference date is not mentioned.");

if (!isset($_POST["location"]))
    $_POST["location"] = "";

if (!isset($_POST["od"]))
    $_POST["od"] = "";

$sql = "UPDATE conferences SET name='".$_POST["name"]."', location='".$_POST["location"]."', date='".$_POST["date"]."', other_details='".$_POST["od"]."' where cid='".$_POST["id"]."'";

for($i = 0; $i < 5; $i++) {
    if ($conn->query($sql) === TRUE) {
        $_SESSION["message"] = "Edit successful.";
        Header("Location: ../?page=viewconferences");
        die();
        break;
    }
}
$_SESSION["message"] = "Edit Failed";
$_SESSION["err"] = "true";
Header("Location: ../?page=viewconferences");

$conn->close();
?>