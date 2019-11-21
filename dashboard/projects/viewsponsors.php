<?php
    require "../enforcelogin.php";
    require "../dbconnect.php";

    $jentrysql = "SELECT sid,name FROM sponsors";

    $jentries = $conn->prepare($jentrysql);
    $jentries->execute();
    $jentries->store_result();

    $jentries->bind_result($jid, $name);

?>

    <p><?php echo $jentries->num_rows." records"?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="?page=addspons">Add Sponsor</a></p>

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
        echo "<tr><td> <a href=\"?page=editspons&id=".$jid."\">Edit</a> <a href=\"?page=deletespons&id=".$jid."\">Delete</a> ";
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