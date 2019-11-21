<?php
require "../enforcelogin.php";
?>

<h3>Add Faculty</h3>
<p>Before adding an entry please check whether a duplicate entry already exists or not.</p>

<form action="faculty/add_faculty_handler.php" method="post">
<p>Faculty ID will be generated automatically.</p>
<p><label>Name: </label><input type="text" name="name"></p>
<p><label>Email: </label><input type="text" name="email"></p>
<p><input type="submit" value="Add"></p>
</form>
