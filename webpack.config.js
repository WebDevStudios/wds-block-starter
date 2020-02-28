const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const path = require( 'path' );

const { CleanWebpackPlugin } = require( 'clean-webpack-plugin' );
const MiniCssExtractPlugin = require( 'mini-css-extract-plugin' );
const IgnoreEmitPlugin = require( 'ignore-emit-webpack-plugin' );

module.exports = {
	...defaultConfig,
	entry: {
		...defaultConfig.entry,
		css: path.resolve( process.cwd(), 'src', 'css.js' ),
	},
	optimization: {
		namedChunks: true,
		namedModules: true,
		splitChunks: {
			cacheGroups: {
				styles: {
					name: 'style',
					test: /style\.(sa|sc|c)ss$/,
					chunks: 'all',
					enforce: true,
				},
				editor: {
					name: 'editor',
					test: /editor\.(sa|sc|c)ss$/,
					chunks: 'all',
					enforce: true,
				},
			},
		},
	},
	module: {
		...defaultConfig.module,
		rules: [
			...defaultConfig.module.rules,
			{
				test: /\.(sa|sc|c)ss$/,
				use: [
					{
						loader: MiniCssExtractPlugin.loader,
						options: {
							hmr: 'development' === process.env.NODE_ENV,
						},
					},
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
		new IgnoreEmitPlugin( [ 'index.asset.php', 'css.asset.php', 'css.js', 'css.js.map', 'style.js', 'editor.js' ] ),
	],
};
