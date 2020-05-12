<?php 
	if(array_key_exists('dc', $_GET) && !empty($_GET['dc'])) {
		$query = "DELETE FROM comments WHERE id = :id";
		$params = [':id' => $_GET['dc']];
		require_once DATABASE_CONTROLLER;
		if(!executeDML($query, $params)) {
			echo "Hiba törlés közben!";
		}
	}
?>

<?php
	if(array_key_exists('o', $_GET) && !empty($_GET['o'])) {
		$query = "SELECT id, title, ftext, author, created FROM threads WHERE id = :id";
		$params = [':id' => $_GET['o']];
		require_once DATABASE_CONTROLLER;
		$openthread = getRecord($query, $params);
	}
	if(array_key_exists('o', $_GET) && !empty($_GET['o'])) {
		$query = "SELECT id, ctext, author, comcreated FROM comments WHERE threadid = :id";
		$params = [':id' => $_GET['o']];
		require_once DATABASE_CONTROLLER;
		$comments = getList($query, $params);
	}
	else {
		echo "Hiba!";
	}
?>

<?php if(!isset($_SESSION['permission'])) : ?>
	<table class = "table">
		<thead>
			<tr>
				<th scope="col"><?php echo "<h2>".$openthread['title']."</h2><br>" ?><?php echo $openthread['author'] ?> <?php echo $openthread['created'] ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo nl2br($openthread['ftext']) ?></td>
			</tr>
			<tr>
				<td><b>Comments:</b></td>
			</tr>
			<?php if(count($comments) > 0) : ?>
				<?php $i = 0; ?>
				<?php foreach ($comments as $c) : ?>
					<?php $i++; ?>
					<tr>
						<td><?=$c['ctext'] ?><?php echo "<br>"; ?><b><?=$c['author'] ?><?php echo " "; ?><?=$c['comcreated'] ?></b></td>
					</tr>
				<?php endforeach;?>
			<?php endif; ?>
		</tbody>
	</table>
<?php else : ?>
	<table class = "table">
		<thead>
			<tr>
				<th scope="col"><?php echo "<h2>".$openthread['title']."</h2><br>" ?><?php echo $openthread['author'] ?> <?php echo $openthread['created'] ?></th>
				<?php if($_SESSION['permission'] > 0) : ?>
					<th class="right"><a href="index.php?P=update_thread&u=<?=$openthread['id'] ?>">&#9998 </a> | <a href="index.php?P=home&d=<?=$openthread['id'] ?>">&#128465</a></th>
				<?php endif; ?>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td colspan="2"><?php echo nl2br($openthread['ftext']) ?></td>
			</tr>
			<tr>
				<td><b>Comments:</b></td>
			</tr>
			<?php if(count($comments) > 0) : ?>
				<?php $i = 0; ?>
				<?php foreach ($comments as $c) : ?>
					<?php $i++; ?>
					<tr>
						<td><?=$c['ctext'] ?><?php echo "<br>"; ?><b><?=$c['author'] ?><?php echo " "; ?><?=$c['comcreated'] ?></b></td>
						<?php if($_SESSION['permission'] > 0) : ?>
						<td align='right'><a href="index.php?P=open_thread&o=<?=$openthread['id'] ?>&dc=<?=$c['id'] ?>">&#128465</a></td>
						<?php endif; ?>
					</tr>
				<?php endforeach;?>
			<?php endif; ?>
		</tbody>
	</table>

	<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['commentThread'])) {
			$postData = [
				'ctext' => $_POST['ctext']
			];
			if(empty($postData['ctext'])) {
				echo "Hiányzó adat(ok)!";
			}
			else {
				$query = "INSERT INTO comments (ctext, author, comcreated, threadid) VALUES (:ctext, :author, :comcreated, :threadid)";
				$params = [
					':ctext' => $postData['ctext'],
					':author' => $_SESSION['uname'],
					':comcreated' => date("Y-m-d H:i:s"),
					':threadid' => $openthread['id']
				];
				require_once DATABASE_CONTROLLER;
				if(!executeDML($query, $params)) {
					echo "Hiba az adatbevitel során!";
				} echo "<meta http-equiv='refresh' content='0'>";
			}
		}
	?>

	<form method="post">
		<div class="form-group">
			<label for="commentText">Your Comment</label>
	   		<textarea class="form-control" id="commentText" name="ctext" rows="5"></textarea>
		</div>
		<button type="submit" class="btn btn-primary" name="commentThread">Comment</button>
	</form>
<?php endif; ?>
