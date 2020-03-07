/**
 * WP dependencies
 */
const {
	editor: {
		RichText,
	},
} = wp;

const Save = ( props ) => {
	const {
		attributes: {
			content,
		},
		className,
	} = props;

	return (
		<RichText.Content
			className={ className }
			tagName="p"
			value={ content }
		/>
	);
};

export default Save;
