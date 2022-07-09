wp.domReady( function() {
	wp.blocks.registerBlockVariation (
		'core/image', {
		name: 'sensitive-image',
		title: 'Sensitive Image',
		description: 'Mask sensitive images with a content warning message.',
		icon: 'hidden',
		scope: 'inserter',
		attributes: {
			className: 'is-style-content-warning'
		}
	}
	);
} );

