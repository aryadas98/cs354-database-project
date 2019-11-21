<?php
require "../enforcelogin.php";
require "../dbconnect.php";

$sponsors = $conn->prepare("SELECT sid,name FROM sponsors ORDER BY name");
$sponsors->execute();
$sponsors->store_result();

$sponsors->bind_result($sid, $sname);

$faculties = $conn->prepare("SELECT fid,name FROM faculty ORDER BY name");
$faculties->execute();
$faculties->store_result();

$faculties->bind_result($ffid, $fname);

?>

<h3>Add Project</h3>

<form action="projects/add_project_handler.php" method="post">
<p>Project ID will be generated automatically.</p>
<p><label>Title: </label><input type="text" name="title"></p>
<p><label>Sponsors: </label>
    <select name="sponsors[]" style="width: 200px" multiple>
            <?php
            while ($sponsors->fetch()) {
                echo "<option value=\"".$sid."\">".$sname."</option>\n";
            }
            ?>
    </select>
    <label>&nbsp;&nbsp;&nbsp;Ctrl-click to select multiple</label>
    <label>&nbsp;&nbsp;&nbsp;<a href="?page=addspons">Add Sponsor</a></label>
</p>
<p><label>Principal Investigator: </label>
    <select name="pi">
        <option value="NULL"></option>
        <?php
        while ($faculties->fetch()) {
            echo "<option value=\"".$ffid."\">".$fname."</option>\n";
        }
        ?>
    </select>
    <label>&nbsp;&nbsp;&nbsp;<a href="?page=addfac">Add Faculty</a></label>
</p>

<?php $faculties->data_seek(0); ?>

<p><label>Co-Principal Investigator: </label>
    <select name="copis[]" multiple>
        <?php
        while ($faculties->fetch()) {
            echo "<option value=\"".$ffid."\">".$fname."</option>\n";
        }
        ?>
    </select>
    <label>&nbsp;&nbsp;&nbsp;Ctrl-click to select multiple</label>
    <label>&nbsp;&nbsp;&nbsp;<a href="?page=addfac">Add Faculty</a></label>
</p>
<p><label>Cost: </label><input type="text" name="cost"><label> in INR</label></p>
<p><label>Duration: </label><input type="text" name="duration"><label> in months</label></p>
<p><label>Other details: </label><input type="text" name="od"></p>
<p><label>Status: </label><select name="status"><option value="0">On going</option><option value="1">Completed</option></select></p>
<p><input type="submit" value="Add"></p>
</form>
