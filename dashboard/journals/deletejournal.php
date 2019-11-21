<?php
require "../enforcelogin.php";

if (!isset($_GET["id"])) {
    echo "ID not set.";
    die();
}
?>

<h3>Delete Journal</h3>

<form action="journals/delete_journal_handler.php" method="post">
<input type="hidden" name="id" value="<?php echo $_GET["id"];?>">
<p><b>Note:</b> Before deleting a journal all corresponding journal publications must be deleted. Otherwise the operation will fail.</p>
<p><input type="submit" value="Delete"></p>
</form>
