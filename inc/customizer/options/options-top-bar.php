<?php
/**
 * Top bar Customizer options
 *
 * @package Bezlik
 */

/**
 * Top
 */
$wp_customize->add_section(
	'bezlik_header_top_bar',
	array(
		'title'         => esc_html__( 'Top bar', 'bezlik' ),
		'priority'      => 11,
		'panel'			=> 'bezlik_header_panel'
	)
);

$wp_customize->add_setting(
	'top_bar_tabs',
	array(
		'sanitize_callback' => 'esc_html',
	)
);
$wp_customize->add_control( new Bezlik_Tabs( $wp_customize, 'top_bar_tabs',
	array(
		'linked'		=> 'top_bar_tabs',
		'label'    		=> esc_html__( 'Settings', 'bezlik' ),
		'label2'    	=> esc_html__( 'Styling', 'bezlik' ),
		'connected'		=> 'bezlik_header_top_bar',
		'connected2'	=> 'bezlik_header_top_bar_styling',
		'section'  		=> 'bezlik_header_top_bar',
	)
) );


$wp_customize->add_setting(
	'enable_top_bar',
	array(
		'default'           => 0,
		'sanitize_callback' => 'bezlik_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Bezlik_Toggle_Control(
		$wp_customize,
		'enable_top_bar',
		array(
			'label'         	=> esc_html__( 'Enable top bar', 'bezlik' ),
			'section'       	=> 'bezlik_header_top_bar',
			'settings'      	=> 'enable_top_bar',
		)
	)
);

$wp_customize->add_setting( 'topbar_width',
	array(
		'default' 			=> 'container',
		'sanitize_callback' => 'bezlik_sanitize_text'
	)
);
$wp_customize->add_control( new Bezlik_Radio_Buttons( $wp_customize, 'topbar_width',
	array(
		'label'   => esc_html__( 'Section width', 'bezlik' ),
		'section' => 'bezlik_header_top_bar',
		'columns' => 2,
		'choices' => array(
			'container' 		=> esc_html__( 'Contain', 'bezlik' ),
			'container-fluid' 	=> esc_html__( 'Full', 'bezlik' ),
		),
		'active_callback' 	=> 'bezlik_top_bar_active_callback',
	)
) );

$bezlik_tb_elements = array(
	'none' 			=> esc_html__( 'None', 'bezlik' ),
	'social' 		=> esc_html__( 'Social profile', 'bezlik' ),
	'navigation' 	=> esc_html__( 'Secondary menu', 'bezlik' ),
	'text' 			=> esc_html__( 'Text / HTML', 'bezlik' ),
	'contact' 		=> esc_html__( 'Contact', 'bezlik' ),
);

/**
 * Left
 */
$wp_customize->add_setting(
	'top_bar_left_title',
	array(
		'sanitize_callback' => 'esc_html',
	)
);
$wp_customize->add_control( new Bezlik_Title( $wp_customize, 'top_bar_left_title',
	array(
		'label'    			=> esc_html__( 'Left side', 'bezlik' ),
		'section'  			=> 'bezlik_header_top_bar',
		'active_callback' 	=> 'bezlik_top_bar_active_callback',
		'priority'      	=> 20
	)
) );

$wp_customize->add_setting(
	'top_bar_left',
	array(
		'default'           => 'contact',
		'sanitize_callback' => 'bezlik_sanitize_select',
	)
);
$wp_customize->add_control(
	'top_bar_left',
	array(
		'type'      		=> 'select',
		'label'     		=> esc_html__( 'Select element', 'bezlik' ),
		'section'   		=> 'bezlik_header_top_bar',
		'choices'   		=> $bezlik_tb_elements,
		'active_callback' 	=> 'bezlik_top_bar_active_callback',
		'priority'      	=> 20
	)
);

$wp_customize->add_setting(
	'top_bar_right_title',
	array(
		'sanitize_callback' => 'esc_html',
	)
);
$wp_customize->add_control( new Bezlik_Title( $wp_customize, 'top_bar_right_title',
	array(
		'label'    			=> esc_html__( 'Right side', 'bezlik' ),
		'section'  			=> 'bezlik_header_top_bar',
		'active_callback' 	=> 'bezlik_top_bar_active_callback',
		'priority'      	=> 30
	)
) );

$wp_customize->add_setting(
	'top_bar_right',
	array(
		'default'           => 'text',
		'sanitize_callback' => 'bezlik_sanitize_select',
	)
);
$wp_customize->add_control(
	'top_bar_right',
	array(
		'type'      		=> 'select',
		'label'     		=> esc_html__( 'Select element', 'bezlik' ),
		'section'   		=> 'bezlik_header_top_bar',
		'choices'   		=> $bezlik_tb_elements,
		'active_callback' 	=> 'bezlik_top_bar_active_callback',
		'priority'      	=> 30
	)
);

/**
 * Elements
 */
