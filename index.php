<?php
require "enforcelogout.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>IITP Publication Management System - Login</title>
    <style>
        td {
            padding: 5px;
        }
    </style>
</head>
<body>
    <main style="max-width:400px; margin:0 auto;">
        <div style="height:15vh"></div>
        <h1>IITP Publication Management System</h1>
        <div style="height:3vh">
        </div>
        <form action="/login.php" method="post">
            <table>
            <tr><td colspan=2 <?php if(isset($_SESSION["indexmsgerr"])) echo "style=\"color:red\""; else echo "style=\"color:green\"";?>>
                <?php
                    if(isset($_SESSION["indexmsg"])) {
                        echo $_SESSION["indexmsg"];
                        session_unset();
                        session_destroy();
                    }
                ?>
            </td></tr>
            <tr><td>Username:</td><td><input type="text" name="user"></td></tr>
            <tr><td>Password:</td><td><input type="password" name="pass"></td></tr>
            <tr><td></td><td><input type="submit" value="Login"></td></tr>
            </table>
        </form>
    </main>
</body>
</html>