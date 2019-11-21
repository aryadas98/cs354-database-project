<?php
require "../enforcelogin.php";
?>

<h3>Add Sponsor</h3>
<p>Before adding a sponsor please check whether it already exists or not.</p>

<form action="projects/add_sponsor_handler.php" method="post">
<p>Sponsor ID will be generated automatically.</p>
<p><label>Name: </label><input type="text" name="name"></p>
<p><input type="submit" value="Add"></p>
</form>
