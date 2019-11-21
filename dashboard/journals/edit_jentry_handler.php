<?php
require "../../enforcelogin.php";
require "../../dbconnect.php";

if (!isset($_POST["id"]))
    die("ID not mentioned.");

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
    
    $sql = "UPDATE journal_pubs SET title='".$_POST["title"]."', jid='".$_POST["journal"]."', authors='".$_POST["authors"]."', volpp='".$_POST["volpp"]."', date='".$_POST["date"]."', accepted='0', other_details='".$_POST["od"]."' WHERE jentryid='".$_POST["id"]."'";

    if ($conn->query($sql) === TRUE) {
        $facsql = "DELETE FROM journal_authors WHERE jentryid='".$_POST["id"]."'";
        $conn->query($facsql);

        if (isset($_POST["faculty"])) {
            foreach($_POST["faculty"] as $fac) {
                $facsql = "INSERT INTO journal_authors VALUES ('".$_POST["id"]."','".$fac."')";
                $conn->query($facsql);
            }
        }

        $_SESSION["message"] = "Journal entry edited.";
        Header("Location: ../?page=journals");
        die();
        break;
    }
}
$_SESSION["message"] = "Edit Failed";
$_SESSION["err"] = "true";
Header("Location: ../?page=journals");

$conn->close();
?>