<?php
require "../enforcelogin.php";
?>

<h3>Add Journal</h3>
<p>Before adding a journal please check whether it already exists or not.</p>

<form action="journals/add_journal_handler.php" method="post">
<p>Journal ID will be generated automatically.</p>
<p><label>Name: </label><input type="text" name="name"></p>
<p><label>Other details: </label><input type="text" name="od"></p>
<p><input type="submit" value="Add"></p>
</form>
