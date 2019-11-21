<?php
require "../enforcelogin.php";
require "../dbconnect.php";

if (!isset($_GET["id"])) {
    echo "ID not set.";
    die();
}

$jentrysql = "SELECT * FROM journals WHERE jid = ".$_GET["id"];

$jentries = $conn->prepare($jentrysql);
$jentries->execute();
$jentries->store_result();

$jentries->bind_result($jid, $name, $od);
$jentries->fetch();
?>

<h3>Edit Journal</h3>

<form action="journals/edit_journal_handler.php" method="post">
<input type="hidden" name="id" value="<?php echo $jid;?>">
<p><label>ID: </label><input type="text" value="<?php echo $jid;?>" disabled></p>
<p><label>Name: </label><input type="text" name="name" value="<?php echo $name;?>"></p>
<p><label>Other details: </label><input type="text" name="od" value="<?php echo $od;?>"></p>
<p><input type="submit" value="Submit"></p>
</form>
