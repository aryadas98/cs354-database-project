<?php
require "../enforcelogin.php";
?>

<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <main style="max-width:1350px; margin:0 auto;">
        <div style="height:5vh"></div>
        <div style="display:flex"><span style="font-size:2rem;"><a href="." style="color:black; text-decoration:none">Dashboard</a></span>
        <div style="flex-grow:1"></div><span style="margin-top:1rem;">Welcome <?php echo $_SESSION["user"];?>!&nbsp;&nbsp;&nbsp;&nbsp;<a href="/logout.php">Logout</a></span></div>
        <p <?php if (isset($_SESSION["err"])) echo "style=\"color:red\""; else echo "style=\"color:green\""; ?>><?php if (isset($_SESSION["message"])) echo $_SESSION["message"]; ?></p>
        <?php
            unset($_SESSION["message"]);
            unset($_SESSION["err"]);

            if (!isset($_GET["page"]))
                $_GET["page"] = "journals";
        ?>
        <style>
            #navbar a {color: black; text-decoration:none;} #navbar a:hover {text-decoration:underline;}
            #navbar td {padding-left: 0; padding-right: 25px;}
        </style>
        <table id="navbar">
        <tr><td>
        <?php
        if (in_array($_GET["page"],array("journals", "viewjournals", "addjournal", "editjournal", "deletejournal", "addjentry","editjentry","deletejentry")))
            echo "<a href=\"?page=journals\"><b>Journals</b></a>";
        else
            echo "<a href=\"?page=journals\">Journals</a>";
        
        echo "</td><td>";

        if (in_array($_GET["page"],array("conferences","viewconferences","addconf","editconf","deleteconf", "addcentry", "editcentry", "deletecentry")))
            echo "<a href=\"?page=conferences\"><b>Conferences</b></a>";
        else
            echo "<a href=\"?page=conferences\">Conferences</a>";
        
        echo "</td><td>";

        if (in_array($_GET["page"],array("projects","viewsponsors","addspons","editspons","deletespons","addproject","editproject","deleteproject")))
            echo "<a href=\"?page=projects\"><b>Projects</b></a>";
        else
            echo "<a href=\"?page=projects\">Projects</a>";
        
        echo "</td><td>";

        if (in_array($_GET["page"],array("faculty","addfac","editfac","deletefac")))
            echo "<a href=\"?page=faculty\"><b>Faculty</b></a>";
        else
            echo "<a href=\"?page=faculty\">Faculty</a>";
        
        echo "</td><td>";

        if (in_array($_GET["page"],array("collaboration")))
            echo "<a href=\"?page=collaboration\"><b>Collaboration</b></a>";
        else
            echo "<a href=\"?page=collaboration\">Collaboration</a>";
        
        ?>
        </td></tr>
        </table>

        <?php

        $pagelinks = array(
            "journals" => "journals/index.php",
            "conferences" => "conferences/index.php",
            "projects" => "projects/index.php",
            "faculty" => "faculty/index.php",
            "collaboration" => "collaboration/index.php",
            "viewjournals" => "journals/viewjournals.php",
            "viewconferences" => "conferences/viewconferences.php",
            "viewsponsors" => "projects/viewsponsors.php",
            "addjournal" => "journals/addjournal.php",
            "editjournal" => "journals/editjournal.php",
            "deletejournal" => "journals/deletejournal.php",
            "addconf" => "conferences/addconference.php",
            "editconf" => "conferences/editconference.php",
            "deleteconf" => "conferences/deleteconference.php",
            "addspons" => "projects/addsponsor.php",
            "editspons" => "projects/editsponsor.php",
            "deletespons" => "projects/deletesponsor.php",
            "addfac" => "faculty/addfaculty.php",
            "editfac" => "faculty/editfaculty.php",
            "deletefac" => "faculty/deletefaculty.php",
            "addjentry" => "journals/addjentry.php",
            "editjentry" => "journals/editjentry.php",
            "deletejentry" => "journals/deletejentry.php",
            "addcentry" => "conferences/addcentry.php",
            "editcentry" => "conferences/editcentry.php",
            "deletecentry" => "conferences/deletecentry.php",
            "addproject" => "projects/addproject.php",
            "editproject" => "projects/editproject.php",
            "deleteproject" => "projects/deleteproject.php",
        );

        if (array_key_exists($_GET["page"],$pagelinks))
            require $pagelinks[$_GET["page"]];

        ?>
    </main>
</body>
</html>