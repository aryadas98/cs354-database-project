<?php
require "../enforcelogin.php";
require "../dbconnect.php";

if (!isset($_GET["id"])) {
    echo "ID not set.";
    die();
}

$jentrysql = "SELECT * FROM faculty WHERE fid = ".$_GET["id"];

$jentries = $conn->prepare($jentrysql);
$jentries->execute();
$jentries->store_result();

$jentries->bind_result($fid, $name, $email);
$jentries->fetch();
?>

<h3>Edit Faculty</h3>

<form action="faculty/edit_faculty_handler.php" method="post">
<input type="hidden" name="id" value="<?php echo $fid;?>">
<p><label>ID: </label><input type="text" value="<?php echo $fid;?>" disabled></p>
<p><label>Name: </label><input type="text" name="name" value="<?php echo $name;?>"></p>
<p><label>Email: </label><input type="text" name="email" value="<?php echo $email;?>"></p>
<p><input type="submit" value="Submit"></p>
</form>
