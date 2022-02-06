<?php
/**
 * Bezlik review notice
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Class to display the theme review notice after certain period.
 *
  */
class Bezlik_Theme_Review_Notice {

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'review_notice' ) );
		add_action( 'admin_notices', array( $this, 'review_notice_markup' ), 0 );
		add_action( 'admin_init', array( $this, 'ignore_theme_review_notice' ), 0 );
		add_action( 'admin_init', array( $this, 'ignore_theme_review_notice_partially' ), 0 );
		add_action( 'switch_theme', array( $this, 'review_notice_data_remove' ) );
	}

	/**
	 * Set the required option value as needed for theme review notice.
	 */
	public function review_notice() {
		if ( !get_option( 'bezlik_theme_installed_time' ) ) {
			update_option( 'bezlik_theme_installed_time', time() );
		}
	}

	/**
	 * Show HTML markup if conditions meet.
	 */
	public function review_notice_markup() {
		$user_id                  = get_current_user_id();
		$current_user             = wp_get_current_user();
		$ignored_notice           = get_user_meta( $user_id, 'bezlik_disable_review_notice', true );
		$ignored_notice_partially = get_user_meta( $user_id, 'delay_bezlik_disable_review_notice_partially', true );

		if ( ( get_option( 'bezlik_theme_installed_time' ) > strtotime( '-14 day' ) ) || ( $ignored_notice_partially > strtotime( '-14 day' ) ) || ( $ignored_notice ) ) {
			return;
		}
		?>
		<div class="notice notice-success" style="position:relative;">
			<p>
				<?php
				printf(
				    /* Translators: %1$s current user display name. */
					esc_html__(
						'Hey, %1$s 👋! You\'ve been using Bezlik for some time now. We truly hope it helps you build your website and we would love to receive a review from you.', 'bezlik'
					),
					'<strong>' . esc_html( $current_user->display_name ) . '</strong>'
				);
				?>
			</p>

			<p>
				<a href="https://wordpress.org/support/theme/bezlik/reviews/?filter=5#new-post" class="btn button-primary" target="_blank"><?php esc_html_e( 'Sure', 'bezlik' ); ?></a>

				<a href="?delay_bezlik_disable_review_notice_partially=0" class="btn button-secondary"><?php esc_html_e( 'Maybe later', 'bezlik' ); ?></a>

				<a href="?nag_bezlik_disable_review_notice=0" class="btn button-secondary"><?php esc_html_e( 'I already did', 'bezlik' ); ?></a>
			</p>

			<a class="notice-dismiss" href="?nag_bezlik_disable_review_notice=0" style="text-decoration:none;"></a>
		</div>
		<?php
	}

	/**
	 * Disable review notice permanently
	 */
	public function ignore_theme_review_notice() {
		if ( isset( $_GET['nag_bezlik_disable_review_notice'] ) && '0' == $_GET['nag_bezlik_disable_review_notice'] ) {
			add_user_meta( get_current_user_id(), 'bezlik_disable_review_notice', 'true', true );
		}
	}

	/**
	 * Delay review notice
	 */
	public function ignore_theme_review_notice_partially() {
		if ( isset( $_GET['delay_bezlik_disable_review_notice_partially'] ) && '0' == $_GET['delay_bezlik_disable_review_notice_partially'] ) {
			update_user_meta( get_current_user_id(), 'delay_bezlik_disable_review_notice_partially', time() );
		}
	}

	/**
	 * Delete data on theme switch
	 */
	public function review_notice_data_remove() {
		$get_all_users        = get_users();
		$theme_installed_time = get_option( 'bezlik_theme_installed_time' );

		// Delete options data.
		if ( $theme_installed_time ) {
			delete_option( 'bezlik_theme_installed_time' );
		}

		foreach ( $get_all_users as $user ) {
			$ignored_notice           = get_user_meta( $user->ID, 'bezlik_disable_review_notice', true );
			$ignored_notice_partially = get_user_meta( $user->ID, 'delay_bezlik_disable_review_notice_partially', true );

			if ( $ignored_notice ) {
				delete_user_meta( $user->ID, 'bezlik_disable_review_notice' );
			}

			if ( $ignored_notice_partially ) {
				delete_user_meta( $user->ID, 'delay_bezlik_disable_review_notice_partially' );
			}
		}
	}
}

new Bezlik_Theme_Review_Notice();