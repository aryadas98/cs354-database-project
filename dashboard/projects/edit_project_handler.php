<?php
require "../../enforcelogin.php";
require "../../dbconnect.php";

if (!isset($_POST["id"]))
    die("ID not mentioned.");

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
    
    $sql = "UPDATE projects SET title='".$_POST["title"]."', pi=".$_POST["pi"].", cost=".$_POST["cost"].", duration=".$_POST["duration"].", other_details='".$_POST["od"]."', completed='".$_POST["status"]."' WHERE pid='".$_POST["id"]."'";

    if ($conn->query($sql) === TRUE) {
        $facsql = "DELETE FROM sponsored_by WHERE pid='".$_POST["id"]."'";
        $conn->query($facsql);
        $facsql = "DELETE FROM project_co_pi WHERE pid='".$_POST["id"]."'";
        $conn->query($facsql);

        if (isset($_POST["sponsors"])) {
            foreach($_POST["sponsors"] as $spons) {
                $facsql = "INSERT INTO sponsored_by VALUES ('".$_POST["id"]."','".$spons."')";
                $conn->query($facsql);
            }
        }

        if (isset($_POST["copis"])) {
            foreach($_POST["copis"] as $fac) {
                echo $fac." ";
                $facsql = "INSERT INTO project_co_pi VALUES ('".$_POST["id"]."','".$fac."')";
                $conn->query($facsql);
            }
        }

        $_SESSION["message"] = "Project entry edited.";
        Header("Location: ../?page=projects");
        die();
        break;
    }
}
$_SESSION["message"] = "Edit Failed";
$_SESSION["err"] = "true";
Header("Location: ../?page=projects");

$conn->close();
?>