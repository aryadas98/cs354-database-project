<?php
require "../enforcelogin.php";
require "../dbconnect.php";

if (!isset($_GET["id"]))
    die("Project ID not mentioned.");

$sponsors = $conn->prepare("SELECT sid,name FROM sponsors ORDER BY name");
$sponsors->execute();
$sponsors->store_result();

$sponsors->bind_result($sid, $sname);

$faculties = $conn->prepare("SELECT fid,name FROM faculty ORDER BY name");
$faculties->execute();
$faculties->store_result();

$faculties->bind_result($ffid, $fname);

$pentrysql = "SELECT * FROM projects WHERE pid = ".$_GET["id"];

$pentries = $conn->prepare($pentrysql);
$pentries->execute();
$pentries->store_result();

$pentries->bind_result($pid,$title,$pi,$cost,$duration,$od,$status);
$pentries->fetch();

$pcopisql = "SELECT fid FROM project_co_pi WHERE pid = ".$_GET["id"];

$pcopis = $conn->prepare($pcopisql);
$pcopis->execute();
$pcopis->store_result();

$pcopis->bind_result($fid);

while($pcopis->fetch())
    $fids[] = $fid;

$psponssql = "SELECT sid FROM sponsored_by WHERE pid = ".$_GET["id"];

$pspons = $conn->prepare($psponssql);
$pspons->execute();
$pspons->store_result();

$pspons->bind_result($ssid);

while($pspons->fetch())
    $spons[] = $ssid;

?>

<h3>Edit Project</h3>

<form action="projects/edit_project_handler.php" method="post">
<input type="hidden" name="id" value=<?php echo $pid; ?>>
<p><label>ID: </label><input type="text" value=<?php echo $pid; ?> disabled></p>
<p><label>Title: </label><input type="text" name="title" value="<?php echo $title;?>"></p>
<p><label>Sponsors: </label>
    <select name="sponsors[]" style="width: 200px" multiple>
            <?php
            while ($sponsors->fetch()) {
                echo "<option value=\"".$sid."\"".(in_array($sid,$spons)?" selected":"").">".$sname."</option>\n";
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
            echo "<option value=\"".$ffid."\"".($ffid == $pi?" selected":"").">".$fname."</option>\n";
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
            echo "<option value=\"".$ffid."\"".(in_array($ffid,$fids)?" selected":"").">".$fname."</option>\n";
        }
        ?>
    </select>
    <label>&nbsp;&nbsp;&nbsp;Ctrl-click to select multiple</label>
    <label>&nbsp;&nbsp;&nbsp;<a href="?page=addfac">Add Faculty</a></label>
</p>
<p><label>Cost: </label><input type="text" name="cost" value="<?php echo $cost;?>"><label> in INR</label></p>
<p><label>Duration: </label><input type="text" name="duration" value="<?php echo $duration;?>"><label> in months</label></p>
<p><label>Other details: </label><input type="text" name="od" value="<?php echo $od;?>"></p>
<p><label>Status: </label><select name="status"><option value="0" <?php if ($status == 0) echo "selected";?>>On going</option><option value="1" <?php if ($status == 1) echo "selected";?>>Completed</option></select></p>
<p><input type="submit" value="Submit"></p>
</form>
