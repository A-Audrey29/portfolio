<?php

class Meow_MWL_Admin extends MeowCommon_Admin {

	private $core;
	public function __construct( $core ) {
		parent::__construct( MWL_PREFIX, MWL_ENTRY, MWL_DOMAIN, class_exists( 'MeowPro_MWL_Core' ) );
		$this->core = $core;

		if ( is_admin() ) {
			add_action( 'admin_menu', array( $this, 'app_menu' ) );
			add_action( 'admin_notices', array( $this, 'admin_notices' ) );

			$options = $this->core->get_all_options();

			if ( $options['map'] ?? false ) {
				add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
			}

			// Only loads the Lightbox Admin if we are on the Meow Dashboard or the Lightbox Settings
			// I didn't want to do this, but unfortunately the JS breaks Rank Math SEO...
			$isJsNeeded = isset( $_GET['page'] ) && ( $_GET['page'] === 'meowapps-main-menu' || $_GET['page'] === 'mwl_settings' );
			if ( $isJsNeeded ) {
				add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
			}

			$needsToUpdate = false;
			$mwl_map_api_key = get_option( 'mwl_map_api_key' );
			if ( !empty( $mwl_map_api_key ) ) {
				$options['googlemaps_token'] = $mwl_map_api_key;
				$needsToUpdate = true;
				delete_option( 'mwl_map_api_key' );
			}
			$mwl_map_style = get_option( 'mwl_map_style' );
			if ( !empty( $mwl_map_style ) ) {
				$options['googlemaps_style'] = $mwl_map_style;
				$needsToUpdate = true;
				delete_option( 'mwl_map_style' );
			}
			$mwl_selector = $options['selector'] ?? '.entry-content, .gallery, .mgl-gallery, .wp-block-gallery,  .wp-block-image';
			if ( empty( $mwl_selector ) ) {
				$options['selector'] = '.entry-content, .gallery, .mgl-gallery, .wp-block-gallery';
				$needsToUpdate = true;
			}
			if ( $needsToUpdate ) {
				$this->core->update_options( $options );
			}
		}
	}

	function add_meta_boxes() {
		add_meta_box( 'meta-meow-gps', 'Meow GPS', array( $this, 'metabox_meow_gps' ), 
			'attachment', 'side', 'low' );
	}

	function metabox_meow_gps( $post ) {
		$meta = wp_get_attachment_metadata( $post->ID );
		if ( !isset( $meta['image_meta']['geo_coordinates'] ) ) {
			Meow_MWL_Exif::get_gps_data( $post->ID, $meta );
		}
		$gps = apply_filters( 'mwl_img_gps', $meta['image_meta']['geo_coordinates'],	$post->ID, $meta );
		if ( empty( $gps ) ) {
			echo esc_attr( "No coordinates." );
		}
		else {
			echo esc_attr( "Coordinates: $gps" );
		}
	}

	public function mwl_settings() {
		echo '<div id="mwl-admin-settings"></div>';
	}

	function enqueue_scripts() {

		// Load the "vendor" scripts
		$physical_file = MWL_PATH . '/app/admin.js';
		$cache_buster = file_exists( $physical_file ) ? filemtime( $physical_file ) : MWL_VERSION;
		wp_register_script( 'mwl-admin-js-vendor', MWL_URL . '/app/vendor.js',
			['wp-editor', 'wp-element', 'wp-i18n'], $cache_buster
		);

		// Load the "admin" scripts
		$physical_file = MWL_PATH . '/app/admin.js';
		wp_register_script( 'mwl-admin-js', MWL_URL . '/app/admin.js', array( 'mwl-admin-js-vendor' ), $cache_buster );

		// Load the fonts
		wp_register_style( 'meow-neko-ui-lato-font', '//fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap');
		wp_enqueue_style( 'meow-neko-ui-lato-font' );

		// Localize and options
		global $wplr;
		wp_localize_script( 'mwl-admin-js', 'mwl_meow_lightbox', array_merge( [
			//'api_nonce' => wp_create_nonce( 'mfrh_media_file_renamer' ),
			'api_url' => get_rest_url( null, '/meow-lightbox/v1/' ),
			'rest_url' => get_rest_url(),
			'plugin_url' => MWL_URL,
			'prefix' => MWL_PREFIX,
			'domain' => MWL_DOMAIN,
			'rest_nonce' => wp_create_nonce( 'wp_rest' ),
			'is_pro' => class_exists( 'MeowPro_MWL_Core' ),
			'is_registered' => !!$this->is_registered(),
			'options' => $this->core->get_all_options(),
		] ) );

		wp_enqueue_script( 'mwl-admin-js' );
	}

	function admin_notices() {
		$permastruct = get_option( 'permalink_structure' );
		if ( empty( $permastruct ) ) {
		?>
			<div class="notice notice-error is-dismissible">
					<p><?php _e( 'Meow Lightbox will not work properly if your permalinks are set up on "Plain". Please pick a dynamic structure for your permalinks (Settings > Permalinks).', 'meow-lightbox' ); ?></p>
			</div>
		<?php
		}
		if ( !function_exists( "exif_read_data" ) ) {
			?>
			<div class="notice notice-error is-dismissible">
					<p><?php _e( 'The function <i>exif_read_data</i> is not available on your server, but it is required by the Meow Lightbox. Please ask your hosting service to enable the <i>php_exif</i> module.', 'meow-lightbox' ); ?></p>
			</div>
			<?php
		}
	}

	function app_menu() {
		add_submenu_page( 'meowapps-main-menu', __( 'Lightbox', MWL_DOMAIN ), __( 'Lightbox', MWL_DOMAIN ), 
			'manage_options', 'mwl_settings', array( $this, 'mwl_settings' )
		);
	}
}

?>