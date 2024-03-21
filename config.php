<?php if ( ! defined('SECRET_KEY')) exit('<pre>Error 404 : Page Not Found</pre>');

	// Definisi database
	define('DB_HOST', 'db');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', 'root');
	define('DB_NAME', 'pkl');

	// Definisi umum
	define('ADMIN_PATH', 'adminns');
	define('ADMIN_URL', 'admin-page');
	define('BASE_URL', 'https://project.alft.dev/pkl/');

	define('ERROR_REPORTING', 0); // tanpa error
	// define('ERROR_REPORTING', 'E_ALL'); // menampilkan error

	// Sebelum beraksi
	error_reporting(ERROR_REPORTING);
	session_start();

	include ADMIN_PATH.'/class/User.php';
	include ADMIN_PATH.'/class/Provinsi.php';

	$user = new User();
	$provinsi = new Provinsi();

	function getUrl($page="",$menu="",$param1="",$param2="") {
		$url = BASE_URL;
		if (!empty($page)) $url.= "index.php?page=".$page;
		if (!empty($menu)) $url.= "&menu=".$menu;
		if (!empty($param1)) $url.= "&data1=".$param1;
		if (!empty($param2)) $url.= "&data2=".$param2;
		return $url;
	}
?>
