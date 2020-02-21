<?php
/**
 * Example service which registers a collection of custom WordPress editor blocks.
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @since   2020-02-03
 * @package WebDevStudios\OopsWPDemo\BlockEditor
 */

namespace WebDevStudios\OopsWPDemo\BlockEditor;

use WebDevStudios\OopsWP\Structure\Editor\EditorBlockInterface;
use WebDevStudios\OopsWP\Structure\Service;
use WebDevStudios\OopsWP\Utility\FilePathDependent;
use WebDevStudios\OopsWPDemo\BlockEditor\Block\BlockLibrary;

/**
 * Class BlockRegistrar
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @since   2020-02-03
 * @package WebDevStudios\OopsWPDemo\BlockEditor
 */
class BlockRegistrar extends Service {
	use FilePathDependent;

	/**
	 * Editor blocks registered by this service.
	 *
	 * @var array
	 * @since 2020-02-03
	 */
	private $blocks = [
		BlockLibrary::class,
	];

	/**
	 * Register this service with WordPress.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-02-03
	 */
	public function register_hooks() {
		add_action( 'init', [ $this, 'register_blocks' ] );
	}

	/**
	 * Hook callback to register blocks with the editor.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-02-03
	 */
	public function register_blocks() {
		foreach ( $this->blocks as $block_class ) {
			$block = new $block_class();
			$this->register_block( $block );
		}
	}

	/**
	 * Register an editor block with WordPress.
	 *
	 * @param EditorBlockInterface $block An object instance.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-02-03
	 */
	private function register_block( EditorBlockInterface $block ) {
		/*
		 * @TODO Update this when EditorBlock is updated. `set_file_path` should be part of the interface.
		 */
		if ( in_array( FilePathDependent::class, class_uses( $block ), true ) ) {
			$block->set_file_path( $this->file_path );
		}

		$block->register();
	}
}
