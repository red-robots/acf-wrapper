<?php
/**
 * Created by PhpStorm.
 * User: fritz
 * Date: 3/17/17
 * Time: 2:06 PM
 */

class BellaACFWrapper {
	public function set($post_object){
		global $wpdb;
		if(!$post_object->ID) return;
		$query  = "SELECT DISTINCT post_excerpt AS `key` FROM $wpdb->posts WHERE post_type ='acf-field' ";
		$results = $wpdb->get_results( $query );
		foreach($results as $result){
			$key = $result->key;
			$value = get_field($key,$post_object->ID);
			$value = $value ? $value:"";
			$this->$key = $value;
		}
	}
}