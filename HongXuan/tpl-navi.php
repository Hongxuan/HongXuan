<ul>
	<li><a href="join.php">Join</a></li>
	<li><a href="index.php">Login</a></li>
</ul>

<?php if(!empty($this->session)) { ?>
<ul>
	<li><a href="edit-user.php">Update Club</a></li>
	<li><a href="new-event.php">New Event</a></li>
</ul>
<?php } ?>