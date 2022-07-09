<?php
/*
 * Plugin Name: Sensitive Content
 * Plugin URI: https://wpspecialprojects.wordpress.com/
 * Description: Adds a sensitive content warning on images and videos.
 * Version: 0.1
 * Author: Team 51
 * Author URI: https://wpspecialprojects.wordpress.com/
 * License: GPLv3
 * Text Domain: sensitivecontent
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/*
 * Required functions
 */
require_once plugin_dir_path( __FILE__ ) . 'class-sensitive-content.php';
