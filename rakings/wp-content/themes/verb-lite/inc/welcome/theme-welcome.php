<?php
/**
 * Welcome Screen Class
 */
class verb_lite_welcome {

	/**
	 * Constructor for the welcome screen
	 */
	public function __construct() {

		/* create dashbord page */
		add_action( 'admin_menu', array( $this, 'verb_lite_welcome_register_menu' ) );

		/* activation notice */
		add_action( 'admin_init', array( $this, 'verb_lite_activation_admin_notice' ) );

		/* enqueue script and style for welcome screen */
		add_action( 'admin_enqueue_scripts', array( $this, 'verb_lite_welcome_style_and_scripts' ) );

		/* enqueue script for customizer */
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'verb_lite_welcome_scripts_for_customizer' ) );

		/* load welcome screen */
		add_action( 'verb_lite_welcome', array( $this, 'verb_lite_welcome_getting_started' ) );
		add_action('admin_init',array($this,'dismiss_welcome'),1);

		/* ajax callback for dismissable required actions */
		add_action( 'wp_ajax_verb_lite_dismiss_required_action', array( $this, 'verb_lite_dismiss_required_action_callback') );
		add_action( 'wp_ajax_nopriv_verb_lite_dismiss_required_action', array($this, 'verb_lite_dismiss_required_action_callback') );

	}

	/**
	 * Creates the dashboard page
	 * @see  add_theme_page()
	 * @since 1.8.2.4
	 */
	public function verb_lite_welcome_register_menu() {
		add_theme_page( __( 'Setup Verb Lite', 'verb-lite' ), __( 'Setup Verb Lite', 'verb-lite' ), 'activate_plugins', 'verb-lite-welcome', array( $this, 'verb_lite_welcome_screen' ) );
	}

	/**
	 * Adds an admin notice upon successful activation.
	 * @since 1.8.2.4
	 */
	public function verb_lite_activation_admin_notice() {
		global $current_user;

		if ( is_admin()) {

			$current_theme = wp_get_theme();
			$welcome_dismissed = get_user_meta($current_user->ID,'verb_lite_welcome_admin_notice');

			if($current_theme->get('Name')== "Verb Lite" && !$welcome_dismissed){
				add_action( 'admin_notices', array( $this, 'verb_lite_welcome_admin_notice' ), 99 );
			}

		}
	}
	function dismiss_welcome() {
		global $current_user;
		$user_id = $current_user->ID;

		if ( isset($_GET['verb_lite_welcome_dismiss']) && $_GET['verb_lite_welcome_dismiss'] == '1' ) {
			add_user_meta($user_id, 'verb_lite_welcome_admin_notice', 'true', true);
		}
	}
	/**
	 * Display an admin notice linking to the welcome screen
	 */
	public function verb_lite_welcome_admin_notice() {

		$dismiss_url = '<a href="' . esc_url( wp_nonce_url( add_query_arg( 'verb_lite_welcome_dismiss', '1' ) ) ) . '" class="button" target="_parent">' . __('Dismiss this notice','verb-lite') . '</a>';
		?>
			<div class="notice theme-notice is-dismissible">
				<ul>
					<li class="left">
						<h2><?php _e( 'Welcome! Thank you for choosing Verb Lite! ', 'verb-lite' ); ?></h2>
		                <p><?php echo sprintf( esc_html__( 'Begin by visiting our %swelcome page%s', 'verb-lite' ), '<a href="' . esc_url( admin_url( 'themes.php?page=integral-welcome' ) ) . '">', '</a>' ); ?> <?php _e( 'to setup your theme and start customizing your site.', 'verb-lite' ); ?></p>
						<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=verb-lite-welcome' ) ); ?>" class="button button-primary" style="text-decoration: none;"><?php _e( 'Setup Verb Lite', 'verb-lite' ); ?></a>
					</li>
					<li class="right">
						<a target="_blank" href="<?php echo esc_url('https://www.themely.com/themes/verb/'); ?>" class="button button-primary button-hero" style="text-decoration: none;"><?php _e( 'Upgrade to Verb PRO!', 'verb-lite' ); ?></a>
					</li>
				</ul>
			</div>
			<style>
				.theme-notice {border:2px dashed #0073aa;max-width:800px;}
				.theme-notice ul {width:100%;margin:0;}
				.theme-notice ul li {display: inline-block;}
				.theme-notice .left {margin-right: 50px;}
				.theme-notice .button-hero {float: right;margin-bottom: 12px;}
			</style>
		<?php
	}

	/**
	 * Load welcome screen css and javascript
	 * @since  1.8.2.4
	 */
	public function verb_lite_welcome_style_and_scripts( $hook_suffix ) {

		if ( 'appearance_page_verb-lite-welcome' == $hook_suffix ) {
			wp_enqueue_style( 'verb-lite-welcome-screen-css', get_template_directory_uri() . '/inc/welcome/css/welcome.css' );

			global $verb_lite_required_actions;

			$nr_actions_required = 0;

			/* get number of required actions */
			if( get_option('verb_lite_show_required_actions') ):
				$verb_lite_show_required_actions = get_option('verb_lite_show_required_actions');
			else:
				$verb_lite_show_required_actions = array();
			endif;

			if( !empty($verb_lite_required_actions) ):
				foreach( $verb_lite_required_actions as $verb_lite_required_action_value ):
					if(( !isset( $verb_lite_required_action_value['check'] ) || ( isset( $verb_lite_required_action_value['check'] ) && ( $verb_lite_required_action_value['check'] == false ) ) ) && ((isset($verb_lite_show_required_actions[$verb_lite_required_action_value['id']]) && ($verb_lite_show_required_actions[$verb_lite_required_action_value['id']] == true)) || !isset($verb_lite_show_required_actions[$verb_lite_required_action_value['id']]) )) :
						$nr_actions_required++;
					endif;
				endforeach;
			endif;

			wp_localize_script( 'verb-lite-welcome-screen-js', 'VerbLiteWelcomeScreenObject', array(
				'nr_actions_required' => $nr_actions_required,
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'template_directory' => get_template_directory_uri(),
				'no_required_actions_text' => __( 'Hooray! There are no required actions for you right now.','verb-lite' )
			) );
		}
	}

	/**
	 * Load scripts for customizer page
	 * @since  1.8.2.4
	 */
	public function verb_lite_welcome_scripts_for_customizer() {

		global $verb_lite_required_actions;

		$nr_actions_required = 0;

		/* get number of required actions */
		if( get_option('verb_lite_show_required_actions') ):
			$verb_lite_show_required_actions = get_option('verb_lite_show_required_actions');
		else:
			$verb_lite_show_required_actions = array();
		endif;

		if( !empty($verb_lite_required_actions) ):
			foreach( $verb_lite_required_actions as $verb_lite_required_action_value ):
				if(( !isset( $verb_lite_required_action_value['check'] ) || ( isset( $verb_lite_required_action_value['check'] ) && ( $verb_lite_required_action_value['check'] == false ) ) ) && ((isset($verb_lite_show_required_actions[$verb_lite_required_action_value['id']]) && ($verb_lite_show_required_actions[$verb_lite_required_action_value['id']] == true)) || !isset($verb_lite_show_required_actions[$verb_lite_required_action_value['id']]) )) :
					$nr_actions_required++;
				endif;
			endforeach;
		endif;

		wp_localize_script( 'verb-lite-welcome-screen-customizer-js', 'VerbLiteWelcomeScreenCustomizerObject', array(
			'nr_actions_required' => $nr_actions_required,
			'aboutpage' => esc_url( admin_url( 'themes.php?page=verb-lite-welcome#actions_required' ) ),
			'customizerpage' => esc_url( admin_url( 'customize.php#actions_required' ) ),
			'themeinfo' => __('View Theme Info','verb-lite'),
		) );
	}

	/**
	 * Dismiss required actions
	 * @since 1.8.2.4
	 */
	public function verb_lite_dismiss_required_action_callback() {

		global $verb_lite_required_actions;

		$verb_lite_dismiss_id = (isset($_GET['dismiss_id'])) ? $_GET['dismiss_id'] : 0;

		echo $verb_lite_dismiss_id; /* this is needed and it's the id of the dismissable required action */

		if( !empty($verb_lite_dismiss_id) ):

			/* if the option exists, update the record for the specified id */
			if( get_option('verb_lite_show_required_actions') ):

				$verb_lite_show_required_actions = get_option('verb_lite_show_required_actions');

				$verb_lite_show_required_actions[$verb_lite_dismiss_id] = false;

				update_option( 'verb_lite_show_required_actions',$verb_lite_show_required_actions );

			/* create the new option,with false for the specified id */
			else:

				$verb_lite_show_required_actions_new = array();

				if( !empty($verb_lite_required_actions) ):

					foreach( $verb_lite_required_actions as $verb_lite_required_action ):

						if( $verb_lite_required_action['id'] == $verb_lite_dismiss_id ):
							$verb_lite_show_required_actions_new[$verb_lite_required_action['id']] = false;
						else:
							$verb_lite_show_required_actions_new[$verb_lite_required_action['id']] = true;
						endif;

					endforeach;

				update_option( 'verb_lite_show_required_actions', $verb_lite_show_required_actions_new );

				endif;

			endif;

		endif;

		die(); // this is required to return a proper result
	}


	/**
	 * Welcome screen content
	 * @since 1.8.2.4
	 */
	public function verb_lite_welcome_screen() {

		?>
        
        <div class="wrap about-wrap theme-welcome">
            <h1><?php esc_html_e('Welcome to Verb Lite - Version 1.1.6', 'verb-lite'); ?></h1>
            <div class="about-text"><?php esc_html_e('Verb Lite is a modern, clean and responsive blog theme suitable for magazines, newspapers, review sites, or personal blogs.', 'verb-lite'); ?></div>
            <a class="wp-badge" href="<?php echo esc_url('https://www.themely.com/'); ?>" target="_blank"><span><?php esc_html_e('Visit Website', 'verb-lite'); ?></span></a>
            <div class="clearfix"></div>
            <h2 class="nav-tab-wrapper">
                <a class="nav-tab nav-tab-active"><?php esc_html_e('Get Started', 'verb-lite'); ?></a>
            </h2>
            <div class="info-tab-content">
                <div class="left">
                    <div>
                        <h3><?php esc_html_e('Step 1 - Install Plugins', 'verb-lite'); ?></h3>
                        <ol>
                            <li><?php esc_html_e('Install', 'verb-lite'); ?> <a target="_blank" href="<?php echo esc_url('https://wordpress.org/plugins/wordpress-popular-posts/'); ?>"><?php esc_html_e('Wordpress Popular Posts', 'verb-lite'); ?></a> <?php esc_html_e('plugin', 'verb-lite'); ?></li>
                            <li><?php esc_html_e('Install', 'verb-lite'); ?> <a target="_blank" href="<?php echo esc_url('https://wordpress.org/plugins/social-pug/'); ?>"><?php esc_html_e('Social Pug', 'verb-lite'); ?></a> <?php esc_html_e('plugin', 'verb-lite'); ?></li>
                            <li><?php esc_html_e('Install', 'verb-lite'); ?> <a target="_blank" href="<?php echo esc_url('https://wordpress.org/plugins/mailchimp-for-wp/'); ?>"><?php esc_html_e('Mailchimp for Wordpress', 'verb-lite'); ?></a> <?php esc_html_e('plugin', 'verb-lite'); ?></li>
                        </ol>
                        <p>
                            <a class="button button-secondary" href="<?php echo esc_url('themes.php?page=tgmpa-install-plugins'); ?>"><?php esc_html_e('Install Plugins', 'verb-lite'); ?></a>
                        </p>
                    </div>
                    <div>
                        <h3><?php esc_html_e('Step 2 - Configure Plugins', 'verb-lite'); ?></h3>
                        <p><?php esc_html_e('Certain plugins will need to be configured in order for the theme to function as intended. It will only require a few minutes of your time. Click the button below to read the configuration instructions.', 'verb-lite'); ?></p>
                        <p><a class="button button-secondary" target="_blank" href="<?php echo esc_url('http://support.themely.com/knowledgebase/verb-configure-plugins/'); ?>"><?php esc_html_e('Configure Plugins', 'verb-lite'); ?></a></p>
                    </div>
                    <div>
                        <h3><?php esc_html_e('Theme Customizer', 'verb-lite'); ?></h3>
                        <p class="about"><?php esc_html_e('Verb Lite supports the default Wordpress Customizer for all theme settings. Click the button below to start customizing your site.', 'verb-lite'); ?></p>
                        <p>
                            <a class="button button-hero button-primary" href="<?php echo esc_url('customize.php'); ?>"><?php esc_html_e('Verb Lite Customizer', 'verb-lite'); ?></a>
                        </p>
                    </div>
                    <div>
                        <h3><?php esc_html_e('Theme Support', 'verb-lite'); ?></h3>
                        <p class="about"><?php esc_html_e('Support for Verb Lite is conducted through our support ticket system.', 'verb-lite'); ?></p>
                        <ul class="ul-square">
                            <li><a target="_blank" href="<?php echo esc_url('http://support.themely.com/forums/'); ?>"><?php esc_html_e('Support Forum', 'verb-lite'); ?></a></li>
                            <li><a target="_blank" href="<?php echo esc_url('http://support.themely.com/section/verb/'); ?>"><?php esc_html_e('Theme Documentation', 'verb-lite'); ?></a></li>
                        </ul>
                        <p><a class="button button-secondary" target="_blank" href="<?php echo esc_url('http://support.themely.com/forums/'); ?>"><?php esc_html_e('Create a support ticket', 'verb-lite'); ?></a></p>
                    </div>
                </div>
                <div class="right">
                    <div class="upgrade">
                        <h3><?php esc_html_e('Upgrade to Verb PRO!', 'verb-lite'); ?></h3>
                        <p class="about"><?php esc_html_e('Unlock all theme features!', 'verb-lite'); ?> <a target="_blank" href="<?php echo esc_url('http://demo.themely.com/verb/'); ?>"><?php esc_html_e('View the live demo', 'verb-lite'); ?></a></p>
                        <p class="red"><strong><?php esc_html_e('Save 10% with coupon code', 'verb-lite'); ?> <span class="border-red"><?php esc_html_e('THEMELY10', 'verb-lite'); ?></span></strong></p>
                        <ul class="ul-square">
                            <li><?php esc_html_e('CUSTOMIZE Font Type and Styles For Titles and Content', 'verb-lite'); ?></li>
                            <li><?php esc_html_e('CUSTOMIZE Footer Copyright Text', 'verb-lite'); ?></li>
                            <li><?php esc_html_e('CUSTOMIZE Layout Settings', 'verb-lite'); ?></li>
                            <li><?php esc_html_e('CUSTOMIZE Theme Colors', 'verb-lite'); ?></li>
                            <li><?php esc_html_e('UNLOCK Homepage Featured Section', 'verb-lite'); ?></li>
                            <li><?php esc_html_e('UNLOCK 5 Homepage Featured Layouts', 'verb-lite'); ?></li>
                            <li><?php esc_html_e('UNLOCK Social Sharing On Posts (Facebook, Twitter, Linkedin, Reddit, etc)', 'verb-lite'); ?></li>
                            <li><?php esc_html_e('UNLOCK Additional Theme Customizer Options', 'verb-lite'); ?></li>
                            <li><?php esc_html_e('UNLOCK 4 Additional Post Styles', 'verb-lite'); ?></li>
                            <li><?php esc_html_e('UNLOCK 4 Additional Widget Areas', 'verb-lite'); ?></li>
                            <li><?php esc_html_e('UNLOCK 2 Additional Page Templates', 'verb-lite'); ?></li>
                            <li><?php esc_html_e('UNLOCK Author Bio Section on Posts', 'verb-lite'); ?></li>
                            <li><?php esc_html_e('UNLOCK Related Posts Section', 'verb-lite'); ?></li>
                            <li><?php esc_html_e('UNLOCK Elegant Dropdown & Mobile Menu', 'verb-lite'); ?></li>
                            <li><?php esc_html_e('UNLOCK Additional Styling For Post Navigation, Breadcrumbs, Page Navigation + more', 'verb-lite'); ?></li>
                            <li><?php esc_html_e('MONETIZE Your Site With 4 Custom Sponsor/Advertiser Sections', 'verb-lite'); ?></li>
                            <li><?php esc_html_e('Custom Sponsor/Advertiser Widget', 'verb-lite'); ?></li>
                            <li><?php esc_html_e('FREE Child Theme', 'verb-lite'); ?></li>
                            <li><?php esc_html_e('No Restrictions!', 'verb-lite'); ?></li>
                            <li><?php esc_html_e('Priority Support', 'verb-lite'); ?></li>
                            <li><?php esc_html_e('Regular Theme Updates', 'verb-lite'); ?></li>
                        </ul>
                        <p>
                            <a class="button button-primary button-hero" target="_blank" href="<?php echo esc_url('https://www.themely.com/themes/verb/'); ?>"><?php esc_html_e('UPGRADE NOW', 'verb-lite'); ?></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php
	}

}

$GLOBALS['verb_lite_Welcome'] = new verb_lite_Welcome();