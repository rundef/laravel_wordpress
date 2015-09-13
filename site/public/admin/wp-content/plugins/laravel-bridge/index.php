<?php
/*
Plugin Name: 	laravel-bridge
Description: 	A laravel bridge plugin to load Laravel within Wordpress and add admin pages.
Author:      	Mickael Burguet
Author URI:  	http://rundef.com
Version: 		1.0
*/

if (!defined('ABSPATH')) {
	die('Access denied.');
}

require_once __DIR__.'/init-laravel.php';




function wordpress_init() {
    $role = get_role('administrator');
    $role->add_cap('edit_cms_events');
}


function load_cms_events() {
	init_laravel('/cms/events');
}

function modify_cms_menus() {
	//remove_menu_page( 'index.php' );                  //Dashboard
	//remove_menu_page( 'edit.php' );                   //Posts
	//remove_menu_page( 'upload.php' );                 //Media
	//remove_menu_page( 'edit.php?post_type=page' );    //Pages
	//remove_menu_page( 'edit-comments.php' );          //Comments
	//remove_menu_page( 'themes.php' );                 //Appearance
	//remove_menu_page( 'plugins.php' );                //Plugins
	//remove_menu_page( 'users.php' );                  //Users
	//remove_menu_page( 'tools.php' );                  //Tools
	//remove_menu_page( 'options-general.php' );        //Settings


	
	if (current_user_can('edit_cms_events')) {
		add_menu_page('Events', 'Events', 'edit_posts', 'cms_events', 'load_cms_events', 'dashicons-calendar-alt', 100);
	}
}



function add_custom_css() {
    ?>
    <style type="text/css">
        #preview-action {display: none !important;}
        #edit-slug-box  {display: none !important;}
    </style>
    <?php
}



function tweaked_admin_bar() {
	global $wp_admin_bar;
	
	$wp_admin_bar->add_menu([
        'parent'   => 'new-content',
        'id'       => 'new-event',
        'title'    => __( 'Event' ),
        'href'     => 'admin.php?page=cms_events&path='.urlencode('/cms/event/create')
    ]);
}


add_action('admin_init', 'wordpress_init');
add_action('admin_menu', 'modify_cms_menus');
add_action('admin_head', 'add_custom_css');
add_action('wp_before_admin_bar_render', 'tweaked_admin_bar'); 
