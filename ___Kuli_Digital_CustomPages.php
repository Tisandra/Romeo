<?php
@ini_set('max_execution_time',30000);
// define('DONOTCACHEPAGE', true);
global $wpdb;
$DB_sql = $wpdb->prefix.'kuli_digital_setting';
$DB_data = $wpdb->prefix.'kuli_digital_project';
$siteurl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['HTTP_HOST'];
$currurl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$expurl = explode('/', str_replace("www.", "", $siteurl));
$sitename = strtolower($expurl[2]);

if(isset($_POST['item']) && preg_match('/^scrape_dataorganik$/', $_POST['item'])){
    include(plugin_dir_path(__FILE__).'__dom_engine.php');
    $siteurl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['HTTP_HOST'];
    $curr_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    header('Content-Type: text/html; charset=utf-8');
    
    $musag = array(
		"Samsung Galaxy A20" => "Mozilla/5.0 (Linux; Android 14; SM-A205U) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.144 Mobile Safari/537.36",
		"Samsung Galaxy A10e" => "Mozilla/5.0 (Linux; Android 14; SM-A102U) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.144 Mobile Safari/537.36",
		"Samsung Galaxy S9" => "Mozilla/5.0 (Linux; Android 14; SM-G960U) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.144 Mobile Safari/537.36",
		"Samsung Galaxy Note9" => "Mozilla/5.0 (Linux; Android 14; SM-N960U) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.144 Mobile Safari/537.36",
		"LG Stylo 5" => "Mozilla/5.0 (Linux; Android 14; LM-Q720) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.144 Mobile Safari/537.36",
		"SAMSUNG Galaxy S23" => "Mozilla/5.0 (Linux; Android 13; SAMSUNG SM-S918B) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/21.0 Chrome/110.0.5481.154 Mobile Safari/537.36",
		"Oppo K7" => "Mozilla/5.0 (Linux; Android 10; PCLM50 Build/QKQ1.200216.002) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Mobile Safari/537.36 EdgA/91.0.864.48",
		"Redmi Note 7S" => "Mozilla/5.0 (Linux; Android 9.0; Redmi Note7S) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.96 Mobile Safari/537.36 EdgA/88.0.705.56",
		"Galaxy W20" => "Mozilla/5.0 (Linux; Android 9.0; SM-W2020) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Mobile Safari/537.36"
	);
    
    $if_datax = array();
    foreach($musag as $keyz => $valz){
        
        $dtdomz = urlencode($siteurl);
        $gurl = "https://www.google.com/search?q=site%3A{$dtdomz}&sourceid=chrome&ie=UTF-8&num=50";
        $usag = $valz;
        $nmua = $keyz;
        
        $optionz = stream_context_create(array('http'=> array('user_agent' => $usag, 'timeout' => 3) ));
        $getz = file_get_contents($gurl, false, $optionz);
    
        if(!empty($getz)){
            preg_match_all('/role="presentation"[^<>]*ping="(.*?)"/', $getz, $matcx);
            foreach($matcx[1] as $elmx){
                $dataurlx = 'https://www.google.com'.html_entity_decode($elmx);
                if(!preg_match('/\&usg=|\&ved=|\&opi=|'.$sitename.'/i', $dataurlx)){continue;}
                $if_datax[] = $dataurlx;
            }
        }
    }
    
    $result = json_encode($if_datax, JSON_HEX_APOS | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
	$wpdb->query("UPDATE {$DB_sql} SET organik = '{$result}', organik_status = 'on' WHERE id = '1'");
    
    foreach($wpdb->get_results( "SELECT * FROM {$DB_sql} WHERE id = '1'") as $key => $row) {
        $email = $row->email;
        $lisensi = $row->lisensi;
        $organik_status = $row->organik_status;
        $organik = $row->organik;
        $block_country = $row->block_country;
        $block_redirect = $row->block_redirect;
    }
    
    $js_dt = json_decode($organik, TRUE);
    $totdt = count($js_dt);
    
    if($totdt == 0){
        echo 'Data Organik GAGAL Tersimpan...';
    }else{
        echo $totdt.' Data Organik Sukses Tersimpan';
    }
    exit();
}
?>