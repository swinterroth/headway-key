<?php
/**
 * Plugin Name: Headway Admin Key
 * Plugin URI: http://frontandsocial.com
 * Description: This plugin was created to help secure your site design.
 * Version: 1.3.1
 * Author: Scott Winterroth
 * Author URI: http://frontandsocial.com
 * License: GPL2
 */


function remove_headway_page() {

    global $current_user;

    if($current_user->user_login != 'swinterroth')

    {
        
        remove_menu_page( 'headway-getting-started' );
        remove_menu_page( 'headway-options' );
        remove_menu_page( 'headway-visual-editor' );
        remove_menu_page( 'headway-tools' );
        remove_menu_page( 'pizazzwp' );
        remove_menu_page( 'wck-page' );
        
    }

}

add_action( 'admin_menu' , 'remove_headway_page', 999 );

function mytheme_admin_bar_render() {

	global $current_user;

	if($current_user->user_login != 'swinterroth')
	{
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('headway');
	}
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

function add_styles() {
    global $current_user;
   
    if($current_user->user_login != 'swinterroth') {

        ?>

        <style type="text/css">

        .hw-visual-editor { display: none; }

        #headway-open-in-ve-btn { display: none; }

    </style>


        <?php

    }
}

    add_action('admin_head', 'add_styles');
