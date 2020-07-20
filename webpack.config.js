/**
 * Internal Dependencies.
 */
const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const glob = require( 'glob' );

/**
 * External Dependencies.
 */
const { CleanWebpackPlugin } = require( 'clean-webpack-plugin' );
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
	module: {
		...defaultConfig.module,
	},
	plugins: [
		...defaultConfig.plugins,
		new CleanWebpackPlugin(),
		new IgnoreEmitPlugin( [
			'frontend.asset.php',
		] ),
	],
};
