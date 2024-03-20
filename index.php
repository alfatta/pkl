<?php
	define('SECRET_KEY', 'ahbru1y2g81u2huxh21uhxu2h9huuashc9u29');

	include_once 'config.php';

	if (isset($_GET['page'])) {
		if ($_GET['page'] == ADMIN_URL) {
			include_once ADMIN_PATH."/index.php";
		} else {
			exit('<pre>Error 404 : Page Not Found</pre>');
		}
	} else {
		include_once 'front.php';
	}
?>
