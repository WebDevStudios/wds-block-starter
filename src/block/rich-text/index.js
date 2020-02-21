/**
 * BLOCK: Flash Headlines
 *
 * Register Flash Headlines
 */
import edit from './edit';
import save from './save';

/**
 * WordPress dependencies.
 */
const {
	i18n: {
		__,
	},
	blocks: {
		registerBlockType,
	}
} = wp;

registerBlockType( 'wdsbs/flash-headlines', {
	title: __( 'RichText Demo', 'dj-wp-flash-headlines' ),
	icon: 'edit',
	category: 'common',
	keywords: [
		__( 'richtext', 'wds' ),
	],
	supports: {
		multiple: false,
	},
	attributes: {
		content: {
		type: 'array',
		source: 'children',
		selector: 'p',
		},
	},
	edit,
	save,
});