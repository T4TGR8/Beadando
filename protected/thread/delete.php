<?php
if(isset($_GET['M'])) {
    $delete_id = $_GET['M'];
    $sql = "DELETE FROM workers WHERE id = '".$delete_id."'";
}
else {
	echo "succ";
}
?>
