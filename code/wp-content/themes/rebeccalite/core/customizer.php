<?php
function rebeccalite_sanitize_default( $input ){
    return $input;
}

//radio box sanitization function
function rebeccalite_sanitize_radio( $input, $setting ){

    //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
    $input = sanitize_key($input);

    //get the list of possible radio box options
    $choices = $setting->manager->get_control( $setting->id )->choices;

    //return input if valid or return default option
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function rebeccalite_sanitize_checkbox( $checked ) {
	return ( isset($checked) ? 1 : 0 );
}

function rebeccalite_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

function rebeccalite_sanitize_select( $input, $setting ) {

	// Ensure input is a slug.
	$input = sanitize_key( $input );

	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/** RebeccaLite - Customizer - Add Settings */
function rebeccalite_theme_customizer( $wp_customize ) {
    /**
     * Colors
     */
    $wp_customize->add_setting( 'rebeccalite_primary_color', array( 'default' => '#212121', 'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_setting( 'rebeccalite_text_color', array( 'default' => '#363636', 'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_setting( 'rebeccalite_accent_color', array( 'default' => '#eab6a2', 'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_setting( 'rebeccalite_meta_color', array( 'default' => '#666', 'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_setting( 'rebeccalite_boder_color', array( 'default' => '#ddd', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rebeccalite_primary_color',
			array(
				'label'      => __( 'Primary Color', 'rebeccalite' ),
				'section'    => 'colors'
			)
		)
	);

    $wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rebeccalite_text_color',
			array(
				'label'      => __( 'Text Color', 'rebeccalite' ),
				'section'    => 'colors'
			)
		)
	);

    $wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rebeccalite_accent_color',
			array(
				'label'      => __( 'Accent Color', 'rebeccalite' ),
				'section'    => 'colors'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rebeccalite_meta_color',
			array(
				'label'      => __( 'Meta Color', 'rebeccalite' ),
				'section'    => 'colors'
			)
		)
	);

    $wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rebeccalite_boder_color',
			array(
				'label'      => __( 'Boder Color', 'rebeccalite' ),
				'section'    => 'colors'
			)
		)
	);

    /**
     * Social Media settings
     */
    $wp_customize->add_section( 'rebeccalite_section_social_media', array( 'title' => __( 'Social Media Settings', 'rebeccalite' ) ) );

    $wp_customize->add_setting( 'rebeccalite_facebook', array( 'default'=> '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_setting( 'rebeccalite_twitter', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_setting( 'rebeccalite_instagram', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_setting( 'rebeccalite_pinterest', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_setting( 'rebeccalite_youtube', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_setting( 'rebeccalite_tumblr', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_setting( 'rebeccalite_bloglovin', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_setting( 'rebeccalite_dribbble', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_setting( 'rebeccalite_soundcloud', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_setting( 'rebeccalite_vimeo', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_setting( 'rebeccalite_linkedin', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rebeccalite_facebook', array(
	   'label'     => __( 'Facebook URL', 'rebeccalite' ),
	   'section'   => 'rebeccalite_section_social_media'
	)));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'rebeccalite_twitter',
			array(
				'label'      => __( 'Twitter URL', 'rebeccalite' ),
				'section'    => 'rebeccalite_section_social_media'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'rebeccalite_instagram',
			array(
				'label'      => __( 'Instagram URL', 'rebeccalite' ),
				'section'    => 'rebeccalite_section_social_media'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'rebeccalite_pinterest',
			array(
				'label'      => __( 'Pinterest URL', 'rebeccalite' ),
				'section'    => 'rebeccalite_section_social_media'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'rebeccalite_youtube',
			array(
				'label'      => __( 'Youtube URL', 'rebeccalite' ),
				'section'    => 'rebeccalite_section_social_media'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'rebeccalite_tumblr',
			array(
				'label'      => __( 'Tumblr URL', 'rebeccalite' ),
				'section'    => 'rebeccalite_section_social_media'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'rebeccalite_bloglovin',
			array(
				'label'      => __( 'Bloglovin URL', 'rebeccalite' ),
				'section'    => 'rebeccalite_section_social_media'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'rebeccalite_dribbble',
			array(
				'label'      => __( 'Dribbble URL', 'rebeccalite' ),
				'section'    => 'rebeccalite_section_social_media'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'rebeccalite_soundcloud',
			array(
				'label'      => __( 'SoundCloud URL', 'rebeccalite' ),
				'section'    => 'rebeccalite_section_social_media'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'rebeccalite_vimeo',
			array(
				'label'      => __( 'Vimeo URL', 'rebeccalite' ),
				'section'    => 'rebeccalite_section_social_media'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'rebeccalite_linkedin',
			array(
				'label'      => __( 'LinkedIn URL', 'rebeccalite' ),
				'section'    => 'rebeccalite_section_social_media'
			)
		)
	);

    /**
     * Footer settings
     */
    $wp_customize->add_section( 'rebeccalite_section_footer', array( 'title' => __( 'Footer Settings', 'rebeccalite' ) ) );

    $wp_customize->add_setting( 'rebeccalite_footer_copyright', array( 'default' => __( 'Your copyright text here !', 'rebeccalite' ), 'sanitize_callback' => 'wp_kses_post' ));
    $wp_customize->add_setting( 'rebeccalite_footer_bg_color', array( 'default' => '#eab6a2', 'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_setting( 'rebeccalite_footer_text_color', array( 'default' => '#363636', 'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_setting( 'rebeccalite_footer_icon_color', array( 'default' => '#212121', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'rebeccalite_footer_copyright',
			array(
				'label'      => __( 'Copyright Text', 'rebeccalite' ),
				'section'    => 'rebeccalite_section_footer',
				'type'		 => 'textarea'
			)
		)
	);

    $wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rebeccalite_footer_bg_color',
			array(
				'label'      => __( 'Footer Background Color', 'rebeccalite' ),
				'section'    => 'rebeccalite_section_footer'
			)
		)
	);

    $wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rebeccalite_footer_text_color',
			array(
				'label'      => __( 'Footer Text Color', 'rebeccalite' ),
				'section'    => 'rebeccalite_section_footer'
			)
		)
	);

    $wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rebeccalite_footer_icon_color',
			array(
				'label'      => __( 'Footer Icon Color', 'rebeccalite' ),
				'section'    => 'rebeccalite_section_footer'
			)
		)
	);
}

