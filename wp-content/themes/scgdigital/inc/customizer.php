<?php
/**
 * Twenty Nineteen: Customizer
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function twentynineteen_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'twentynineteen_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'twentynineteen_customize_partial_blogdescription',
			)
		);
	}
/**
 * Add our Header & Navigation Panel
 */
 $wp_customize->add_panel( 'Footer',
   array(
      'title' => __( 'Footer Setting' ),
      'description' => esc_html__( 'Add footer text' ), // Include html tags such as 
 
      'priority' => 160, // Not typically needed. Default is 160
      'capability' => 'edit_theme_options', // Not typically needed. Default is edit_theme_options
      'theme_supports' => '', // Rarely needed
      'active_callback' => '', // Rarely needed
   )
);
 $wp_customize->add_section( 'footer_text_section',
   array(
      'title' => __( 'Footer Text' ),
      'description' => esc_html__( '' ),
      'panel' => 'Footer', // Only needed if adding your Section to a Panel
      'priority' => 160, // Not typically needed. Default is 160
      'capability' => 'edit_theme_options', // Not typically needed. Default is edit_theme_options
      'theme_supports' => '', // Rarely needed
      'active_callback' => '', // Rarely needed
      'description_hidden' => 'false', // Rarely needed. Default is False
   )
);
 

$wp_customize->add_setting( 'footer_text',
   array(
      'default' => '',
      'transport' => 'refresh'
      
   )
);
 
 $wp_customize->add_control( 'footer_text',
   array(
      'label' => __( 'Footer Text' ),
      'description' => esc_html__( 'Text controls Type can be either text, email, url, number, hidden, or date' ),
      'section' => 'footer_text_section',
      'priority' => 10, // Optional. Order priority to load the control. Default: 10
      'type' => 'textarea', // Can be either text, email, url, number, hidden, or date
      'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
      'settings' => 'footer_text',
      ),
);

	

}
add_action( 'customize_register', 'twentynineteen_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function twentynineteen_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function twentynineteen_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Bind JS handlers to instantly live-preview changes.
 */
function twentynineteen_customize_preview_js() {
	wp_enqueue_script( 'twentynineteen-customize-preview', get_theme_file_uri( '/inc/js/customize-preview.js' ), array( 'customize-preview' ), '20181214', true );
}
add_action( 'customize_preview_init', 'twentynineteen_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function twentynineteen_panels_js() {
	wp_enqueue_script( 'twentynineteen-customize-controls', get_theme_file_uri( '/inc/js/customize-controls.js' ), array(), '20181214', true );
}
add_action( 'customize_controls_enqueue_scripts', 'twentynineteen_panels_js' );

