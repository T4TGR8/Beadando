<?php 
	if(array_key_exists('o', $_GET) && !empty($_GET['o'])) {
		$query = "SELECT title, ftext FROM threads WHERE id = :id";
		$params = [':id' => $_GET['o']];
		require_once DATABASE_CONTROLLER;
		$openthread = getRecord($query, $params);
	}
	else {
		echo "kacsa";
	}
	
	echo "<h2>".$openthread['title']."</h2>";
	echo "<br>";
	echo $openthread['ftext'];
?>
