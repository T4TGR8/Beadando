<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 0) : ?>
	<h1>Page access is forbidden!</h1>
<?php else : ?>

	<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addThread'])) {
		$postData = [
			'title' => $_POST['title'],
			'ftext' => $_POST['ftext']
		];

		if(empty($postData['title']) || empty($postData['ftext'])) {
			echo "Hiányzó adat(ok)!";
		}
		else {
			$query = "INSERT INTO threads (title, ftext) VALUES (:title, :ftext)";
			$params = [
				':title' => $postData['title'],
				':ftext' => $postData['ftext']
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
    		<input type="text" class="form-control" id="threadTitle" name="title" placeholder="Title">
  		</div>
  		<div class="form-group">
    		<label for="threadText">Your message</label>
    		<textarea class="form-control" id="threadText" name="ftext" rows="5"></textarea>
  		</div>
		<button type="submit" class="btn btn-primary" name="addThread">Submit thread</button>
	</form>
<?php endif; ?>