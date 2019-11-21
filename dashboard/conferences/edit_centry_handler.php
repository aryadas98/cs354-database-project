<?php
require "../../enforcelogin.php";
require "../../dbconnect.php";

if (!isset($_POST["id"]))
    die("ID not mentioned.");

if (!isset($_POST["title"]))
    die("Publication title is not mentioned.");

if (!isset($_POST["authors"]))
    $_POST["authors"] = "";

if (!isset($_POST["volpp"]))
    $_POST["volpp"] = "";

if (!isset($_POST["od"]))
    $_POST["od"] = "";

for($i = 0; $i < 5; $i++) {
    
    $sql = "UPDATE conf_pubs SET title='".$_POST["title"]."', cid='".$_POST["conference"]."', authors='".$_POST["authors"]."', volpp='".$_POST["volpp"]."', accepted='0', other_details='".$_POST["od"]."' WHERE centryid='".$_POST["id"]."'";

    if ($conn->query($sql) === TRUE) {
        $facsql = "DELETE FROM conf_authors WHERE centryid='".$_POST["id"]."'";
        $conn->query($facsql);

        if (isset($_POST["faculty"])) {
            foreach($_POST["faculty"] as $fac) {
                $facsql = "INSERT INTO conf_authors VALUES ('".$_POST["id"]."','".$fac."')";
                $conn->query($facsql);
            }
        }

        $_SESSION["message"] = "Conference entry edited.";
        Header("Location: ../?page=conferences");
        die();
        break;
    }
}
$_SESSION["message"] = "Edit Failed";
$_SESSION["err"] = "true";
Header("Location: ../?page=conferences");

$conn->close();
?>