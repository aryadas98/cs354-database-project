<?php
require "../enforcelogin.php";
require "../dbconnect.php";

if (!isset($_GET["id"])) {
    echo "ID not set.";
    die();
}

$journals = $conn->prepare("SELECT jid,name FROM journals ORDER BY name");
$journals->execute();
$journals->store_result();

$journals->bind_result($jjid, $jname);

$faculties = $conn->prepare("SELECT fid,name FROM faculty ORDER BY name");
$faculties->execute();
$faculties->store_result();

$faculties->bind_result($ffid, $fname);

$jentrysql = "SELECT * FROM journal_pubs WHERE jentryid = ".$_GET["id"];

$jentries = $conn->prepare($jentrysql);
$jentries->execute();
$jentries->store_result();

$jentries->bind_result($jentryid,$title,$jid,$authors,$volpp,$date,$acc,$od);
$jentries->fetch();

$jauthorssql = "SELECT fid FROM journal_authors WHERE jentryid = ".$_GET["id"];

$jauthors = $conn->prepare($jauthorssql);
$jauthors->execute();
$jauthors->store_result();

$jauthors->bind_result($fid);

while($jauthors->fetch())
    $fids[] = $fid;

?>

<h3>Edit Journal Publication</h3>

<form action="journals/edit_jentry_handler.php" method="post">
<input type="hidden" name="id" value="<?php echo $jentryid;?>">
<p><label>ID: </label><input type="text" value="<?php echo $jentryid;?>" disabled></p>
<p><label>Title: </label><input type="text" name="title" value="<?php echo $title;?>"></p>
<p><label>Journal: </label>
    <select name="journal" style="width: 200px">
            <?php
            while ($journals->fetch()) {
                echo "<option value=\"".$jjid."\"".($jid==$jjid?" selected":"").">".$jname."</option>\n";
            }
            ?>
    </select>
    <label>&nbsp;&nbsp;&nbsp;<a href="?page=addjournal">Add Journal</a></label>
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
<p><label>Date: </label><input type="text" name="date" value="<?php echo $date;?>"><label> Enter in yyyy-mm-dd format</label></p>
<p><label>Other details: </label><input type="text" name="od" value="<?php echo $od;?>"></p>
<p><input type="submit" value="Submit"></p>
</form>
