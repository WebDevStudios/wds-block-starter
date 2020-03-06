/**
 * Internal Dependencies.
 */
const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );

/**
 * External Dependencies.
 */
const { CleanWebpackPlugin } = require( 'clean-webpack-plugin' );
const MiniCssExtractPlugin = require( 'mini-css-extract-plugin' );
const IgnoreEmitPlugin = require( 'ignore-emit-webpack-plugin' );

module.exports = {
	...defaultConfig,
	entry: {
		...defaultConfig.entry,
	},
	module: {
		...defaultConfig.module,
		rules: [
			...defaultConfig.module.rules,
			{
				test: /\.(sa|sc|c)ss$/,
				use: [
					{ loader: MiniCssExtractPlugin.loader },
					{ loader: 'css-loader', options: { importLoaders: 1 } },
					'postcss-loader',
				],
			},
		],
	},
	plugins: [
		...defaultConfig.plugins,
		new CleanWebpackPlugin(),
		new MiniCssExtractPlugin( {
			filename: '[name].css',
			chunkFilename: '[id].css',
		} ),
		new IgnoreEmitPlugin( [ 'index.asset.php' ] ),
	],
};
