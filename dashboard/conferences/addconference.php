<?php
require "../enforcelogin.php";
?>

<h3>Add Conference</h3>
<p>Before adding a conference please check whether it already exists or not.</p>

<form action="conferences/add_conference_handler.php" method="post">
<p>Conference ID will be generated automatically.</p>
<p><label>Name: </label><input type="text" name="name"></p>
<p><label>Location: </label><input type="text" name="location"></p>
<p><label>Date: </label><input type="text" name="date"><label> Enter in yyyy-mm-dd format</label></p>
<p><label>Other details: </label><input type="text" name="od"></p>
<p><input type="submit" value="Add"></p>
</form>
