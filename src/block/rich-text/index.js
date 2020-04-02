/**
 * REGISTER: Rich Text Block.
 */
import edit from './edit';
import save from './save';

import { __ } from '@wordpress/i18n';
import { registerBlockType } from '@wordpress/blocks';

registerBlockType( 'wdsbs/rich-text-demo', {
	title: __( 'RichText Block', 'wdsbs' ),
	icon: 'edit',
	category: 'common',
	keywords: [
		__( 'richtext', 'wdsbs' ),
	],
	attributes: {
		content: {
			type: 'array',
			source: 'children',
			selector: 'p',
		},
	},
	edit,
	save,
} );
