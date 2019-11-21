<?php
    require "../enforcelogin.php";
    require "../dbconnect.php";

    $jentrysql = "SELECT DISTINCT journal_pubs.jentryid,title,name,authors,volpp,date FROM journal_pubs LEFT JOIN journals on journal_pubs.jid = journals.jid LEFT JOIN journal_authors ON journal_pubs.jentryid = journal_authors.jentryid WHERE 1=1 ";
    
    if (!isset($_GET["id"])) $_GET["id"] = "-1";
    if (!isset($_GET["title"])) $_GET["title"] = "";
    if (!isset($_GET["journals"])) $_GET["journals"] = "-1";
    if (!isset($_GET["faculty"])) $_GET["faculty"] = "-1";
    if (!isset($_GET["year"])) $_GET["year"] = "-1";
    if (!isset($_GET["sort"])) $_GET["sort"] = "-1";
    if (!isset($_GET["desc"])) $_GET["desc"] = "off";

    $jentrysql = $jentrysql."AND LOWER(title) LIKE LOWER('%".$_GET["title"]."%') ";
    
    if ($_GET["id"] != "-1")
        $jentrysql = $jentrysql." AND journal_pubs.jentryid = '".$_GET["id"]."' ";

    if ($_GET["journals"] != "-1")
        $jentrysql = $jentrysql."AND journal_pubs.jid = '".$_GET["journals"]."' ";
    
    if ($_GET["faculty"] != "-1")
        $jentrysql = $jentrysql."AND fid = '".$_GET["faculty"]."' ";
    
    if ($_GET["year"] != "-1")
        $jentrysql = $jentrysql."AND YEAR(date) = '".$_GET["year"]."' ";
    
    if ($_GET["sort"] == "-1") {
        $_GET["sort"] = "date DESC";
        $_GET["desc"] = "off";
    }

    $jentrysql = $jentrysql."ORDER BY ".$_GET["sort"]." ";

    if ($_GET["desc"] == "on")
        $jentrysql = $jentrysql."DESC ";
    

    $jentries = $conn->prepare($jentrysql);
    $jentries->execute();
    $jentries->store_result();

    $jentries->bind_result($jentryid, $title, $jid, $authors, $volpp, $date);

    $faculties = $conn->prepare("SELECT fid,name FROM faculty ORDER BY name");
    $faculties->execute();
    $faculties->store_result();

    $faculties->bind_result($ffid, $fname);

    $journals = $conn->prepare("SELECT jid,name FROM journals ORDER BY name");
    $journals->execute();
    $journals->store_result();

    $journals->bind_result($jid, $jname);

    //echo $jentrysql;
?>

    <form action="." method="get">
    <input type="hidden" name="page" value="journals"/>
    <p>
    <label>Title: </label><input type="text" name="title" style="width: 260px" value = "<?php echo $_GET["title"];?>"/>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <label>Faculty: </label>
    <select name="faculty">
        <option value="-1"></option>
        <?php
        while ($faculties->fetch()) {
            echo "<option value=\"".$ffid."\"".($_GET["faculty"]==$ffid?" selected":"").">".$fname."</option>\n";
        }
        ?>
    </select>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <label>Journal: </label>
    <select name="journals" style="width: 200px">
        <option value="-1"></option>
            <?php
            while ($journals->fetch()) {
                echo "<option value=\"".$jid."\"".($_GET["journals"]==$jid?" selected":"").">".$jname."</option>\n";
            }
            ?>
    </select>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <label>Year: </label>
    <select name="year">
        <option value="-1"></option>
        <?php
            for($i = 2019; $i >= 1995; $i--)
                echo "<option value=\"".$i."\"".($_GET["year"]==$i?" selected":"").">".$i."</option>\n";
        ?>
    </select>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <label>Sort: </label>
    <select name="sort">
    jentryid,title,name,authors,volpp,date
            <option value="-1"></option>
            <option value="jentryid" <?php echo $_GET["sort"]=="jentryid"?" selected":""; ?>>ID</option>
            <option value="title" <?php echo $_GET["sort"]=="title"?" selected":""; ?>>Title</option>
            <option value="name" <?php echo $_GET["sort"]=="name"?" selected":""; ?>>Journal</option>
            <option value="authors" <?php echo $_GET["sort"]=="authors"?" selected":""; ?>>Authors</option>
            <option value="volpp" <?php echo $_GET["sort"]=="volpp"?" selected":""; ?>>Volume Page</option>
            <option value="date" <?php echo $_GET["sort"]=="date"?" selected":""; ?>>Date</option>
    </select>
    <input type="checkbox" name="desc" <?php echo $_GET["desc"]=="on"?" checked":""; ?>/><label>Desc</label>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" value="Go!"/>
    &nbsp;
    <a href="?page=journals"><button type="button">Reset</button></a>
    </p>
    </form>

    <p><?php echo $jentries->num_rows." records"?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="?page=addjentry">Add Journal Publication</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="?page=viewjournals">View Journals</a></p>

    <style>
        #results td,th {padding:8px 10px;}
    </style>
    <table id="results" style="margin-top:20px">
    <tr>
        <th></th>
        <th>ID</th>
        <th>Title</th>
        <th>Journal</th>
        <th>Authors</th>
        <th style="width:120px">Volume and Page</th>
        <th style="width:90px">Date</th>
    </tr>
    <?php
    while ($jentries->fetch()) {
        echo "<tr><td> <a href=\"?page=editjentry&id=".$jentryid."\">Edit</a> <a href=\"?page=deletejentry&id=".$jentryid."\">Delete</a> ";
        echo "</td><td>".$jentryid;
        echo "</td><td>".$title;
        echo "</td><td>".$jid;
        echo "</td><td>".$authors;
        echo "</td><td style=\"width:120px\">".$volpp;
        echo "</td><td style=\"width:90px\">".$date;
        echo "</td></tr>\n";
    }
    ?>
    </table>

<?php
    $jentries->close();
    $faculties->close();
    $journals->close();
    $conn->close();
?>