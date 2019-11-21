<?php
    require "../enforcelogin.php";
    require "../dbconnect.php";

    $centrysql = "SELECT DISTINCT conf_pubs.centryid,title,concat(conferences.name,\" \",location) as name,authors,volpp,date FROM conf_pubs LEFT JOIN conferences on conferences.cid = conf_pubs.cid LEFT JOIN conf_authors ON conf_authors.centryid = conf_pubs.centryid WHERE 1=1 ";
    
    if (!isset($_GET["id"])) $_GET["id"] = "-1";
    if (!isset($_GET["title"])) $_GET["title"] = "";
    if (!isset($_GET["confs"])) $_GET["confs"] = "-1";
    if (!isset($_GET["faculty"])) $_GET["faculty"] = "-1";
    if (!isset($_GET["year"])) $_GET["year"] = "-1";
    if (!isset($_GET["sort"])) $_GET["sort"] = "-1";
    if (!isset($_GET["desc"])) $_GET["desc"] = "off";

    $centrysql = $centrysql."AND LOWER(title) LIKE LOWER('%".$_GET["title"]."%') ";
    
    if ($_GET["id"] != "-1")
        $centrysql = $centrysql." AND conf_pubs.centryid = '".$_GET["id"]."' ";
    
    if ($_GET["confs"] != "-1")
        $centrysql = $centrysql."AND conf_pubs.cid = '".$_GET["confs"]."' ";
    
    if ($_GET["faculty"] != "-1")
        $centrysql = $centrysql."AND fid = '".$_GET["faculty"]."' ";
    
    if ($_GET["year"] != "-1")
        $centrysql = $centrysql."AND YEAR(date) = '".$_GET["year"]."' ";
    
    if ($_GET["sort"] == "-1") {
        $_GET["sort"] = "date DESC";
        $_GET["desc"] = "off";
    }

    $centrysql = $centrysql."ORDER BY ".$_GET["sort"]." ";

    if ($_GET["desc"] == "on")
        $centrysql = $centrysql."DESC ";
    

    $centries = $conn->prepare($centrysql);
    $centries->execute();
    $centries->store_result();

    $centries->bind_result($centryid, $title, $cid, $authors, $volpp, $date);

    $faculties = $conn->prepare("SELECT fid,name FROM faculty ORDER BY name");
    $faculties->execute();
    $faculties->store_result();

    $faculties->bind_result($ffid, $fname);

    $conferences = $conn->prepare("SELECT cid,concat(conferences.name,\" \",location) as name FROM conferences ORDER BY name");
    $conferences->execute();
    $conferences->store_result();

    $conferences->bind_result($cid, $cname);

    //echo $centrysql;
?>

    <form action="." method="get">
    <input type="hidden" name="page" value="conferences"/>
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
    <label>Conference: </label>
    <select name="confs" style="width: 200px">
        <option value="-1"></option>
            <?php
            while ($conferences->fetch()) {
                echo "<option value=\"".$cid."\"".($_GET["confs"]==$cid?" selected":"").">".$cname."</option>\n";
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
    centryid,title,name,authors,volpp,date
            <option value="-1"></option>
            <option value="centryid" <?php echo $_GET["sort"]=="centryid"?" selected":""; ?>>ID</option>
            <option value="title" <?php echo $_GET["sort"]=="title"?" selected":""; ?>>Title</option>
            <option value="name" <?php echo $_GET["sort"]=="name"?" selected":""; ?>>Conference</option>
            <option value="authors" <?php echo $_GET["sort"]=="authors"?" selected":""; ?>>Authors</option>
            <option value="volpp" <?php echo $_GET["sort"]=="volpp"?" selected":""; ?>>Volume Page</option>
            <option value="date" <?php echo $_GET["sort"]=="date"?" selected":""; ?>>Date</option>
    </select>
    <input type="checkbox" name="desc" <?php echo $_GET["desc"]=="on"?" checked":""; ?>/><label>Desc</label>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" value="Go!"/>
    &nbsp;
    <a href="?page=conferences"><button type="button">Reset</button></a>
    </p>
    </form>

    <p><?php echo $centries->num_rows." records"?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="?page=addcentry">Add Conference Publication</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="?page=viewconferences">View Conferences</a></p>

    <style>
        #results td,th {padding:8px 10px;}
    </style>
    <table id="results" style="margin-top:20px">
    <tr>
        <th></th>
        <th>ID</th>
        <th>Title</th>
        <th>Conference</th>
        <th>Authors</th>
        <th style="width:120px">Volume and Page</th>
        <th style="width:90px">Date</th>
    </tr>
    <?php
    while ($centries->fetch()) {
        echo "<tr><td> <a href=\"?page=editcentry&id=".$centryid."\">Edit</a> <a href=\"?page=deletecentry&id=".$centryid."\">Delete</a> ";
        echo "</td><td>".$centryid;
        echo "</td><td>".$title;
        echo "</td><td>".$cid;
        echo "</td><td>".$authors;
        echo "</td><td style=\"width:120px\">".$volpp;
        echo "</td><td style=\"width:90px\">".$date;
        echo "</td></tr>\n";
    }
    ?>
    </table>

<?php
    $centries->close();
    $conferences->close();
    $faculties->close();
    $conn->close();
?>