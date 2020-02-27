// https://www.npmjs.com/package/@wordpress/eslint-plugin
module.exports = {
	"globals": { "wp": true },
	"extends": [
		"plugin:@wordpress/eslint-plugin/esnext",
		"plugin:@wordpress/eslint-plugin/react",
		"plugin:@wordpress/eslint-plugin/recommended"
	]
}