<?php
/**
 * @package wp-widget-1
 * @version 1.0
 */
/*
Plugin Name: wp-widget-1
Plugin URI: http://localhost
Description: This is my first wordpress widget
Author: Michael Hsia
Version: 1.0
Author URI: http://TBD
*/


// Go here to see all the actions and filers
// https://codex.wordpress.org/Plugin_API/Action_Reference
// https://codex.wordpress.org/Plugin_API/Filter_Reference
// https://developer.wordpress.org/reference/

require_once (dirname(__FILE__).'/include/adminUI.php');

function head_str() {
	echo "<h1 style='color:" .  get_option('wp-widget-1-color') . ";'>This is first testing text!<h1>";
}

function die_now () {
	// die: This is die the process
	die('You\'re saving the post!');
}

function var_str($var) {
//function var_str($var, $id) {
	echo $var . "-- Created by my wordpress.";
	// echo $id. " of " .$var . "-- Created by my wordpress.";
}

function add_class($class) {
	$class[] = 'widget_practice';
	return $class;
}

/* Hook: To define when your function should be excuted.
	add_action
	add_filter: Add_filter can edit data, but not add_action
*/
// add_action('admin_footer','head_str');  // This is a hook. That bind action to layout
add_action('admin_head','head_str');
// add_action('wp_loaded','head_str');
// add_action('the_post','head_str');
// add_action('save_post','die_now');	// This is an action that happens only in seconds

//__________________________________________________________
// filter testing
// add_filter('the_title', 'var_str', 10, 2);
add_filter('the_content', 'var_str', 10, 1);
add_filter('body_class', 'add_class');	// Add another class to the body 
?>