<?php
    require "../enforcelogin.php";
    require "../dbconnect.php";

    $jentrysql = "SELECT jid,name FROM journals";

    $jentries = $conn->prepare($jentrysql);
    $jentries->execute();
    $jentries->store_result();

    $jentries->bind_result($jid, $name);

?>

    <p><?php echo $jentries->num_rows." records"?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="?page=addjournal">Add Journal</a></p>

    <style>
        #results td,th {padding:8px 10px;}
    </style>
    <table id="results" style="margin-top:20px">
    <tr>
        <th></th>
        <th>ID</th>
        <th>Name</th>
    </tr>
    <?php
    while ($jentries->fetch()) {
        echo "<tr><td> <a href=\"?page=editjournal&id=".$jid."\">Edit</a> <a href=\"?page=deletejournal&id=".$jid."\">Delete</a> ";
        echo "</td><td>".$jid;
        echo "</td><td>".$name;
        echo "</td></tr>\n";
    }
    ?>
    </table>

<?php
    $jentries->close();
    $conn->close();
?>