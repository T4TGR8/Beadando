<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 0) : ?>
	<h1>Page access is forbidden!</h1>
<?php else : ?>
	<?php 
		if(array_key_exists('u', $_GET) && !empty($_GET['u'])) {
			$query = "SELECT id, title, ftext FROM threads WHERE id = :id";
			$params = [':id' => $_GET['u']];
			require_once DATABASE_CONTROLLER;
			$updatethread = getRecord($query, $params);
		}

	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateThread'])) {
			$postData = [
				'title' => $_POST['title'],
				'ftext' => $_POST['ftext']
			];

			if(empty($postData['title']) || empty($postData['ftext'])) {
				echo "Hiányzó adat(ok)!";
			}
			else {
				$query = "UPDATE threads SET title = :title, ftext = :ftext WHERE id = :id";
				$params = [
					':title' => $postData['title'],
					':ftext' => $postData['ftext'],
					':id' => $updatethread['id']
				];
				require_once DATABASE_CONTROLLER;
				if(!executeDML($query, $params)) {
					echo "Hiba az adatbevitel során!";
				} header('Location: index.php');
			}
		}
	?>

	<form method="post">
 		<div class="form-group">
    		<label for="threadTitle">Title</label>
    		<input type="text" class="form-control" id="threadTitle" name="title" value="<?php echo $updatethread['title']; ?>">
  		</div>
  		<div class="form-group">
    		<label for="threadText">Your message</label>
    		<textarea class="form-control" id="threadText" name="ftext" rows="5"><?php echo $updatethread['ftext']; ?></textarea>
  		</div>
		<button type="submit" class="btn btn-primary" name="updateThread">Submit thread</button>
	</form>
<?php endif; ?>