/* global expect, test */

/**
 * External dependencies
 */
import { create as createTestRenderer } from 'react-test-renderer';

/**
 * WordPress dependencies
 */
import { RichText } from '@wordpress/block-editor';

import Save from 'src/block/rich-text/save';

test(
	'adds 1 + 2 to equal 3',
	() => {
		expect(
			1 + 2
		).toBe( 3 );
	}
);

// @see https://jestjs.io/docs/en/tutorial-react
test( 'renders RichText from WordPress components', () => {
	const testRenderer = createTestRenderer( <RichText.Content value="hi" /> );

	expect( testRenderer.toJSON() ).toMatchSnapshot();
} );

test( 'renders our Save component', () => {
	const attributes = {
		content: 'My content',
	};
	const testRenderer = createTestRenderer(
		<Save
			attributes={attributes}
			className="my-class"
		/>
	);

	expect( testRenderer.toJSON() ).toMatchSnapshot();
} );
