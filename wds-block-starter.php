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
 * @package WebDevStudios\BlockLibrary
 * @since 0.0.1
 */

namespace WebDevStudios\BlockStater;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Enqueue files.
require plugin_dir_path( __FILE__ ) . '/inc/enqueue-scripts.php';
