<?php
require "../enforcelogin.php";
require "../dbconnect.php";

$journals = $conn->prepare("SELECT jid,name FROM journals ORDER BY name");
$journals->execute();
$journals->store_result();

$journals->bind_result($jid, $jname);

$faculties = $conn->prepare("SELECT fid,name FROM faculty ORDER BY name");
$faculties->execute();
$faculties->store_result();

$faculties->bind_result($ffid, $fname);

?>

<h3>Add Journal Publication</h3>

<form action="journals/add_jentry_handler.php" method="post">
<p>Publication ID will be generated automatically.</p>
<p><label>Title: </label><input type="text" name="title"></p>
<p><label>Journal: </label>
    <select name="journal" style="width: 200px">
            <?php
            while ($journals->fetch()) {
                echo "<option value=\"".$jid."\">".$jname."</option>\n";
            }
            ?>
    </select>
    <label>&nbsp;&nbsp;&nbsp;<a href="?page=addjournal">Add Journal</a></label>
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
<p><label>Date: </label><input type="text" name="date"><label> Enter in yyyy-mm-dd format</label></p>
<p><label>Other details: </label><input type="text" name="od"></p>
<p><input type="submit" value="Add"></p>
</form>
