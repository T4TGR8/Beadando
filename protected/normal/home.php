<?php 
	if(array_key_exists('d', $_GET) && !empty($_GET['d'])) {
		$query = "DELETE FROM threads WHERE id = :id";
		$params = [':id' => $_GET['d']];
		require_once DATABASE_CONTROLLER;
		if(!executeDML($query, $params)) {
			echo "Hiba törlés közben!";
		}
	}
?>
<?php 
	if(array_key_exists('o', $_GET) && !empty($_GET['o'])) {
		$query = "SELECT title, ftext FROM threads WHERE id = :id";
		$params = [':id' => $_GET['o']];
		require_once DATABASE_CONTROLLER;
		if(!executeDML($query, $params)) {
			echo "Hiba!";
		}
		echo "$query";
	}
?>
<?php 
	$query = "SELECT id, title FROM threads";
	require_once DATABASE_CONTROLLER;
	$threads = getList($query);
?>
<?php if(count($threads) <= 0) : ?>
	<h1>No threads found in the database</h1>
<?php else : ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th scope="col">Title</th>
				<th scope="col"></th>
				<th scope="col"></th>
			</tr>
		</thead>
		<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
			<tbody>
			<?php $i = 0; ?>
			<?php foreach ($threads as $t) : ?>
				<?php $i++; ?>
				<tr>
					<td><a href="index.php?P=open_thread"><?=$t['title'] ?></td>
					<td></td>
					<td></td>
				</tr>
			<?php endforeach;?>
			</tbody>
		<?php else : ?>
			<tbody>
				<?php $i = 0; ?>
				<?php foreach ($threads as $t) : ?>
					<?php $i++; ?>
					<tr>
						<td><a href="?P=home&o=<?=$t['id'] ?>"><?=$t['title'] ?></td>
						<td></td>
						<td align='right'><a href="#">&#9998 </a><a href="?P=home&d=<?=$t['id'] ?>">&#128465</a></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		<?php endif; ?>
	</table>
<?php endif; ?>
