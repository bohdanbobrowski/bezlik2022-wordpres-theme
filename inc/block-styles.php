<?php
/**
 * Block styles
 *
 * @package Bezlik
 */


/**
 * Register theme based blog styles
 */
function bezlik_register_block_styles() {

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/post-template',
		array(
			'name'  => 'bezlik-counter',
			'label' => __( 'With counter', 'bezlik' ),		
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/post-terms',
		array(
			'name'  => 'bezlik-solid-cats',
			'label' => __( 'Solid', 'bezlik' ),
			'isdefault' => true,		
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/heading',
		array(
			'name'  => 'bezlik-no-margins',
			'label' => __( 'No margins', 'bezlik' ),
		)
	);
	
}
add_action( 'init', 'bezlik_register_block_styles' );