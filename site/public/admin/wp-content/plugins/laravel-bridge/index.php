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


	
	add_menu_page('Events', 'Events', 'edit_posts', 'cms_events', 'load_cms_events', 'dashicons-calendar-alt', 100 );
    //add_submenu_page('laravel-bridge/crud.php?object=events', 'Categories', 'Categories', 'edit_posts', 'laravel-bridge/crud.php?object=eventscategories' );
}



function add_custom_css() {
    ?>
    <style type="text/css">
        #preview-action {display: none !important;}
        #edit-slug-box  {display: none !important;}
    </style>
    <?php
}


add_action('admin_menu', 'modify_cms_menus');
add_action('admin_head', 'add_custom_css');
