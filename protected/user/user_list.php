<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
	<h1>Page access is forbidden!</h1>
<?php else : ?>
	<?php 
		if(array_key_exists('d', $_GET) && !empty($_GET['d'])) {
			$query = "DELETE FROM users WHERE id = :id";
			$params = [':id' => $_GET['d']];
			require_once DATABASE_CONTROLLER;
			if(!executeDML($query, $params)) {
				echo "Hiba törlés közben!";
			}
		}
	?>

	<?php 
		$query = "SELECT id, username, email, permission FROM users";
		require_once DATABASE_CONTROLLER;
		$users = getList($query);
	?>
	
	<?php if(count($users) <= 0) : ?>
		<h1>No users found in the database.</h1>
	<?php else : ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Username</th>
					<th scope="col">Email</th>
					<th scope="col">Permission</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 0; ?>
				<?php foreach ($users as $u) : ?>
					<?php $i++; ?>
					<tr>
						<th scope="row"><?=$i ?></th>
						<td><?=$u['username'] ?></td>
						<td><?=$u['email'] ?></td>
						<td><?=$u['permission'] ?></td>
						<td align='right'><a href="index.php?P=update_users&u=<?=$u['id'] ?>">&#9998 </a> | <a href="index.php?P=users&d=<?=$u['id'] ?>">&#128465</a></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	<?php endif; ?>
<?php endif; ?>