<?php
require "../enforcelogin.php";
require "../dbconnect.php";

if (!isset($_GET["id"])) {
    echo "ID not set.";
    die();
}

$conferences = $conn->prepare("SELECT cid,concat(name,', ',location,', ',date) as name FROM conferences ORDER BY name");
$conferences->execute();
$conferences->store_result();

$conferences->bind_result($ccid, $cname);

$faculties = $conn->prepare("SELECT fid,name FROM faculty ORDER BY name");
$faculties->execute();
$faculties->store_result();

$faculties->bind_result($ffid, $fname);

$centrysql = "SELECT * FROM conf_pubs WHERE centryid = ".$_GET["id"];

$centries = $conn->prepare($centrysql);
$centries->execute();
$centries->store_result();

$centries->bind_result($centryid,$title,$cid,$authors,$volpp,$acc,$od);
$centries->fetch();

$cauthorssql = "SELECT fid FROM conf_authors WHERE centryid = ".$_GET["id"];

$cauthors = $conn->prepare($cauthorssql);
$cauthors->execute();
$cauthors->store_result();

$cauthors->bind_result($fid);

while($cauthors->fetch())
    $fids[] = $fid;

?>

<h3>Edit Conference Publication</h3>

<form action="conferences/edit_centry_handler.php" method="post">
<input type="hidden" name="id" value="<?php echo $centryid;?>">
<p><label>ID: </label><input type="text" value="<?php echo $centryid;?>" disabled></p>
<p><label>Title: </label><input type="text" name="title" value="<?php echo $title;?>"></p>
<p><label>Conference: </label>
    <select name="conference" style="width: 200px">
            <?php
            while ($conferences->fetch()) {
                echo "<option value=\"".$ccid."\"".($cid==$ccid?" selected":"").">".$cname."</option>\n";
            }
            ?>
    </select>
    <label>&nbsp;&nbsp;&nbsp;<a href="?page=addconf">Add Conference</a></label>
</p>
<p><label>Authors: </label><input type="text" name="authors" value="<?php echo $authors;?>"><label> Will be used for display purposes</label></p>
<p><label>Faculty authors: </label>
    <select name="faculty[]" multiple>
        <?php
        while ($faculties->fetch()) {
            echo "<option value=\"".$ffid."\"".(in_array($ffid,$fids)?" selected":"").">".$fname."</option>\n";
        }
        ?>
    </select>
    <label>&nbsp;&nbsp;&nbsp;Ctrl-click to select multiple</label>
    <label>&nbsp;&nbsp;&nbsp;<a href="?page=addfac">Add Faculty</a></label>
</p>
<p><label>Volume/Page: </label><input type="text" name="volpp" value="<?php echo $volpp;?>"></p>
<p><label>Other details: </label><input type="text" name="od" value="<?php echo $od;?>"></p>
<p><input type="submit" value="Submit"></p>
</form>
