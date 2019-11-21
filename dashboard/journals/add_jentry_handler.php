<?php
require "../../enforcelogin.php";
require "../../dbconnect.php";

if (!isset($_POST["title"]))
    die("Publication title is not mentioned.");

if (!isset($_POST["date"]))
    die("Publication date is not mentioned.");

if (!isset($_POST["authors"]))
    $_POST["authors"] = "";

if (!isset($_POST["volpp"]))
    $_POST["volpp"] = "";

if (!isset($_POST["od"]))
    $_POST["od"] = "";

for($i = 0; $i < 5; $i++) {
    $jentryid = mt_rand(1000,99999);
    
    $sql = "INSERT INTO journal_pubs VALUES ('".$jentryid."', '".$_POST["title"]."', '".$_POST["journal"]."', '".$_POST["authors"]."', '".$_POST["volpp"]."', '".$_POST["date"]."', '0', '".$_POST["od"]."')";

    if ($conn->query($sql) === TRUE) {
        if (isset($_POST["faculty"])) {
            foreach($_POST["faculty"] as $fac) {
                $facsql = "INSERT INTO journal_authors VALUES ('".$jentryid."','".$fac."')";
                $conn->query($facsql);
            }
        }

        $_SESSION["message"] = "New journal entry inserted.";
        Header("Location: ../?page=journals");
        die();
        break;
    }
}
$_SESSION["message"] = "Insertion Failed";
$_SESSION["err"] = "true";
Header("Location: ../?page=journals");

$conn->close();
?>