<?php
/**
 * Example implementation of an EditorBlock structure.
 *
 * @TODO Though this is being written against the current 0.3.0, EditorBlock has an open PR.
 *       This block will require a refactor when the new release is ready, as its goal is to simplify the block
 *       registration process.
 *
 * It should seem fairly obvious by examining this example block that there's significant refactoring work to be done
 *       in the next release. If one of the main goals for the OOPS-WP library is to streamline some of the scaffolding
 *       process for common WordPress structures, then there's too much to remember in terms of telling WordPress
 *       where a block's assets are located and how/when they should be hooked up.
 *
 *       Stay tuned for a rewrite of this example to correspond with the next release.
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @since   2020-02-03
 * @package WebDevStudios\BlockLibrary\BlockEditor\Block
 */

namespace WebDevStudios\BlockLibrary\BlockEditor\Block;

use WebDevStudios\OopsWP\Structure\Editor\EditorBlock;
use WebDevStudios\OopsWP\Utility\FilePathDependent;

/**
 * Class BlockLibrary
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @since   2020-02-03
 * @package WebDevStudios\BlockLibrary\BlockEditor\Block
 */
class BlockLibrary extends EditorBlock {
	use FilePathDependent;

	/**
	 * The name of the block.
	 *
	 * @var string
	 * @since 2020-02-03
	 */
	private $block_name = 'wdsbs/block-library';

	/**
	 * Helper method to convert the block name to an asset prefix.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-02-03
	 * @return string
	 */
	private function get_block_asset_prefix() {
		return str_replace( '/', '-', $this->block_name ) . '-';
	}

	/**
	 * Register the BlockLibrary script.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-02-03
	 */
	public function register_script() {
		wp_enqueue_script(
			"{$this->get_block_asset_prefix()}script",
			plugin_dir_url( $this->file_path ) . 'build/index.js',
			[
				'wp-editor',
				'wp-blocks',
			],
			filemtime( plugin_dir_path( $this->file_path ) . 'build/index.js' ),
			true
		);
	}

	/**
	 * Register the BlockLibrary styles.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-02-03
	 */
	public function register_style() {
		$styles = [
			plugin_dir_path( $this->file_path ) . 'build/editor.css',
			plugin_dir_path( $this->file_path ) . 'build/style.css',
		];

		foreach ( $styles as $style ) {
			if ( ! is_readable( $style ) ) {
				continue;
			}

			wp_enqueue_style(
				"{$this->get_block_asset_prefix()}editor-style",
				plugin_dir_url( $this->file_path ) . 'build/editor.css',
				[],
				filemtime( $style ),
				false
			);
		}
	}

	/**
	 * Register the block type.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-02-03
	 */
	public function register_type() {
		$prefix = $this->get_block_asset_prefix();

		register_block_type(
			$this->block_name,
			[
				'editor_script' => "{$prefix}script",
				'editor_style'  => "{$prefix}editor-style",
				'style'         => "{$prefix}frontend-style",
			]
		);
	}
}
