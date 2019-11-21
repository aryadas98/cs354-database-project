<?php
require "../../enforcelogin.php";
require "../../dbconnect.php";

if (!isset($_POST["title"]))
    die("Publication title is not mentioned.");

if (!isset($_POST["authors"]))
    $_POST["authors"] = "";

if (!isset($_POST["volpp"]))
    $_POST["volpp"] = "";

if (!isset($_POST["od"]))
    $_POST["od"] = "";

for($i = 0; $i < 5; $i++) {
    $centryid = mt_rand(1000,99999);
    
    $sql = "INSERT INTO conf_pubs VALUES ('".$centryid."', '".$_POST["title"]."', '".$_POST["conference"]."', '".$_POST["authors"]."', '".$_POST["volpp"]."', '0', '".$_POST["od"]."')";

    if ($conn->query($sql) === TRUE) {
        if (isset($_POST["faculty"])) {
            foreach($_POST["faculty"] as $fac) {
                $facsql = "INSERT INTO conf_authors VALUES ('".$centryid."','".$fac."')";
                $conn->query($facsql);
            }
        }

        $_SESSION["message"] = "New conference entry inserted.";
        Header("Location: ../?page=conferences");
        die();
        break;
    }
}
$_SESSION["message"] = "Insertion Failed";
$_SESSION["err"] = "true";
Header("Location: ../?page=conferences");

$conn->close();
?>