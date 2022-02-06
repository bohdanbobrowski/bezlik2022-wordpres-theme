<?php
/**
 * Theme page
 *
 */

class Bezlik_Theme_Page {
	/**
	 * Instance of class.
	 *
	 * @var bool $instance instance variable.
	 */
	private static $instance;

	/**
	 * Check if instance already exists.
	 *
	 */
	public static function instance() {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Main ) ) {
			self::$instance = new Bezlik_Theme_Page();
		}

		return self::$instance;
	}

	/**
	 * Construct
	 */
	public function __construct() {
		add_action( 'admin_menu', __CLASS__ . '::theme_page', 99 );

	}	

	/**
	 * Theme page
	 */
	public static function theme_page() {
		$theme_page = add_theme_page( esc_html__( 'Bezlik theme', 'bezlik' ), esc_html__( 'Bezlik theme', 'bezlik' ), 'edit_theme_options', 'bezlik-theme.php', __CLASS__ . '::markup' );
		add_action( 'load-' . $theme_page, __CLASS__ . '::theme_page_styles' );
	}	

	/**
	 * Theme page markup
	 */
	public static function markup() {
		if ( !current_user_can( 'edit_theme_options' ) )  {
			wp_die( esc_html__( 'You do not have the right to view this page', 'bezlik' ) );
		}

		$theme = wp_get_theme();

		?>
		<div class="bezlik-theme-page">
			<div class="theme-page-header">
				<div class="theme-page-container">
					<h2>Elsie</h2><span class="theme-version"><?php echo esc_html( $theme->version ); ?></span>
				</div>
			</div>
			<div class="theme-page-container">
				<div class="theme-page-content">
					<div class="theme-grid">
						<?php /*
						<div class="grid-item">
							<h3><span class="dashicons dashicons-admin-page"></span><?php echo esc_html__( 'Starter sites', 'bezlik' ); ?></h3>
							<p><?php echo esc_html__( 'Looking for a quick start? You can import one of our premade demos.', 'bezlik' ); ?></p>
							<?php Bezlik_Install_Plugins::instance()->do_plugin_install(); ?>
						</div>
						*/ ?>
						
						<div class="grid-item">
							<h3><span class="dashicons dashicons-sos"></span><?php echo esc_html__( 'Need help?', 'bezlik' ); ?></h3>
							<p><?php echo esc_html__( 'Are you stuck? No problem! Send us a message and we\'ll be happy to help you.', 'bezlik' ); ?></p>
							<a class="button" href="https://elfwp.com/support/" target="_blank"><?php echo esc_html__( 'Contact support', 'bezlik' ); ?></a>
						</div>
						
						<div class="grid-item">
							<h3><span class="dashicons dashicons-welcome-write-blog"></span><?php echo esc_html__( 'Changelog', 'bezlik' ); ?></h3>
							<p><?php echo esc_html__( 'Read our changelog and see what recent changes we\'ve implemented in Elsie', 'bezlik' ); ?></p>
							<a class="button" href="https://elfwp.com/changelog/bezlik/" target="_blank"><?php echo esc_html__( 'See the changelog', 'bezlik' ); ?></a>
						</div>	

						<div class="grid-item">
							<h3><span class="dashicons dashicons-admin-generic"></span><?php echo esc_html__( 'Header options', 'bezlik' ); ?></h3>
							<a target="_blank" class="button" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=bezlik_header_panel' ) ); ?>"><?php esc_html_e( 'Go to the options', 'bezlik' ); ?></a>
						</div>							

						<div class="grid-item">
							<h3><span class="dashicons dashicons-grid-view"></span><?php echo esc_html__( 'Blog options', 'bezlik' ); ?></h3>
							<a target="_blank" class="button" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=bezlik_section_blog_archives' ) ); ?>"><?php esc_html_e( 'Go to the options', 'bezlik' ); ?></a>
						</div>		
						
						<div class="grid-item">
							<h3><span class="dashicons dashicons-admin-generic"></span></span><?php echo esc_html__( 'Single post options', 'bezlik' ); ?></h3>
							<a target="_blank" class="button" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=bezlik_section_blog_singles' ) ); ?>"><?php esc_html_e( 'Go to the options', 'bezlik' ); ?></a>
						</div>							
						
						<div class="grid-item">
							<h3><span class="dashicons dashicons-format-image"></span><?php echo esc_html__( 'Upload your logo', 'bezlik' ); ?></h3>
							<a target="_blank" class="button" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=custom_logo' ) ); ?>"><?php esc_html_e( 'Go to the options', 'bezlik' ); ?></a>
						</div>
						
						<div class="grid-item">
							<h3><span class="dashicons dashicons-admin-customizer"></span><?php echo esc_html__( 'Change colors', 'bezlik' ); ?></h3>
							<a target="_blank" class="button" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=colors' ) ); ?>"><?php esc_html_e( 'Change colors', 'bezlik' ); ?></a>
						</div>	

						<div class="grid-item">
							<h3><span class="dashicons dashicons-admin-customizer"></span><?php echo esc_html__( 'Change fonts', 'bezlik' ); ?></h3>
							<a target="_blank" class="button" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=bezlik_typography' ) ); ?>"><?php esc_html_e( 'Change colors', 'bezlik' ); ?></a>
						</div>	
						
						<div class="grid-item">
							<h3><span class="dashicons dashicons-text"></span><?php echo esc_html__( 'Change footer credits', 'bezlik' ); ?></h3>
							<a target="_blank" class="button" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=footer_credits' ) ); ?>"><?php esc_html_e( 'Go to the options', 'bezlik' ); ?></a>
						</div>			
						
						<div class="grid-item">
							<h3><span class="dashicons dashicons-format-image"></span><?php echo esc_html__( 'Customize buttons', 'bezlik' ); ?></h3>
							<a target="_blank" class="button" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=bezlik_buttons' ) ); ?>"><?php esc_html_e( 'Go to the options', 'bezlik' ); ?></a>
						</div>		
						
						<div class="grid-item">
							<h3><span class="dashicons dashicons-controls-forward"></span><?php echo esc_html__( 'Configure breadcrumbs', 'bezlik' ); ?></h3>
							<a target="_blank" class="button" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=bezlik_breadcrumbs ' ) ); ?>"><?php esc_html_e( 'Go to the options', 'bezlik' ); ?></a>
						</div>							
					</div>					
				</div>
			</div>
		</div>
		<?php
	}

	/**
	 * Theme page styles and scripts
	 */
	public static function theme_page_styles() {
		add_action( 'admin_enqueue_scripts', __CLASS__ . '::styles' );
	}

	/**
	 * Styles
	 */
	public static function styles( $hook ) {

		if ( 'appearance_page_bezlik-theme' != $hook ) {
			return;
		}

		wp_enqueue_style( 'bezlik-theme-page-styles', get_template_directory_uri() . '/inc/onboarding/assets/css/theme-page.min.css', array(), BEZLIK_VERSION );
	}	

}

$bezlik_theme_page = new Bezlik_Theme_Page();