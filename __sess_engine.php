<?php
// define('DONOTCACHEPAGE', true);
require_once 'ipqualityscore_filter.php';
require_once 'proxycheck_filter.php';
require_once 'getipintel_filter.php';

$siteurl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . "/";
$currurl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
global $wpdb;
$DB_pos = $wpdb->prefix . 'posts';
$DB_sql = $wpdb->prefix . 'kuli_digital_setting';
$DB_traffic = $wpdb->prefix . 'kuli_digital_traffic';
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
	$traffic_filter_status = $row->traffic_filter_status;
	$getipintel_api = $row->getipintel_api;
	$proxycheck_api = $row->proxycheck_api;
	$ipqualityscore_api = $row->ipqualityscore_api;
}
foreach ($wpdb->get_results("SELECT * FROM {$DB_traffic} WHERE id = '1'") as $key => $row) {
	$valid_traffic = $row->valid_traffic;
	$invalid_traffic = $row->invalid_traffic;
}
// $md5_mail = md5($email);
// $ifdom = strtolower($_SERVER['HTTP_HOST']);
// $ifmd5 = md5("AGCscript+KuliDigital");
// $codex = md5($ifdom . $ifmd5 . $md5_mail);
$slugx = '';
foreach ($wpdb->get_results("SELECT * FROM {$DB_data}") as $key => $row) {
	$slugx .= strtolower($row->shortlink) . '|';
}
$slugz = rtrim($slugx, '|');

function CheckIpData()
{
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		return $_SERVER['HTTP_CLIENT_IP'];
	} else {
		if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			return $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			return (isset($_SERVER["HTTP_CF_CONNECTING_IP"]) ? $_SERVER["HTTP_CF_CONNECTING_IP"] : $_SERVER["REMOTE_ADDR"]);
		}
	}
}
$data_ip = CheckIpData();
$jsipdata = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $data_ip));

$if_block_ip = isset($jsipdata->geoplugin_countryCode)?$jsipdata->geoplugin_countryCode:null;
$dt_block_ip = isset($jsipdata->geoplugin_request)?$jsipdata->geoplugin_request:null;
if (!empty($block_country)) {
	$cn_dt = json_decode($block_country, TRUE);
	if (count($cn_dt) == 0) {
		$data_cntr = '007';
	} else {
		$data_cntrx = '';
		foreach ($cn_dt as $cn_dtx) {
			$data_cntrx .= '^' . strtolower($cn_dtx) . '$|';
		}
		$data_cntr = rtrim($data_cntrx, "|");
	}
} else {
	$data_cntr = '007';
}
if (!empty($block_ip)) {
	$ip_dt = explode("\r\n", $block_ip);
	if (count($ip_dt) == 0) {
		$data_ipq = 'error';
	} else {
		foreach ($ip_dt as $ip_dtx) {
			$data_ipqx .= '^' . strtolower($ip_dtx) . '$|';
		}
		$data_ipq = rtrim($data_ipqx, "|");
	}
} else {
	$data_ipq = 'error';
}
if (isset($_SERVER["HTTP_REFERER"])) {
    // Now you can use $referer safely
	$reflink = strtolower($_SERVER["HTTP_REFERER"]);
} else {
    // Handle the case where HTTP_REFERER is not set
    $reflink = null;
}
$useragent = strtolower($_SERVER['HTTP_USER_AGENT']);
function redirectInvalid($wpdb, $invalid_traffic = 0, $block_redirect, $getlinkz) {
	$DB_traffic = $wpdb->prefix . 'kuli_digital_traffic';
	// valid traffic recorded
	$invalid_traffic = $invalid_traffic + 1;
	$wpdb->query("UPDATE {$DB_traffic} SET invalid_traffic = '{$invalid_traffic}' WHERE id = '1'");
	// redirect 
	if (!empty($block_redirect)) {
		header("Location: {$block_redirect}");
		exit;
	} else {
		header("Location: {$getlinkz}");
		exit;
	}
}
// Get the protocol (http or https)
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';

// Get the host
$host = $_SERVER['HTTP_HOST'];

// Get the path
$path = $_SERVER['REQUEST_URI'];

