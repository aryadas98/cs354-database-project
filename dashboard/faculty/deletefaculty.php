<?php
require "../enforcelogin.php";

if (!isset($_GET["id"])) {
    echo "ID not set.";
    die();
}
?>

<h3>Delete Faculty</h3>

<form action="faculty/delete_faculty_handler.php" method="post">
<input type="hidden" name="id" value="<?php echo $_GET["id"];?>">
<p><b>Note:</b> Before deleting a faculty entry all corresponding journal and conference publications and projects must be deleted. Otherwise the operation will fail.</p>
<p><input type="submit" value="Delete"></p>
</form>
