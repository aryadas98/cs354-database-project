<?php
require "../enforcelogin.php";

if (!isset($_GET["id"])) {
    echo "ID not set.";
    die();
}
?>

<h3>Delete Sponsor</h3>

<form action="projects/delete_sponsor_handler.php" method="post">
<input type="hidden" name="id" value="<?php echo $_GET["id"];?>">
<p><b>Note:</b> Before deleting a sponsor all corresponding projects must be deleted. Otherwise the operation will fail.</p>
<p><input type="submit" value="Delete"></p>
</form>
