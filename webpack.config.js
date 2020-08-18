/**
 * Additional Webpack settings on top of WP Scripts.
 *
 * Conditionally include `src/frontend.js` into webpack.
 *
 * @link https://developer.wordpress.org/block-editor/packages/packages-scripts/#provide-your-own-webpack-config
 *
 * @package WebDevStudios\BlockStarter
 */

/**
 * Internal Dependencies.
 */
const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const glob = require( 'glob' );

/**
 * External Dependencies.
 */
const IgnoreEmitPlugin = require( 'ignore-emit-webpack-plugin' );

const entry = {
	...defaultConfig.entry,
};

const frontendScript = glob.sync( './src/frontend.js' );
if ( frontendScript.length ) {
	entry.frontend = frontendScript;
}

module.exports = {
	...defaultConfig,
	entry,
	plugins: [
		...defaultConfig.plugins,
		new IgnoreEmitPlugin( [
			'frontend.asset.php',
		] ),
	],
};
