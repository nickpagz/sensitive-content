wp.domReady( function() {
	wp.blocks.registerBlockVariation (
		'core/video', {
		name: 'sensitive-video',
		title: 'Sensitive Video',
		description: 'Mask sensitive videos with a content warning message.',
		icon: 'hidden',
		scope: 'inserter',
		attributes: {
			className: 'is-style-content-warning'
		}
	}
	);
} );

