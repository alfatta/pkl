<?php if ( ! defined('SECRET_KEY')) exit('<pre>Error 404 : Page Not Found</pre>');

	if (isset($_GET['menu'])) {
		switch ($_GET['menu']) {
			case 'logout':
				$user->logout();header("Location:".getUrl(ADMIN_URL,'login'));break;
			case 'edit':
				if (!isset($_GET['data1'])) {
					exit('<pre>Error 404 : Page Not Found</pre>');
				}
				include_once 'pg_edit.php';break;
			case 'login':
				include_once 'pg_login.php';break;
			case 'setting':
				include_once 'pg_setting.php';break;
			default:
				exit('<pre>Error 404 : Page Not Found</pre>');break;
		}
	} else {
		include_once 'pg_home.php';
	}
?>
