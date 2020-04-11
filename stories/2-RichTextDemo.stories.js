import React from 'react';
import { action } from '@storybook/addon-actions';
import { Button } from '@storybook/react/demo';

// Title of section.
export default {
	title: 'RichText Block',
	component: Button,
};

export const Text = () => <Button onClick={ action( 'clicked' ) }>Hello Button</Button>;

export const Emoji = () => (
	<Button onClick={ action( 'clicked' ) }>Click Me</Button>
);
