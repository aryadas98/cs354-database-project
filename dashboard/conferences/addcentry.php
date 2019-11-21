<?php
require "../enforcelogin.php";
require "../dbconnect.php";

$confs = $conn->prepare("SELECT cid,concat(name,', ',location,', ',date) as name FROM conferences ORDER BY name");
$confs->execute();
$confs->store_result();

$confs->bind_result($cid, $cname);

$faculties = $conn->prepare("SELECT fid,name FROM faculty ORDER BY name");
$faculties->execute();
$faculties->store_result();

$faculties->bind_result($ffid, $fname);

?>

<h3>Add Conference Publication</h3>

<form action="conferences/add_centry_handler.php" method="post">
<p>Publication ID will be generated automatically.</p>
<p><label>Title: </label><input type="text" name="title"></p>
<p><label>Conference: </label>
    <select name="conference" style="width: 200px">
            <?php
            while ($confs->fetch()) {
                echo "<option value=\"".$cid."\">".$cname."</option>\n";
            }
            ?>
    </select>
    <label>&nbsp;&nbsp;&nbsp;<a href="?page=addconf">Add Conference</a></label>
</p>
<p><label>Authors: </label><input type="text" name="authors"><label> Will be used for display purposes</label></p>
<p><label>Faculty authors: </label>
    <select name="faculty[]" multiple>
        <?php
        while ($faculties->fetch()) {
            echo "<option value=\"".$ffid."\">".$fname."</option>\n";
        }
        ?>
    </select>
    <label>&nbsp;&nbsp;&nbsp;Ctrl-click to select multiple</label>
    <label>&nbsp;&nbsp;&nbsp;<a href="?page=addfac">Add Faculty</a></label>
</p>
<p><label>Volume/Page: </label><input type="text" name="volpp"></p>
<p><label>Other details: </label><input type="text" name="od"></p>
<p><input type="submit" value="Add"></p>
</form>
