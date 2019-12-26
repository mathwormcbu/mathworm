<?php
	if(!empty($_POST['type'])) {
		$ajaxFile = 'views/' . $_POST['type'] . '-ajax.php';
		if(file_exists($ajaxFile))
			require_once($ajaxFile);
	}
?>