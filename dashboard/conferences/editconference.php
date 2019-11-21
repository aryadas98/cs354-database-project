<?php
require "../enforcelogin.php";
require "../dbconnect.php";

if (!isset($_GET["id"])) {
    echo "ID not set.";
    die();
}

$jentrysql = "SELECT * FROM conferences WHERE cid = ".$_GET["id"];

$jentries = $conn->prepare($jentrysql);
$jentries->execute();
$jentries->store_result();

$jentries->bind_result($cid, $name, $location, $date, $od);
$jentries->fetch();
?>

<h3>Edit Conference</h3>

<form action="conferences/edit_conference_handler.php" method="post">
<input type="hidden" name="id" value="<?php echo $cid;?>">
<p><label>ID: </label><input type="text" value="<?php echo $cid;?>" disabled></p>
<p><label>Name: </label><input type="text" name="name" value="<?php echo $name;?>"></p>
<p><label>Location: </label><input type="text" name="location" value="<?php echo $location;?>"></p>
<p><label>Date: </label><input type="text" name="date" value="<?php echo $date;?>"><label> Enter in yyyy-mm-dd format.</label></p>
<p><label>Other details: </label><input type="text" name="od" value="<?php echo $od;?>"></p>
<p><input type="submit" value="Submit"></p>
</form>
