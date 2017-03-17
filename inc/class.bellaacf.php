<?php
/**
 * Created by PhpStorm.
 * User: fritz
 * Date: 3/17/17
 * Time: 1:46 PM
 */

class BellaACF {
	private static $initialized = false;

	public static function init(){
		if(!self::$initialized){
			self::initialize_hooks();
			self::$initialized = true;
		}
	}
	public static function initialize_hooks(){
		add_action( 'init',array('BellaACF','initialize_wrapper'));
		add_action( 'the_post', array('BellaACF','set_wrapper'));
	}
	public static function initialize_wrapper(){
		require_once BELLAACF_PLUGIN_DIR.'inc/class.bellaacfwrapper.php';
		$GLOBALS['bellaacf'] = new BellaACFWrapper();
	}
	public static function set_wrapper( $post_object ) {
		global $post;
		$GLOBALS['bellaacf']->set($post_object);
		$post->bellaacf = $GLOBALS['bellaacf'];
		return $post_object;
	}
}