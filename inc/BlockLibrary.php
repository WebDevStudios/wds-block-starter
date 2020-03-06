<?php
/**
 * The main class file.
 *
 * This example demonstrates how the main plugin class file can set up a collection of Service objects which
 * control a distinct set of responsibilities - e.g., the job of the ContentRegistrar is to register post types,
 * taxonomies, and shortcodes, and the job of the NavigationRegistrar is to set up custom menu navigation elements.
 *
 * As recent as version 0.3.0, OOPS-WP considers the Plugin class to be a separate implementation of a ServiceRegistrar,
 * as it's possible something that is deeper in the plugin architecture may register its own set of services. The Plugin
 * abstract at some point in the future may gain additional functionality, such as the ability to process the values
 * in the main plugin file.
 *
 * Each Service class implements the Hookable interface, which means that the Service objects themselves are what
 * register the individual structures with WordPress. This allows us to keep, for instance, all of the values pertinent
 * to a PostType registration within that PostType class itself, while the Service is what calls its `register` method.
 *
 * @see \WebDevStudios\OopsWP\Structure\Plugin\Plugin
 * @see \WebDevStudios\OopsWP\Structure\Plugin\PluginInterface
 * @see \WebDevStudios\OopsWP\Structure\Plugin\Plugin::register_services()
 * @see \WebDevStudios\OopsWP\Structure\ServiceRegistrar
 * @see \WebDevStudios\OopsWP\Structure\Service
 * @see \WebDevStudios\OopsWP\Utility\Hookable
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @since   2020-01-31
 * @package WebDevStudios\OopsWPDemo
 */

namespace WebDevStudios\BlockLibrary;

use WebDevStudios\OopsWP\Structure\Plugin\Plugin;
use WebDevStudios\BlockLibrary\BlockEditor\BlockRegistrar;

/**
 * Class OopsWPDemo
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @since   2020-01-31
 * @package WebDevStudios\OopsWPDemo
 */
class BlockLibrary extends Plugin {
	/**
	 * OopsWPDemo constructor.
	 *
	 * @param string $file_path The plugin file path.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-01-31
	 */
	public function __construct( $file_path ) {
		$this->file_path = $file_path;
	}

	/**
	 * Services that this plugin registers.
	 *
	 * @var array
	 * @since 0.1.0
	 */
	protected $services = [
		BlockRegistrar::class,
	];

	/**
	 * Register this plugin's services.
	 *
	 * Note: in standard implementations, there's no need to declare this function inside of your main plugin file,
	 * as it gets called automatically by the parent ServiceRegistrar class.
	 *
	 * That said, in your custom implementation, it's possible you might be using something like a Dependency Injection
	 * container in order to create your Service classes. Those Services might have parameters in their constructors,
	 * or there may just be something else necessary for you to process at the time the services get registered. As
	 * such, the `register_services` method has protected visibility so you can define that customization here. We've
	 * extended the method here primarily for demonstration purposes to let you know that it is possible.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2020-02-03
	 */
	protected function register_services() { // phpcs:ignore
		parent::register_services();
	}
}
