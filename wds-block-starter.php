<?php
/**
 * Plugin Name: WDS Block Starter
 * Plugin URI:  https://github.com/WebDevStudios/wds-block-starter
 * Description: A starter plugin for Gutenberg blocks development.
 * Author: WebDevStudios
 * Author URI: https://webdevstudios.com
 * Version:     0.0.1
 * License:     GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: wdsbs
 * Domain Path: /languages
 *
 * @package WebDevStudios\BlockStarter
 * @since 0.0.1
 */

namespace WebDevStudios\BlockStarter;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Register the block with WordPress.
 *
 * @author WebDevStudios
 * @since 0.0.1
 */
function register_block() {

	// Register editor script.
	wp_register_script(
		'wdsbs-editor-script',
		plugins_url( 'build/index.js', __FILE__ ),
		[ 'wp-editor' ],
		filemtime( plugin_dir_path( __FILE__ ) . 'build/index.js' ),
		true
	);

	// Register editor style.
	wp_register_style(
		'wdsbs-editor-style',
		plugins_url( 'build/editor.css', __FILE__ ),
		[ 'wp-edit-blocks' ],
		filemtime( plugin_dir_path( __FILE__ ) . 'build/editor.css' )
	);

	// Register frontend style.
	wp_register_style(
		'wdsbs-style',
		plugins_url( 'build/style.css', __FILE__ ),
		[],
		filemtime( plugin_dir_path( __FILE__ ) . 'build/style.css' )
	);

	// Register block with WordPress.
	register_block_type( 'wdsbs/rich-text-demo', array(
		'editor_script' => 'wdsbs-editor-script',
		'editor_style'  => 'wdsbs-editor-style',
		'style'         => 'wdsbs-style',
	) );
}
add_action( 'init', 'WebDevStudios\BlockStarter\register_block' );
