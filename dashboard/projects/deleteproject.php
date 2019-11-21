<?php
require "../enforcelogin.php";

if (!isset($_GET["id"])) {
    echo "ID not set.";
    die();
}
?>

<h3>Delete Project</h3>

<form action="projects/delete_project_handler.php" method="post">
<input type="hidden" name="id" value="<?php echo $_GET["id"];?>">
<p><b>Warning:</b> Confirm?</p>
<p><input type="submit" value="Delete"></p>
</form>
