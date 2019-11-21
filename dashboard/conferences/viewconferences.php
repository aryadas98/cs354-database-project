<?php
    require "../enforcelogin.php";
    require "../dbconnect.php";

    $jentrysql = "SELECT cid,name,location,date FROM conferences";

    $jentries = $conn->prepare($jentrysql);
    $jentries->execute();
    $jentries->store_result();

    $jentries->bind_result($cid, $name, $loc, $date);

?>

    <p><?php echo $jentries->num_rows." records"?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="?page=addconf">Add Conference</a></p>

    <style>
        #results td,th {padding:8px 10px;}
    </style>
    <table id="results" style="margin-top:20px">
    <tr>
        <th></th>
        <th>ID</th>
        <th>Name</th>
        <th>Location</th>
        <th>Date</th>
    </tr>
    <?php
    while ($jentries->fetch()) {
        echo "<tr><td> <a href=\"?page=editconf&id=".$cid."\">Edit</a> <a href=\"?page=deleteconf&id=".$cid."\">Delete</a> ";
        echo "</td><td>".$cid;
        echo "</td><td>".$name;
        echo "</td><td>".$loc;
        echo "</td><td>".$date;
        echo "</td></tr>\n";
    }
    ?>
    </table>

<?php
    $jentries->close();
    $conn->close();
?>