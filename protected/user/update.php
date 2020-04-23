<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
	<h1>Page access is forbidden!</h1>
<?php else : ?>
<?php 
	if(array_key_exists('u', $_GET) && !empty($_GET['u'])) {
		$query = "SELECT id, username, email, permission FROM users WHERE id = :id";
		$params = [':id' => $_GET['u']];
		require_once DATABASE_CONTROLLER;
		$updateuser = getRecord($query, $params);
	}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateUser'])) {
		$postData = [
			'permission' => $_POST['permission'],
		];

		if($postData['permission'] < 0 || $postData['permission'] > 1) {
			echo "Hibás adat(ok)!";
		}
		else {
			$query = "UPDATE users SET permission = :permission WHERE id = :id";
			$params = [
				':permission' => $postData['permission'],
				':id' => $updateuser['id']
			];
			require_once DATABASE_CONTROLLER;
			if(!executeDML($query, $params)) {
				echo "Hiba az adatbevitel során!";
			} header('Location: index.php?P=users');
		}
	}
?>

<form method="post">
	<div class="form-row">
		<div class="form-group col-md-12">
	    	<label for="updatePermission"><?php echo $updateuser['username'] ?></label>
	    	<select class="form-control" id="updatePermission" name="permission">
	      		<option value="0">User</option>
	      		<option value="1">Admin</option>
	    	</select>
	  	</div>
	</div>
	<button type="submit" class="btn btn-primary" name="updateUser">Update User</button>
</form>
<?php endif; ?>