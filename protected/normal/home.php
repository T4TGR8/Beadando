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
	$query = "SELECT id, title, author, created FROM threads ORDER BY created desc";
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
				<th scope="col" class="right">Author</th>
				<th scope="col" class="right">Created</th>
				<th scope="col"></th>
			</tr>
		</thead>
		<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
			<tbody>
				<?php $i = 0; ?>
				<?php foreach ($threads as $t) : ?>
					<?php $i++; ?>
					<tr>
						<td><a href="index.php?P=open_thread&o=<?=$t['id'] ?>"><?=$t['title'] ?></td>
						<td align='right'><?=$t['author'] ?></td>
						<td align='right'><?=$t['created'] ?></td>
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
						<td><a href="index.php?P=open_thread&o=<?=$t['id'] ?>"><?=$t['title'] ?></td>
						<td align='right'><?=$t['author'] ?></td>
						<td align='right'><?=$t['created'] ?></td>
						<td align='right'><a href="index.php?P=update_thread&u=<?=$t['id'] ?>">&#9998 </a> | <a href="?P=home&d=<?=$t['id'] ?>">&#128465</a></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		<?php endif; ?>
	</table>
<?php endif; ?>
