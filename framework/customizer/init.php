<?php
/**
 * sprouts Theme Customizer
 *
 * @package sprouts
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function sprouts_customize_register( $wp_customize ) {

}
add_action( 'customize_register', 'sprouts_customize_register' );

require_once get_template_directory().'/framework/customizer/_miscscripts.php';
require_once get_template_directory().'/framework/customizer/_sanitization.php';
require_once get_template_directory().'/framework/customizer/skins.php';
require_once get_template_directory().'/framework/customizer/slider.php';
require_once get_template_directory().'/framework/customizer/_googlefonts.php';
require_once get_template_directory().'/framework/customizer/_layouts.php';
require_once get_template_directory().'/framework/customizer/social-icons.php';
require_once get_template_directory().'/framework/customizer/_custom_css.php';
require_once get_template_directory().'/framework/customizer/_customizer_controls.php';


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function sprouts_customize_preview_js() {
    wp_enqueue_script( 'sprouts_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'sprouts_customize_preview_js' );
