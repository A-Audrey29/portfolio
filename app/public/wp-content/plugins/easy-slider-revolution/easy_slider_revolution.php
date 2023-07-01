<?php
/**
 * Plugin Name: Easy Slider Revolution
 * Plugin URI: https://wordpress.org/plugins/easy-slider-revolution
 * Description: Easy Slider Revolution allows you to create a slider with text, HTML, shortcodes and customized button.  
 * Version: 1.0.0
 *
 * @package     easy_slider_revolution
 * @author      Trident Technolabs
 * @copyright   https://tridenttechnolabs.com
 * @license     GPLv2 or later
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // EXIT IF ACCESSED DIRECTLY.
}

// SET CONSTANT FOR PLUGIN PATH.
define( 'ESRCPT_PLUGIN_PATH',  plugins_url( '/', __FILE__ ) );

require 'admin/easy-slider-admin.php';
require 'front/easy-slider-frontend.php';

/* ##### PLUGIN ACTIVATION HOOK ##### */
register_activation_hook( __FILE__, 'esrcpt_slider_plugin_activation' );

/* ##### ADD ACTION HOOKS & FILTERS FOR PLUGIN ##### */
add_action( 'admin_enqueue_scripts', 'esrcpt_slider_register_admin_scripts', 999999 );
add_action( 'init', 'esrcpt_slider_register' );
add_action( 'post_row_actions', 'esrcpt_slider_row_actions', 10, 2 );
add_action( 'add_meta_boxes', 'esrcpt_slider_add_meta_boxes' );
add_action( 'save_post', 'esrcpt_slider_save_postdata' );
add_filter( 'manage_es_slider_posts_columns', 'esrcpt_slider_modify_columns' );
add_filter( 'manage_es_slider_posts_custom_column', 'esrcpt_slider_custom_column_content' );
if ( ! get_option( 'sa-disable-tinymce-button' ) ) {
	add_action( 'admin_head', 'esrcpt_slider_add_tinymce_button' );
	add_action( 'admin_footer', 'esrcpt_slider_get_tinymce_shortcode_array', 9999999 );
}
add_action( 'admin_menu', 'esrcpt_slider_extra_sa_menu_pages' );
add_filter( 'wp_kses_allowed_html', 'esrcpt_slider_allow_iframes_filter' );
