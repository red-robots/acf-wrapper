<?php
/*
Plugin Name: BellaACF
Plugin URI:  https://redrobots.io
Description: Wrapper for ACF fields
Version:     0.1
Author:      Bellaworks
Author URI:  https://redrobots.io/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: bellaacf
*/
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

define( 'BELLAACF_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once BELLAACF_PLUGIN_DIR.'inc/class.bellaacf.php';

if(!is_admin()) {
	(new BellaACF())::init();
}