// Combine them to get the full URL
// $fullUrl = $protocol . '://' . $host . $path;
// $timestamp = date('Y-m-d H:i:s');
// $ua = $_SERVER['HTTP_USER_AGENT'];
// $logEntry = "[$timestamp] IP: $data_ip, Referer: $reflink [$fullUrl]\n";
// file_put_contents(plugin_dir_path(__FILE__).'referer_log.txt', $logEntry, FILE_APPEND | LOCK_EX);
// $uaLog = "$ua\n";
// file_put_contents(plugin_dir_path(__FILE__).'ua_log.txt', $uaLog, FILE_APPEND | LOCK_EX);

if (!empty($lisensi)) {
	if (!empty($slugz)) {
		foreach ($wpdb->get_results("SELECT * FROM {$DB_pos} WHERE post_type = 'post' AND post_status = 'publish' ORDER BY RAND() LIMIT 1") as $key => $row) {
			$getlinkz = get_permalink($row->ID);
		}
		
		if (preg_match('/^on$/', $organik_status)) {
			$totdt = 0;
			if (!empty($organik)) {
				$js_dt = json_decode($organik, TRUE);
				$totdt = count($js_dt);
			}
			
			if ($totdt == 0) {
				$linkorg = $getlinkz;
			} else {
				$orglink = array();
				foreach ($js_dt as $js_dtx) {
					// $iscode = '&utm_source=google&utm_medium=organic&utm_campaign=organic&utm_term=car';
					$orglink[] = $js_dtx;
				}
				shuffle($orglink);
				$linkorg = $orglink[0];
			}
		} else {
			$linkorg = $getlinkz;
		}
		if (preg_match('/\\/' . $slugz . '/', strtolower($_SERVER['REQUEST_URI']))) {
			if (preg_match('/' . $data_cntr . '/i', $if_block_ip)) {
				redirectInvalid($wpdb, $invalid_traffic, $block_redirect, $getlinkz);
			}
			if (preg_match('/' . $data_ipq . '/i', strtolower(trim($dt_block_ip)))) {
				redirectInvalid($wpdb, $invalid_traffic, $block_redirect, $getlinkz);
			}
			$exp_dom = explode('/', $_SERVER['REQUEST_URI']);
			$if_slug = trim(preg_replace('/[^a-zA-Z0-9-_].*/', '', $exp_dom[1]));
			foreach ($wpdb->get_results("SELECT * FROM {$DB_data} WHERE LOWER(shortlink) = LOWER('{$if_slug}')") as $key => $row) {
				$id_slugz = $row->idmd5;
				$device_view = $row->device_view;
				$traffic_source = $row->traffic_source;
				$templatez = $row->themes;
			}
			if (!preg_match('/bot|crawl|slurp|spider|mediapartners|WhatsApp|Iframely|Google-Ads-Creatives-Assistant|Google-Adwords-Instant|adsbot|AdsBot-Google|AdsBot-Google-Mobile|GoogleOther|facebookexternalhit|Twitterbot|TwitterBot|Facebot/i', $useragent)) {
				if (preg_match('/^mobile$/', $device_view)) {
					if (!preg_match('/(android|bb\\d+|meego).+mobile|avantgo|bada\\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\\-(n|u)|c55\\/|capi|ccwa|cdm\\-|cell|chtm|cldc|cmd\\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\\-s|devi|dica|dmob|do(c|p)o|ds(12|\\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\\-|_)|g1 u|g560|gene|gf\\-5|g\\-mo|go(\\.w|od)|gr(ad|un)|haie|hcit|hd\\-(m|p|t)|hei\\-|hi(pt|ta)|hp( i|ip)|hs\\-c|ht(c(\\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\\-(20|go|ma)|i230|iac( |\\-|\\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\\/)|klon|kpt |kwc\\-|kyo(c|k)|le(no|xi)|lg( g|\\/(k|l|u)|50|54|\\-[a-w])|libw|lynx|m1\\-w|m3ga|m50\\/|ma(te|ui|xo)|mc(01|21|ca)|m\\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\\-2|po(ck|rt|se)|prox|psio|pt\\-g|qa\\-a|qc(07|12|21|32|60|\\-[2-7]|i\\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\\-|oo|p\\-)|sdk\\/|se(c(\\-|0|1)|47|mc|nd|ri)|sgh\\-|shar|sie(\\-|m)|sk\\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\\-|v\\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\\-|tdg\\-|tel(i|m)|tim\\-|t\\-mo|to(pl|sh)|ts(70|m\\-|m3|m5)|tx\\-9|up(\\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\\-|your|zeto|zte\\-/i', substr($useragent, 0, 4))) {
						redirectInvalid($wpdb, $invalid_traffic, $block_redirect, $getlinkz);
					}
				}
			}
			
			// Filter traffic dari FB Ads / Google Ads
			if(!empty($traffic_source) && $traffic_source !== 'all'){
				if(empty($reflink)){
					redirectInvalid($wpdb, $invalid_traffic, $block_redirect, $getlinkz);
				}
				// Define valid referrers for Facebook and Google
				// $valid_referrers = array(
					// 'facebook',
					// 'google'
				// );
				$traffic_sources = ($traffic_source == 'fb' ? array('facebook','fb') : ($traffic_source == 'fb_google' ? array('facebook','fb','google') : array($traffic_source)));
				if(isset($_GET['utm_source']) && !in_array(strtolower($_GET['utm_source']),$traffic_sources)){
					// Check if the referer is a valid referrer for Facebook or Google
					if(!preg_match('/facebook/i', strtolower($reflink)) && !preg_match('/google/i', strtolower($reflink))){
						redirectInvalid($wpdb, $invalid_traffic, $block_redirect, $getlinkz);
					}
					// $referer_host = parse_url($reflink, PHP_URL_HOST);
					// if (!in_array($referer_host, $valid_referrers)) {
						// redirectInvalid($wpdb, $invalid_traffic, $block_redirect, $getlinkz);
					// }
				}
				if(!isset($_GET['utm_source']) && !isset($_GET['fbclid'])) {
					redirectInvalid($wpdb, $invalid_traffic, $block_redirect, $getlinkz);
				}
			}
			
			// Filter traffic Proxy / VPN / Bad IP
			if($traffic_filter_status == 'on'){
				if(empty($proxycheck_api) && empty($ipqualityscore_api)) {
					$checker = new \GetIPIntel\GetIPIntelChecker();
					if(!$checker->checkProxy($getipintel_api, $data_ip)){
						redirectInvalid($wpdb, $invalid_traffic, $block_redirect, $getlinkz);
					}
				} else {
					if(!empty($proxycheck_api)){
						$checker = new \ProxyCheck\ProxyChecker();
						if(!$checker->proxycheck_function($proxycheck_api, $data_ip)){
							redirectInvalid($wpdb, $invalid_traffic, $block_redirect, $getlinkz);
						}
					} else if(!empty($ipqualityscore_api)){
						$checker = new \IPQualityScore\BlacklistChecker();
						$checker->SetKey($ipqualityscore_api);
						$checker->SetStrictness(0);
						// $checker->SetFailureRedirect($block_redirect);
						// $checker->SetSuccessRedirect($getlinkz);
						$checker->SetAllowCrawler(true);
						$checker->SetAllowPublicAccessPoints(true);
						if(!$checker->ForceRedirect('proxy')){
							redirectInvalid($wpdb, $invalid_traffic, $block_redirect, $getlinkz);
						}
					}
				}
			}
			
			if (preg_match('/^on$/i', $organik_status)) {
				if (!empty($manual_organik)) {
					$exporg = explode("\r\n", $manual_organik);
					$if_organik = array();
					foreach ($exporg as $organic_manuals) {
						if (empty($organic_manuals)) {
							continue;
						}
						$if_organik[] = $organic_manuals;
					}
					shuffle($if_organik);
					$targetlink = $if_organik[0];
				} else {
					$targetlink = $linkorg;
				}
			} else {
				if (!empty($non_organik)) {
					$exporg = explode("\r\n", $non_organik);
					$if_organik = array();
					foreach ($exporg as $non_organikz) {
						if (empty($non_organikz)) {
							continue;
						}
						$if_organik[] = $non_organikz;
					}
					shuffle($if_organik);
					$targetlink = $if_organik[0];
				} else {
					$targetlink = $getlinkz;
				}
			}
			
			// valid traffic recorded
			$valid_traffic = $valid_traffic + 1;
			$wpdb->query("UPDATE {$DB_traffic} SET valid_traffic = '{$valid_traffic}' WHERE id = '1'");
			// ---
			if (!session_id()) {
				session_start();
			}
			$_SESSION['slugID'] = $id_slugz;
			$_SESSION['Template'] = $templatez;
			$_SESSION['redirect'] = $targetlink;
			header("Location: {$targetlink}");
			exit;
		}
	}
}
?>