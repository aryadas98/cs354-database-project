<?php
require "../enforcelogin.php";

if (!isset($_GET["id"])) {
    echo "ID not set.";
    die();
}
?>

<h3>Delete Journal Publication</h3>

<form action="journals/delete_jentry_handler.php" method="post">
<input type="hidden" name="id" value="<?php echo $_GET["id"];?>">
<p><b>Warning:</b> Confirm?</p>
<p><input type="submit" value="Delete"></p>
</form>
