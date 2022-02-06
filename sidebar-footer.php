<?php
/**
 * Footer widget areas
 * 
 * @package Bezlik
 */
?>

<?php
	if ( !is_active_sidebar( 'footer-1' ) ) {
		return;
	}


	$bezlik_footer_widgets_layout 		= get_theme_mod( 'footer_widgets_layout', 'columns3' );
	$bezlik_footer_widgets_container 	= get_theme_mod( 'footer_widgets_width', 'container' );

	switch ( $bezlik_footer_widgets_layout ) {
		case 'columns1':
			$bezlik_widget_areas = array(
				'no'	=> 1,
				'col'	=> 'col-lg-12',
			);
			break;

		case 'columns2':
			$bezlik_widget_areas = array(
				'no'	=> 2,
				'col'	=> 'col-lg-6',
			);			
			break;
			 
		case 'columns3':
			$bezlik_widget_areas = array(
				'no'	=> 3,
				'col'	=> 'col-lg-4',
			);			
			break;

		case 'columns4':
			$bezlik_widget_areas = array(
				'no'	=> 4,
				'col'	=> 'col-lg-3',
			);			
			break;	

		default:
			return;
	}	
?>

<div class="footer-widgets <?php echo esc_attr( $bezlik_footer_widgets_layout ); ?>">
	<div class="<?php echo esc_attr( $bezlik_footer_widgets_container ); ?>">
		<div class="footer-widgets-inner">
			<div class="row">
			<?php for ( $bezlik_counter = 1; $bezlik_counter <= $bezlik_widget_areas['no']; $bezlik_counter++ ) { ?>
				<?php if ( is_active_sidebar( 'footer-' . $bezlik_counter ) ) : ?>
				<div class="footer-column <?php echo esc_attr( $bezlik_widget_areas['col'] ); ?>">
					<?php dynamic_sidebar( 'footer-' . $bezlik_counter); ?>
				</div>
				<?php endif; ?>	
			<?php } ?>
			</div>
		</div>
	</div>
</div>
