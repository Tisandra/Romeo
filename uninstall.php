<?php 
if (!defined('WP_UNINSTALL_PLUGIN')) exit;
global $wpdb;
$DB_sql = $wpdb->prefix.'kuli_digital_setting';
$DB_data = $wpdb->prefix.'kuli_digital_project';
$DB_traffic = $wpdb->prefix.'kuli_digital_traffic';
$wpdb->query("DROP TABLE IF EXISTS {$DB_sql},{$DB_data}");