//Header social
$wp_customize->add_setting( 'top_bar_social',
	array(
		'default' 			=> '',
		'sanitize_callback' => 'bezlik_sanitize_urls'
	)
);
$wp_customize->add_control( new Bezlik_Repeater_Control( $wp_customize, 'top_bar_social',
	array(
		'label' 		=> esc_html__( 'Social profile', 'bezlik' ),
		'description' 	=> esc_html__( 'Add links to your social profiles here', 'bezlik' ),
		'section' 		=> 'bezlik_header_top_bar',
		'button_labels' => array(
			'add' => esc_html__( 'Add new link', 'bezlik' ),
		),
		'active_callback' 	=> 'bezlik_social_top_bar_callback'
	)
) );


//Header custom text
$wp_customize->add_setting(
	'top_bar_text',
	array(
		'default'           => esc_html__( 'Your custom text', 'bezlik' ),
		'sanitize_callback' => 'bezlik_sanitize_text',
	)
);
$wp_customize->add_control(
	'top_bar_text',
	array(
		'label' 			=> esc_html__( 'Custom text', 'bezlik' ),
		'section' 			=> 'bezlik_header_top_bar',
		'type' 				=> 'text',
		'active_callback' 	=> 'bezlik_text_top_bar_callback'
	)
);

//Header contact
$wp_customize->add_setting(
	'top_bar_contact_phone',
	array(
		'default'           => esc_html__( '+999.999.999', 'bezlik' ),
		'sanitize_callback' => 'bezlik_sanitize_text',
	)
);
$wp_customize->add_control(
	'top_bar_contact_phone',
	array(
		'label' 			=> esc_html__( 'Phone number', 'bezlik' ),
		'section' 			=> 'bezlik_header_top_bar',
		'type' 				=> 'text',
		'active_callback' 	=> 'bezlik_contact_top_bar_callback'
	)
);

$wp_customize->add_setting(
	'top_bar_contact_email',
	array(
		'default'           => esc_html__( 'office@example.org', 'bezlik' ),
		'sanitize_callback' => 'bezlik_sanitize_text',
	)
);
$wp_customize->add_control(
	'top_bar_contact_email',
	array(
		'label' 			=> esc_html__( 'Email address', 'bezlik' ),
		'section' 			=> 'bezlik_header_top_bar',
		'type' 				=> 'text',
		'active_callback' 	=> 'bezlik_contact_top_bar_callback'
	)
);

$wp_customize->add_setting( 'top_bar_navigation',
	array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	)
);

$wp_customize->add_control( new Bezlik_Info( $wp_customize, 'top_bar_navigation',
		array(
			'label' 			=> '<a href="javascript:wp.customize.panel( \'nav_menus\' ).focus();">' . esc_html__( 'Click here to configure your menu', 'bezlik' ),
			'section' 			=> 'bezlik_header_top_bar',
			'attr'				=> 1,
			'active_callback' 	=> 'bezlik_nav_top_bar_callback'
		)
	)
);


/**
 * Styling
 */
$wp_customize->add_section(
	'bezlik_header_top_bar_styling',
	array(
		'title'         => esc_html__( 'Top bar styling', 'bezlik' ),
		'priority'      => 11,
		'panel'			=> 'bezlik_header_panel'
	)
);

$wp_customize->add_setting(
	'top_bar_tabs_styling',
	array(
		'sanitize_callback' => 'esc_html',
	)
);
$wp_customize->add_control( new Bezlik_Tabs( $wp_customize, 'top_bar_tabs_styling',
	array(
		'linked'			=> 'top_bar_tabs',
		'label'    		=> esc_html__( 'Settings', 'bezlik' ),
		'label2'    	=> esc_html__( 'Styling', 'bezlik' ),
		'connected'		=> 'bezlik_header_top_bar',
		'connected2'	=> 'bezlik_header_top_bar_styling',
		'section'  		=> 'bezlik_header_top_bar_styling',
	)
) );

$wp_customize->add_setting(
	'top_bar_background_color',
	array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'top_bar_background_color',
		array(
			'label'    => esc_html__( 'Background color', 'bezlik' ),
			'section'  => 'bezlik_header_top_bar_styling',
		)
	)
);

$wp_customize->add_setting(
	'top_bar_color',
	array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'top_bar_color',
		array(
			'label'    => esc_html__( 'Color', 'bezlik' ),
			'section'  => 'bezlik_header_top_bar_styling',
		)
	)
);

$wp_customize->add_setting( 'topbar_padding_desktop', array(
	'default'   => 8,
	'transport'	=> 'postMessage',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'topbar_padding_tablet', array(
	'default'	=> 8,
	'transport'	=> 'postMessage',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'topbar_padding_mobile', array(
	'default'	=> 8,
	'transport'	=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control( new Bezlik_Responsive_Number( $wp_customize, 'topbar_padding',
	array(
		'label' => esc_html__( 'Vertical spacing', 'bezlik' ),
		'section' => 'bezlik_header_top_bar_styling',
		'settings'   => array (
			'topbar_padding_desktop',
			'topbar_padding_tablet',
			'topbar_padding_mobile'
		),
		'input_attrs' => array(
			'min'   => 0,
			'max'   => 250,
			'step'  => 1,
			'unit'	=> 'px'
		),		
	)
) );