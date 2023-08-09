<?php
/**
 * Plugin Name: Belov Blocks
 * Plugin URI: https://github.com/Dapo-Obembe
 * Author: Dapo Obembe
 * Author URI: https://github.com/Dapo-Obembe
 * Description: Just a random block.
 * Version: 0.1.0
 * License: GPL2
 * License URL: https://www.gnu.org/licenses/gpl-2.0.txt
 * text-domain: belov-blocks
 *
 * @package @belovdigital
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'init', 'register_belov_blocks' );

/**
 * Register blocksfunction
 *
 * @return void
 */
function register_belov_blocks() {
	register_block_type( __DIR__ . './blocks/france', array(), '1.0.0', 'all' );

}

/**
 * Register block styles
 */
function register_custom_block_style() {
	wp_register_style( 'france-block-css', plugin_dir_url( __FILE__ ) . 'assets/css/blocks.css', array(), '1.0.0', 'all' );
}
add_action( 'init', 'register_custom_block_style' );


/**
 * Enqueue styles function
 *
 * @return void
 */
function enqueue_custom_block_css() {
	wp_enqueue_style( 'france-block-css' );
}
add_action( 'enqueue_block_assets', 'enqueue_custom_block_css' );
