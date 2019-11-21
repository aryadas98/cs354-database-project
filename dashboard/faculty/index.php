<?php
    require "../enforcelogin.php";
    require "../dbconnect.php";

    $jentrysql = "SELECT * FROM faculty";

    $jentries = $conn->prepare($jentrysql);
    $jentries->execute();
    $jentries->store_result();

    $jentries->bind_result($fid, $name, $email);

?>

    <p><?php echo $jentries->num_rows." records"?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="?page=addfac">Add Faculty</a></p>

    <style>
        #results td,th {padding:8px 10px;}
    </style>
    <table id="results" style="margin-top:20px">
    <tr>
        <th></th>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
    </tr>
    <?php
    while ($jentries->fetch()) {
        echo "<tr><td> <a href=\"?page=editfac&id=".$fid."\">Edit</a> <a href=\"?page=deletefac&id=".$fid."\">Delete</a> ";
        echo "</td><td>".$fid;
        echo "</td><td>".$name;
        echo "</td><td>".$email;
        echo "</td></tr>\n";
    }
    ?>
    </table>

<?php
    $jentries->close();
    $conn->close();
?>