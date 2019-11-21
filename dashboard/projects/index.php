<?php
    require "../enforcelogin.php";
    require "../dbconnect.php";

    $jentrysql = "SELECT projects.pid, projects.title, fpi.name as pi, GROUP_CONCAT(DISTINCT fcopi.name SEPARATOR \", \") as copi, GROUP_CONCAT(DISTINCT sponsors.name SEPARATOR \", \") as spons, cost, duration, if (completed=1,\"Completed\",\"On going\") as status FROM projects LEFT JOIN project_co_pi on project_co_pi.pid = projects.pid LEFT JOIN faculty as fpi on projects.pi = fpi.fid LEFT JOIN faculty as fcopi on project_co_pi.fid = fcopi.fid LEFT JOIN sponsored_by on sponsored_by.pid = projects.pid LEFT JOIN sponsors on sponsored_by.sid = sponsors.sid WHERE 1=1 GROUP BY projects.pid";

    $jentries = $conn->prepare($jentrysql);
    $jentries->execute();
    $jentries->store_result();

    $jentries->bind_result($pid, $title, $pi, $copi, $spons, $cost, $duration, $status);

?>

    <p><?php echo $jentries->num_rows." records"?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="?page=addproject">Add Project</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="?page=viewsponsors">View Sponsors</a></p>

    <style>
        #results td,th {padding:8px 10px;}
    </style>
    <table id="results" style="margin-top:20px">
    <tr>
        <th></th>
        <th>ID</th>
        <th>Title</th>
        <th>Principal Investigator</th>
        <th>Co-Principal Investigator</th>
        <th>Sponsors</th>
        <th>Cost (INR)</th>
        <th>Duration (months)</th>
        <th>Status</th>
    </tr>
    <?php
    while ($jentries->fetch()) {
        echo "<tr><td> <a href=\"?page=editproject&id=".$pid."\">Edit</a> <a href=\"?page=deleteproject&id=".$pid."\">Delete</a> ";
        echo "</td><td>".$pid;
        echo "</td><td>".$title;
        echo "</td><td>".$pi;
        echo "</td><td>".$copi;
        echo "</td><td>".$spons;
        echo "</td><td>".$cost;
        echo "</td><td>".$duration;
        echo "</td><td>".$status;
        echo "</td></tr>\n";
    }
    ?>
    </table>

<?php
    $jentries->close();
    $conn->close();
?>