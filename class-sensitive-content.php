<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Sensitive_Content {

	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'senstive_content_enqueue_styles' ), 10 );
		add_action( 'enqueue_block_editor_assets', array( $this, 'senstive_content_enqueue_editor_styles' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'sensitive_content_block_variation' ) );
		add_filter( 'render_block', array( $this, 'sensitive_content_add_warning_filter' ), 10, 3 );
	}

	public function senstive_content_enqueue_styles() {
		wp_enqueue_script(
			'sensitive-content-frontend-js',
			plugins_url( '/js/frontend.js', __FILE__ ),
			array(),
			filemtime( plugin_dir_path( __FILE__ ) . '/js/frontend.js' ),
			true
		);

		wp_enqueue_style(
			'sensitive-content-frontend-css',
			plugins_url( '/css/style.css', __FILE__ ),
		);
	}

	public function senstive_content_enqueue_editor_styles() {
		wp_enqueue_style(
			'sensitive-content-editor-css',
			plugins_url( '/css/editor.css', __FILE__ ),
			array( 'wp-edit-blocks' )
		);
	}

	public function sensitive_content_block_variation() {
		wp_enqueue_script(
			'sensitive_content_image_block_variation',
			plugins_url( '/js/sensitive_image.js', __FILE__ ),
			array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ),
			filemtime( plugin_dir_path( __FILE__ ) . '/js/sensitive_image.js' ),
			true
		);

		wp_enqueue_script(
			'sensitive_content_video_block_variation',
			plugins_url( '/js/sensitive_video.js', __FILE__ ),
			array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ),
			filemtime( plugin_dir_path( __FILE__ ) . '/js/sensitive_video.js' ),
			true
		);
	}


	public function sensitive_content_add_warning_filter( string $block_content, array $block, WP_Block $instance ) {

		$allowed_blocks = array(
			'core/image',
			'core/video',
		);

		if ( in_array( $block['blockName'], $allowed_blocks, true ) && false !== strpos( $block['attrs']['className'], 'content-warning' ) ) {

			$find = '</figure>';

			$replace = '
				<span class="content-warning">
					<p><strong>' . esc_html__( 'Content Warning: Sensitive Content', 'sensitivecontent' ) . '</strong></p>
					<p>' . esc_html__( 'This content has been flagged as sensitive, click to view.', 'sensitivecontent' ) . '</p>
				</span>
			';

			$block_content = str_replace( $find, $replace . $find, $block_content );
		}
		return $block_content;
	}

}
new Sensitive_Content();
