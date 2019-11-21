<?php
require "../../enforcelogin.php";
require "../../dbconnect.php";

if (!isset($_POST["title"]))
    die("Project title is not mentioned.");

if (!isset($_POST["cost"]) || $_POST["cost"] == "")
    $_POST["cost"] = "NULL";

if (!isset($_POST["duration"]) || $_POST["duration"] == "")
    $_POST["duration"] = "NULL";

if (!isset($_POST["od"]))
    $_POST["od"] = "";

if (!isset($_POST["status"]))
    $_POST["status"] = "0";

for($i = 0; $i < 5; $i++) {
    $pid = mt_rand(1000,99999);
    
    $sql = "INSERT INTO projects VALUES ('".$pid."', '".$_POST["title"]."', ".$_POST["pi"].", ".$_POST["cost"].", ".$_POST["duration"].", '".$_POST["od"]."', '".$_POST["status"]."')";

    if ($conn->query($sql) === TRUE) {
        if (isset($_POST["sponsors"])) {
            foreach($_POST["sponsors"] as $spons) {
                $facsql = "INSERT INTO sponsored_by VALUES ('".$pid."','".$spons."')";
                $conn->query($facsql);
            }
        }

        if (isset($_POST["copis"])) {
            foreach($_POST["copis"] as $fac) {
                $facsql = "INSERT INTO project_co_pi VALUES ('".$pid."','".$fac."')";
                $conn->query($facsql);
            }
        }

        $_SESSION["message"] = "New Project inserted.";
        Header("Location: ../?page=projects");
        die();
        break;
    }
}
$_SESSION["message"] = "Insertion Failed";
$_SESSION["err"] = "true";
Header("Location: ../?page=projects");

$conn->close();
?>