<?php
/**
 * Buttons Customizer options
 *
 * @package Bezlik
 */
/**
 * Buttons
 */
$wp_customize->add_section(
	'bezlik_buttons',
	array(
		'title'         => esc_html__( 'Buttons', 'bezlik' ),
		'panel'			=> 'bezlik_general_panel'
	)
);

$wp_customize->add_setting(
	'global_button_background',
	array(
		'default'           => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'global_button_background',
		array(
			'label'         	=> esc_html__( 'Button background color', 'bezlik' ),
			'section'       	=> 'bezlik_buttons',
			'settings'      	=> 'global_button_background',
		)
	)
);

$wp_customize->add_setting(
	'global_button_color',
	array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'global_button_color',
		array(
			'label'         	=> esc_html__( 'Button color', 'bezlik' ),
			'section'       	=> 'bezlik_buttons',
			'settings'      	=> 'global_button_color',
		)
	)
);

$wp_customize->add_setting(
	'global_button_background_hover',
	array(
		'default'           => '#950b0b',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'global_button_background_hover',
		array(
			'label'         	=> esc_html__( 'Button background color (hover)', 'bezlik' ),
			'section'       	=> 'bezlik_buttons',
			'settings'      	=> 'global_button_background_hover',
		)
	)
);

$wp_customize->add_setting(
	'global_button_color_hover',
	array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'global_button_color_hover',
		array(
			'label'         	=> esc_html__( 'Button color (hover)', 'bezlik' ),
			'section'       	=> 'bezlik_buttons',
			'settings'      	=> 'global_button_color_hover',
		)
	)
);

$wp_customize->add_setting( 'global_button_padding_tb_desktop', array(
	'default'   		=> 15,
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'global_button_padding_tb_tablet', array(
	'default'			=> 15,
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'global_button_padding_tb_mobile', array(
	'default'			=> 15,
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control( new Bezlik_Responsive_Number( $wp_customize, 'global_button_padding_tb',
	array(
		'label' => esc_html__( 'Vertical padding', 'bezlik' ),
		'section' => 'bezlik_buttons',
		'settings'   => array (
			'global_button_padding_tb_desktop',
			'global_button_padding_tb_tablet',
			'global_button_padding_tb_mobile'
		),
		'input_attrs' => array(
			'min'   => 0,
			'max'   => 50,
			'step'  => 1,
			'unit'	=> 'px'
		),		
	)
) );

$wp_customize->add_setting( 'global_button_padding_lr_desktop', array(
	'default'   		=> 36,
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'global_button_padding_lr_tablet', array(
	'default'			=> 36,
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'global_button_padding_lr_mobile', array(
	'default'			=> 36,
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control( new Bezlik_Responsive_Number( $wp_customize, 'global_button_padding_lr',
	array(
		'label' => esc_html__( 'Horizontal padding', 'bezlik' ),
		'section' => 'bezlik_buttons',
		'settings'   => array (
			'global_button_padding_lr_desktop',
			'global_button_padding_lr_tablet',
			'global_button_padding_lr_mobile'
		),
		'input_attrs' => array(
			'min'   => 0,
			'max'   => 50,
			'step'  => 1,
			'unit'	=> 'px'
		),		
	)
) );

$wp_customize->add_setting( 'global_button_border_radius',
	array(
		'default' 			=> 0,
		'sanitize_callback' => 'bezlik_sanitize_range'
	)
);
$wp_customize->add_control( new Bezlik_Slider_Control( $wp_customize, 'global_button_border_radius',
	array(
		'label' => esc_html__( 'Border radius', 'bezlik' ),
		'section' 			=> 'bezlik_buttons',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
			'unit' => 'px'
		),
	)
) );

$wp_customize->add_setting( 'global_button_font_size_desktop', array(
	'default'   		=> 13,
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'global_button_font_size_tablet', array(
	'default'			=> 13,
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'global_button_font_size_mobile', array(
	'default'			=> 13,
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control( new Bezlik_Responsive_Number( $wp_customize, 'global_button_font_size',
	array(
		'label' => esc_html__( 'Font size', 'bezlik' ),
		'section' => 'bezlik_buttons',
		'settings'   => array (
			'global_button_font_size_desktop',
			'global_button_font_size_tablet',
			'global_button_font_size_mobile'
		),
		'input_attrs' => array(
			'min'   => 0,
			'max'   => 50,
			'step'  => 1,
			'unit'	=> 'px'
		),		
	)
) );

$wp_customize->add_setting( 'global_button_transform',
	array(
		'default' 			=> 'uppercase',
		'sanitize_callback' => 'bezlik_sanitize_text',
	)
);
$wp_customize->add_control( new Bezlik_Radio_Buttons( $wp_customize, 'global_button_transform',
	array(
		'label'   => esc_html__( 'Text transform', 'bezlik' ),
		'section' => 'bezlik_buttons',
		'columns' => 4,
		'choices' => array(
			'none' 			=> esc_html__( '-', 'bezlik' ),
			'lowercase' 	=> esc_html__( 'aa', 'bezlik' ),
			'capitalize' 	=> esc_html__( 'Aa', 'bezlik' ),
			'uppercase' 	=> esc_html__( 'AA', 'bezlik' ),
		),
	)
) );

//Letter spacing
$wp_customize->add_setting( 'global_button_letter_spacing',
	array(
		'default' 			=> 1,
		'sanitize_callback' => 'bezlik_sanitize_range'
	)
);
$wp_customize->add_control( new Bezlik_Slider_Control( $wp_customize, 'global_button_letter_spacing',
	array(
		'label' => esc_html__( 'Letter spacing', 'bezlik' ),
		'section' => 'bezlik_buttons',
		'input_attrs' => array(
			'min' => 0,
			'max' => 5,
			'step' => 0.5,
			'unit' => 'px'
		),
	)
) );