<?php
    require "../enforcelogin.php";
    require "../dbconnect.php";

    $faculties = $conn->prepare("SELECT fid,name FROM faculty ORDER BY name");
    $faculties->execute();
    $faculties->store_result();
    $faculties->bind_result($ffid, $fname);

    if (isset($_GET["faculty"])) {

    $jentrysql = "SELECT faculty.name, count(*) as count, GROUP_CONCAT(DISTINCT concat(\"<a href=\\\"?page=journals&id=\",a1.jentryid,\"\\\">\",a1.jentryid,\"</a>\") SEPARATOR \", \") as journals FROM journal_authors AS a1 INNER JOIN journal_authors AS a2 ON a1.jentryid = a2.jentryid AND a1.fid != a2.fid inner join faculty on faculty.fid = a2.fid where a1.fid = ".$_GET["faculty"]." group by a2.fid";

    $jentries = $conn->prepare($jentrysql);
    $jentries->execute();
    $jentries->store_result();

    $jentries->bind_result($jfname, $jcount, $jj);


    $centrysql = "SELECT faculty.name, count(*) as count, GROUP_CONCAT(DISTINCT concat(\"<a href=\\\"?page=conferences&id=\",a1.centryid,\"\\\">\",a1.centryid,\"</a>\") SEPARATOR \", \") as confs FROM conf_authors AS a1 INNER JOIN conf_authors AS a2 ON a1.centryid = a2.centryid AND a1.fid != a2.fid INNER JOIN faculty on faculty.fid = a2.fid WHERE a1.fid = ".$_GET["faculty"]." GROUP BY a2.fid";
    
    $centries = $conn->prepare($centrysql);
    $centries->execute();
    $centries->store_result();

    $centries->bind_result($cfname, $ccount, $cc);
    }
?>
    <form action = "." method="get">
    <p>
    <input type="hidden" name="page" value="collaboration"/>
    <label>Select faculty: </label>
    <select name="faculty">
        <option value="-1"></option>
        <?php
        while ($faculties->fetch()) {
            echo "<option value=\"".$ffid."\"".($_GET["faculty"]==$ffid?" selected":"").">".$fname."</option>\n";
        }
        ?>
    </select>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" value="Go!"/>
    &nbsp;
    <a href="?page=collaboration"><button type="button">Reset</button></a>
    </p>
    </form>

    <?php
        if (isset($_GET["faculty"])) {
    ?>
    <h2>Journal Collaborations</h2>
    <p><?php echo $jentries->num_rows." records"?></p>
    <style>
        #results td,th {padding:8px 10px;}
    </style>
    <table id="results" style="margin-top:20px">
    <tr>
        <th>Collaborator</th>
        <th>Count</th>
        <th>Journals</th>
    </tr>
    <?php
    while ($jentries->fetch()) {
        echo "<tr><td>".$jfname;
        echo "</td><td>".$jcount;
        echo "</td><td>".$jj;
        echo "</td></tr>\n";
    }
    ?>
    </table>

    <h2>Conference Collaborations</h2>
    <p><?php echo $centries->num_rows." records"?></p>
    <style>
        #results td,th {padding:8px 10px;}
    </style>
    <table id="results" style="margin-top:20px">
    <tr>
        <th>Collaborator</th>
        <th>Count</th>
        <th>Conferences</th>
    </tr>
    <?php
    while ($centries->fetch()) {
        echo "<tr><td>".$cfname;
        echo "</td><td>".$ccount;
        echo "</td><td>".$cc;
        echo "</td></tr>\n";
    }
    ?>
    </table>

<?php
    $jentries->close();
    $centries->close();
    $conn->close();
    }
?>