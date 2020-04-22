<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
	<h1>Page access is forbidden!</h1>
<?php else : ?>
<?php 
	$query = "SELECT title FROM threads";
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
			<tbody>
				<?php $i = 0; ?>
				<?php foreach ($threads as $t) : ?>
					<?php $i++; ?>
					<tr>
						<td><a href="#"><?=$t['title'] ?></td>
						<td><a href="#">Edit</a></td>
						<td><a href="index.php?P=delete&M=">Delete</a></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	<?php endif; ?>
<?php endif; ?>