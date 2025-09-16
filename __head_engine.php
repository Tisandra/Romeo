<?php
define('DONOTCACHEPAGE', true);
if (!session_id()) {
	session_start();
}
$siteurl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . "/";
$currurl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
global $wpdb;
$DB_sql = $wpdb->prefix . 'kuli_digital_setting';
$DB_data = $wpdb->prefix . 'kuli_digital_project';
foreach ($wpdb->get_results("SELECT * FROM {$DB_sql} WHERE id = '1'") as $key => $row) {
	$email = $row->email;
	$lisensi = $row->lisensi;
	$organik_status = $row->organik_status;
	$organik = $row->organik;
	$block_country = $row->block_country;
	$block_redirect = $row->block_redirect;
	$manual_organik = $row->manual_organik;
	$non_organik = $row->non_organik;
	$block_ip = $row->block_ip;
}
// $md5_mail = md5($email);
// $ifdom = strtolower($_SERVER['HTTP_HOST']);
// $ifmd5 = md5("AGCscript+KuliDigital");
// $codex = md5($ifdom . $ifmd5 . $md5_mail);
if(isset($_SESSION['slugID'])){
	$if_slug = $_SESSION['slugID'];
	foreach ($wpdb->get_results("SELECT * FROM {$DB_data} WHERE idmd5 = '{$if_slug}'") as $keyx => $rowx) {
		$device_view = $rowx->device_view;
		$themesx = $rowx->themes;
	}
	if (preg_match('/^default$/', $themesx)) {
		$if_themes = 'default';
	} elseif (preg_match('/^custom$/', $themesx)) {
		$if_themes = 'custom';
	} elseif (preg_match('/^barbar$/', $themesx)) {
		$if_themes = 'barbar';
	} elseif (preg_match('/^loading$/', $themesx)) {
		$if_themes = 'loading';
	} elseif (preg_match('/^bootstrap$/', $themesx)) {
		$if_themes = 'bootstrap';
	} elseif (preg_match('/^warrior$/', $themesx)) {
		$if_themes = 'warrior';
	} else {
		$if_themes = 'default';
	}
	//$reflink = strtolower(wp_get_referer());
	if (isset($_SERVER["HTTP_REFERER"])) {
		// Now you can use $referer safely
		$reflink = strtolower($_SERVER["HTTP_REFERER"]);
	} else {
		// Handle the case where HTTP_REFERER is not set
		$reflink = null;
	}
	$useragent = strtolower($_SERVER['HTTP_USER_AGENT']);
	if (isset($_SESSION['slugID'], $_SESSION['Template'])) {
		if (!empty($lisensi)) {
			include plugin_dir_path(__FILE__) . 'template_LP_' . $if_themes . '.php';
			unset($_SESSION['slugID']);
			unset($_SESSION['slugLINK']);
			session_destroy();
			exit;
		} else {
			unset($_SESSION['Template']);
			unset($_SESSION['slugID']);
			session_destroy();
			header("Location: {$siteurl}");
			exit;
		}
	}
}
?>