add_action( 'customize_register', 'rebeccalite_theme_customizer' );

/**
 * Inline style
 */
function rebeccalite_inline_style() {
    $custom_css = '';
    /**
     * Colors
     */
    if ( get_theme_mod( 'rebeccalite_primary_color' ) ) {
        $custom_css .= '
            :root {
                --primary-color: ' . esc_attr( get_theme_mod( 'rebeccalite_primary_color' ) ) . ';
            }';
    }

    if ( get_theme_mod( 'rebeccalite_text_color' ) ) {
        $custom_css .= '
            :root{
                --text-color: ' . esc_attr( get_theme_mod( 'rebeccalite_text_color' ) ) . ';
            }';
    }

    if ( get_theme_mod( 'rebeccalite_accent_color' ) ) {
        $custom_css .= '
            :root{
                --accent-color: ' . esc_attr( get_theme_mod( 'rebeccalite_accent_color' ) ) . ';
            }';
    }

    if ( get_theme_mod( 'rebeccalite_meta_color' ) ) {
        $custom_css .= '
            :root{
                --meta-color: ' . esc_attr( get_theme_mod( 'rebeccalite_meta_color' ) ) . ';
            }';
    }

    if ( get_theme_mod( 'rebeccalite_boder_color' ) ) {
        $custom_css .= '
            :root{
                --boder-color: ' . esc_attr( get_theme_mod( 'rebeccalite_boder_color' ) ) . ';
            }';
    }

    /**
     * Footer
     */
    if ( get_theme_mod( 'rebeccalite_footer_bg_color' ) ) {
        $custom_css .= '
            .credits {
                background-color: ' . esc_attr( get_theme_mod( 'rebeccalite_footer_bg_color' ) ) . ';
            }';
    }

    if ( get_theme_mod( 'rebeccalite_footer_text_color' ) ) {
        $custom_css .= '
            .copyright {
                color: ' . esc_attr( get_theme_mod( 'rebeccalite_footer_text_color' ) ) . ';
            }';
    }

    if ( get_theme_mod( 'rebeccalite_footer_icon_color' ) ) {
        $custom_css .= '
            .credits .social-icons a {
                color: ' . esc_attr( get_theme_mod( 'rebeccalite_footer_icon_color' ) ) . ';
            }';
    }

    wp_add_inline_style( 'rebeccalite-style', $custom_css );
}

add_action( 'wp_enqueue_scripts', 'rebeccalite_inline_style', 15 );

