<?php
/**
 * Typography Customizer options
 *
 * @package Bezlik
 */

/**
 * Body
 */

$wp_customize->add_panel(
	'bezlik_typography',
	array(
		'title'         => esc_html__( 'Typography', 'bezlik'),
		'priority'      => 11,
	)
); 

//Family
$wp_customize->add_section(
	'bezlik_section_typography_body',
	array(
		'title'         => esc_html__( 'Body', 'bezlik'),
		'panel'         => 'bezlik_typography',
	)
);

$wp_customize->add_setting( 'bezlik_body_font',
	array(
		'default'           => '{"font":"Inter","regularweight":"regular","category":"sans-serif"}',
		'sanitize_callback' => 'bezlik_google_fonts_sanitize',
		'transport'			=> 'postMessage'
	)
);

$wp_customize->add_control( new Bezlik_Typography_Control( $wp_customize, 'bezlik_body_font',
	array(
		'section' => 'bezlik_section_typography_body',
		'settings' => array (
			'family' => 'bezlik_body_font',
		),
		'input_attrs' => array(
			'font_count'    => 'all',
			'orderby'       => 'alpha',
			'disableRegular' => false,
		),
	)
) );

//Font size
$wp_customize->add_setting( 'body_font_size_desktop', array(
	'default'   => 16,
	'transport'	=> 'postMessage',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'body_font_size_tablet', array(
	'default'	=> 16,
	'transport'	=> 'postMessage',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'body_font_size_mobile', array(
	'default'	=> 16,
	'transport'	=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control( new Bezlik_Responsive_Number( $wp_customize, 'body_font_size',
	array(
		'label' => esc_html__( 'Font size', 'bezlik' ),
		'section' => 'bezlik_section_typography_body',
		'settings'   => array (
			'body_font_size_desktop',
			'body_font_size_tablet',
			'body_font_size_mobile'
		),
		'input_attrs' => array(
			'min'   => 0,
			'max'   => 250,
			'step'  => 1,
			'unit'	=> 'px'
		),		
	)
) );

//Line height
$wp_customize->add_setting( 'body_line_height',
	array(
		'default' 			=> 1.9,
		'transport' 		=> 'postMessage',
		'sanitize_callback' => 'bezlik_sanitize_range'
	)
);
$wp_customize->add_control( new Bezlik_Slider_Control( $wp_customize, 'body_line_height',
	array(
		'label' => esc_html__( 'Line height', 'bezlik' ),
		'section' => 'bezlik_section_typography_body',
		'input_attrs' => array(
			'min' => 0,
			'max' => 3,
			'step' => 0.05,
		),
	)
) );

//Letter spacing
$wp_customize->add_setting( 'body_letter_spacing',
	array(
		'default' 			=> 0,
		'transport' 		=> 'postMessage',
		'sanitize_callback' => 'bezlik_sanitize_range'
	)
);
$wp_customize->add_control( new Bezlik_Slider_Control( $wp_customize, 'body_letter_spacing',
	array(
		'label' => esc_html__( 'Letter spacing', 'bezlik' ),
		'section' => 'bezlik_section_typography_body',
		'input_attrs' => array(
			'min' => 0,
			'max' => 5,
			'step' => 0.5,
			'unit' => 'px'
		),
	)
) );


/**
 * Headings
 */

//Family
$wp_customize->add_section(
	'bezlik_section_typography_headings',
	array(
		'title'         => esc_html__( 'Headings', 'bezlik'),
		'panel'         => 'bezlik_typography',
	)
);

$wp_customize->add_setting( 'bezlik_headings_font',
	array(
		'default'           => '{"font":"Cormorant Garamond","regularweight":"600","category":"sans-serif"}',
		'sanitize_callback' => 'bezlik_google_fonts_sanitize',
		'transport'	 		=> 'postMessage'
	)
);

$wp_customize->add_control( new Bezlik_Typography_Control( $wp_customize, 'bezlik_headings_font',
	array(
		'section' => 'bezlik_section_typography_headings',
		'settings' => array (
			'family' => 'bezlik_headings_font',
		),
		'input_attrs' => array(
			'font_count'    => 'all',
			'orderby'       => 'alpha',
			'disableRegular' => false,
		),
	)
) );

//Line height
$wp_customize->add_setting( 'headings_line_height',
	array(
		'default' 			=> 1.3,
		'transport' 		=> 'postMessage',
		'sanitize_callback' => 'bezlik_sanitize_range'
	)
);
$wp_customize->add_control( new Bezlik_Slider_Control( $wp_customize, 'headings_line_height',
	array(
		'label' => esc_html__( 'Line height', 'bezlik' ),
		'section' => 'bezlik_section_typography_headings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 3,
			'step' => 0.05,
		),
	)
) );

//Letter spacing
$wp_customize->add_setting( 'headings_letter_spacing',
	array(
		'default' 			=> 0,
		'transport' 		=> 'postMessage',
		'sanitize_callback' => 'bezlik_sanitize_range'
	)
);
$wp_customize->add_control( new Bezlik_Slider_Control( $wp_customize, 'headings_letter_spacing',
	array(
		'label' => esc_html__( 'Letter spacing [px]', 'bezlik' ),
		'section' => 'bezlik_section_typography_headings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 5,
			'step' => 0.5,
		),
	)
) );

/**
 * H1 heading
 */

//Font size
$wp_customize->add_setting( 'h1_heading_font_size_desktop', array(
	'default'   => 48,
	'transport'	=> 'postMessage',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'h1_heading_font_size_tablet', array(
	'default'	=> 38,
	'transport'	=> 'postMessage',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'h1_heading_font_size_mobile', array(
	'default'	=> 32,
	'transport'	=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control( new Bezlik_Responsive_Number( $wp_customize, 'h1_heading_font_size',
	array(
		'label' => esc_html__( 'H1 Font Size', 'bezlik' ),
		'section' => 'bezlik_section_typography_headings',
		'settings'   => array (
			'h1_heading_font_size_desktop',
			'h1_heading_font_size_tablet',
			'h1_heading_font_size_mobile'
		),
		'input_attrs' => array(
			'min'   => 0,
			'max'   => 250,
			'step'  => 1,
			'unit'	=> 'px'
		),		
	)
) );

//Font size
$wp_customize->add_setting( 'h2_heading_font_size_desktop', array(
	'default'   => 38,
	'transport'	=> 'postMessage',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'h2_heading_font_size_tablet', array(
	'default'	=> 32,
	'transport'	=> 'postMessage',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'h2_heading_font_size_mobile', array(
	'default'	=> 24,
	'transport'	=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control( new Bezlik_Responsive_Number( $wp_customize, 'h2_heading_font_size',
	array(
		'label' => esc_html__( 'H2 Font Size', 'bezlik' ),
		'section' => 'bezlik_section_typography_headings',
		'settings'   => array (
			'h2_heading_font_size_desktop',
			'h2_heading_font_size_tablet',
			'h2_heading_font_size_mobile'
		),
		'input_attrs' => array(
			'min'   => 0,
			'max'   => 250,
			'step'  => 1,
			'unit'	=> 'px'
		),		
	)
) );

//Font size
$wp_customize->add_setting( 'h3_heading_font_size_desktop', array(
	'default'   => 32,
	'transport'	=> 'postMessage',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'h3_heading_font_size_tablet', array(
	'default'	=> 24,
	'transport'	=> 'postMessage',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'h3_heading_font_size_mobile', array(
	'default'	=> 20,
	'transport'	=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control( new Bezlik_Responsive_Number( $wp_customize, 'h3_heading_font_size',
	array(
		'label' => esc_html__( 'H3 Font Size', 'bezlik' ),
		'section' => 'bezlik_section_typography_headings',
		'settings'   => array (
			'h3_heading_font_size_desktop',
			'h3_heading_font_size_tablet',
			'h3_heading_font_size_mobile'
		),
		'input_attrs' => array(
			'min'   => 0,
			'max'   => 250,
			'step'  => 1,
			'unit'	=> 'px'
		),		
	)
) );

//Font size
$wp_customize->add_setting( 'h4_heading_font_size_desktop', array(
	'default'   => 24,
	'transport'	=> 'postMessage',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'h4_heading_font_size_tablet', array(
	'default'	=> 20,
	'transport'	=> 'postMessage',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'h4_heading_font_size_mobile', array(
	'default'	=> 20,
	'transport'	=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control( new Bezlik_Responsive_Number( $wp_customize, 'h4_heading_font_size',
	array(
		'label' => esc_html__( 'H4 Font Size', 'bezlik' ),
		'section' => 'bezlik_section_typography_headings',
		'settings'   => array (
			'h4_heading_font_size_desktop',
			'h4_heading_font_size_tablet',
			'h4_heading_font_size_mobile'
		),
		'input_attrs' => array(
			'min'   => 0,
			'max'   => 250,
			'step'  => 1,
			'unit'	=> 'px'
		),		
	)
) );


//Font size
$wp_customize->add_setting( 'h5_heading_font_size_desktop', array(
	'default'   => 20,
	'transport'	=> 'postMessage',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'h5_heading_font_size_tablet', array(
	'default'	=> 20,
	'transport'	=> 'postMessage',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'h5_heading_font_size_mobile', array(
	'default'	=> 20,
	'transport'	=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control( new Bezlik_Responsive_Number( $wp_customize, 'h5_heading_font_size',
	array(
		'label' => esc_html__( 'H5 Font Size', 'bezlik' ),
		'section' => 'bezlik_section_typography_headings',
		'settings'   => array (
			'h5_heading_font_size_desktop',
			'h5_heading_font_size_tablet',
			'h5_heading_font_size_mobile'
		),
		'input_attrs' => array(
			'min'   => 0,
			'max'   => 250,
			'step'  => 1,
			'unit'	=> 'px'
		),		
	)
) );

//Font size
$wp_customize->add_setting( 'h6_heading_font_size_desktop', array(
	'default'   => 20,
	'transport'	=> 'postMessage',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'h6_heading_font_size_tablet', array(
	'default'	=> 20,
	'transport'	=> 'postMessage',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'h6_heading_font_size_mobile', array(
	'default'	=> 20,
	'transport'	=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control( new Bezlik_Responsive_Number( $wp_customize, 'h6_heading_font_size',
	array(
		'label' => esc_html__( 'H6 Font Size', 'bezlik' ),
		'section' => 'bezlik_section_typography_headings',
		'settings'   => array (
			'h6_heading_font_size_desktop',
			'h6_heading_font_size_tablet',
			'h6_heading_font_size_mobile'
		),
		'input_attrs' => array(
			'min'   => 0,
			'max'   => 250,
			'step'  => 1,
			'unit'	=> 'px'
		),		
	)
) );