
<a href="index.php">Home</a>
<?php if(!IsUserLoggedIn()) : ?>
	<a href="index.php?P=register" class="loginandstuff">Register</a>
	<span class="loginandstuff"> &nbsp; | &nbsp; </span>
	<a href="index.php?P=login" class="loginandstuff">Login</a>
<?php else : ?>
<span> &nbsp; | &nbsp; </span>
<a href="index.php?P=add_thread">New thread</a>
<span> &nbsp; | &nbsp; </span>
<a href="index.php?P=my_thread">My threads</a>


<a href="index.php?P=logout" class="loginandstuff">Logout</a>

	<?php if(isset($_SESSION['permission']) && $_SESSION['permission'] >= 1) : ?>
		<span class="loginandstuff"> &nbsp; || &nbsp; </span>
		<a href="index.php?P=users" class="loginandstuff">User list</a>
	<?php endif; ?>
<?php endif; ?>

