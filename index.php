<?php
/*
Plugin Name: Kuli Digital ADS
Plugin URI: https://www.facebook.com/AGCscript/
Description: Kuli Digital Paid Traffic Landing Pages
Version: 2.0
Author: Heri Pedia
Author URI: https://www.facebook.com/heripediaasli
*/

function kdads_admin(){
    add_menu_page(
        'Kuli Digital Dashboard',
        'Kuli Digital Ads',
        'manage_options',
        'kdads',
        'kdads_init',
        'dashicons-plugins-checked',
        '2'
    );
}
add_action('admin_menu', 'kdads_admin');
function kdads_init(){
    include(plugin_dir_path(__FILE__).'___Kuli_Digital_Admin.php');
}

add_filter('theme_page_templates', 'kdads_pagez');
function kdads_pagez($templates){
    $templates[plugin_dir_path(__FILE__) . '___Kuli_Digital_CustomPages.php'] = __('Kuli Digital Ads Plugin Template Pages', 'single_kdads');
    return $templates;
}
add_filter('template_include', 'kdads_pagez_include', 99);
function kdads_pagez_include($template){
    if (is_page('single_kdads')) {
        $meta = get_post_meta(get_the_ID());
        if (!empty($meta['_wp_page_template'][0]) && $meta['_wp_page_template'][0] != $template) {
            $template = $meta['_wp_page_template'][0];
        }
    }
    return $template;
}
function page_single_kdads() {
    $pagez = array(
        'post_title' => 'Kuli Digital Ads Plugin Pages',
        'post_content' => 'Jangan Di Edit',
        'post_name' => 'single_kdads',
        'post_status' => 'private',
        'post_author' => 1,
        'post_type' => 'page',
        'post_slug' => 'single_kdads',
        'page_template' => plugin_dir_path(__FILE__) . '___Kuli_Digital_CustomPages.php'
    );
    if(get_page_by_path('single_kdads', OBJECT) == NULL){
        wp_insert_post( $pagez, $wp_error = false );
    }else{
        return false;
    }
}
register_activation_hook(__FILE__, 'page_single_kdads');

function kdads_setting() {
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    $DB_sql = $wpdb->prefix.'kuli_digital_setting';
    if($wpdb->get_var("SHOW TABLES LIKE '$DB_sql';") != $DB_sql) {
   		$sql = "CREATE TABLE $DB_sql (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`email` varchar(255) NOT NULL,
		`lisensi` varchar(50) NOT NULL,
		`organik_status` varchar(20) NOT NULL,
		`organik` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
		`manual_organik` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
		`non_organik` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
		`block_ip` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
		`block_country` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
		`block_redirect` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
		`getipintel_api` varchar(100) NULL,
		`proxycheck_api` varchar(100) NULL,
		`ipqualityscore_api` varchar(100) NULL,
		`traffic_filter_status` ENUM('on','off') DEFAULT 'off',
		PRIMARY KEY (`id`)
		) $charset_collate;";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
   }
   $wpdb->query($wpdb->prepare( "INSERT IGNORE INTO $DB_sql (id, email, lisensi, organik_status, organik, block_country, block_redirect) VALUES ( %s, %s, %s, %s, %s, %s, %s )", array('1', '', '', 'off', '', '', '')));
}
register_activation_hook(__FILE__, 'kdads_setting');

function kdads_project() {
    global $wpdb;
    $DB_data = $wpdb->prefix.'kuli_digital_project';
    if($wpdb->get_var("SHOW TABLES LIKE '$DB_data';") != $DB_data) {
        $charset_collate = $wpdb->get_charset_collate();
   		$sql = "CREATE TABLE $DB_data (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`idmd5` varchar(50) CHARACTER SET latin1 NOT NULL,
		`shortlink` text COLLATE utf8mb4_unicode_ci NOT NULL,
		`judul` text COLLATE utf8mb4_unicode_ci NOT NULL,
		`deskripsi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
		`gambar` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
		`konten` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
		`ads_1` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
		`ads_2` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
		`ads_3` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
		`float_ads` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
		`html_head` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
		`html_foot` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
		`download_button_text` varchar(255) CHARACTER SET latin1 NOT NULL,
		`download_button_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
		`back_button_text` varchar(255) CHARACTER SET latin1 NOT NULL,
		`back_button_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
		`traffic_source` ENUM('all', 'fb', 'fb_google') DEFAULT 'all',
		`device_view` varchar(50) NOT NULL,
		`themes` varchar(50) NOT NULL,
		`timer` varchar(10) NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY `idmd5` (`idmd5`)
		) $charset_collate;";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
   }
}
register_activation_hook(__FILE__,'kdads_project');

function kdads_traffic() {
    global $wpdb;
    $DB_data = $wpdb->prefix.'kuli_digital_traffic';
    if($wpdb->get_var("SHOW TABLES LIKE '$DB_data';") != $DB_data) {
        $charset_collate = $wpdb->get_charset_collate();
   		$sql = "CREATE TABLE $DB_data (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`valid_traffic` int(11) NULL,
		`invalid_traffic` int(11) NULL,
		PRIMARY KEY (`id`)
		) $charset_collate;";
    dbDelta($sql);
   }
   $wpdb->query( $wpdb->prepare( "INSERT IGNORE INTO $DB_data (id, valid_traffic, invalid_traffic) VALUES ( %s, %s, %s )", array('1', '0', '0') ));
}
register_activation_hook(__FILE__,'kdads_traffic');

add_action('init', 'kdads_top');
function kdads_top(){
	// var_dump();die();
    include(plugin_dir_path(__FILE__).'__head_engine.php');
}

add_action( 'parse_request', 'kdads_session' );
function kdads_session(){
    include(plugin_dir_path(__FILE__).'__sess_engine.php');
}

?>