<?php
/**
 * #####################################################################
 * ### EASY SLIDER REVOLUTION PLUGIN - PHP FUNCTIONS FOR WP DASHBOARD ###
 * #####################################################################
 *
 * @package     easy_slider_revolution
 * @author      Trident Technolabs
 * @copyright   https://tridenttechnolabs.com
 * @license     GPLv2 or later
 */

/**
 * ##### PLUGIN REGISTRATION HOOK - RUN WHEN THE PLUGIN IS ACTIVATED #####
 */
if (!function_exists('esrcpt_slider_plugin_activation')) {
	function esrcpt_slider_plugin_activation() {
	/// INSERT A 'SAMPLE SLIDER' CUSTOM POST INTO THE DATABASE.
		$sample_post_title = 'Sample Slider';

		// check if the 'sample slider' already exists (plugin has been activated before).
		$cpt_post = get_page_by_title( $sample_post_title, 'OBJECT', 'es_slider' );

		if ( is_null( $cpt_post ) ) {
			// create the post object.
			$sample_post = array(
				'post_title'   => $sample_post_title,
				'post_content' => '',
				'post_status'  => 'publish',
				'post_type'    => 'es_slider',
			);
			// insert the post into the database.
			$cpt_id = wp_insert_post( $sample_post );

			// insert meta data for the 'sample slider' slides.
			for ( $i = 1; $i <= 3; $i++ ) {
				if ( 1 === $i ) {
					$color = '#f4cccc';
					$image = 'Trident-logo.png';
					$button_background = '#753232';
					$button_color = '#fff';
				} elseif ( 2 === $i ) {
					$color = '#d9ead3';
					$image = 'trident-favicon.png';
					$button_background = '#347a1b';
					$button_color = '#000';
				} elseif ( 3 === $i ) {
					$color = '#fce5cd';
					$image = 'bg_placeholder.png';
					$button_background = '#4f3214';
					$button_color = '#fff';
				} 

				$content  = "<div style='text-align: center; padding-bottom: 10px;'>\n";
				$imageurl = "../images/". $image;
				$content .= "<div><img src='" . plugins_url( $imageurl, __FILE__ ). "' height='50px'  alt='Logo " . $i . "' /></div>\n";
				$content .= "<h3>Company Name</h3>\n";
				$content .= "<p>Lorem ipsum dolor sit amet, cu usu cibo vituperata, id ius probo maiestatis inciderint, sit eu vide volutpat.</p>\n";
				$content .= "</div>\n";
				update_post_meta( $cpt_id, 'sa_slide' . $i . '_content', $content );
				$image_data = '~left top~contain~no-repeat~'.$color ;
				update_post_meta( $cpt_id, 'sa_slide' . $i . '_image_data', $image_data );
				update_post_meta( $cpt_id, 'sa_slide' . $i . '_button_background',$button_background);
				update_post_meta( $cpt_id, 'sa_slide' . $i . '_button_color',$button_color);
				update_post_meta( $cpt_id, 'sa_slide' . $i . '_link_text','Learn More');
				update_post_meta( $cpt_id, 'sa_slide' . $i . '_link_url', 'https://tridenttechnolabs.com' );
				update_post_meta( $cpt_id, 'sa_slide' . $i . '_link_target', '_self' );
				update_post_meta( $cpt_id, 'sa_slide' . $i . '_popup_type', 'NONE' );
				update_post_meta( $cpt_id, 'sa_slide' . $i . '_popup_imageid', '' );
				update_post_meta( $cpt_id, 'sa_slide' . $i . '_popup_imagetitle', '' );
				update_post_meta( $cpt_id, 'sa_slide' . $i . '_popup_video_id', '' );
				update_post_meta( $cpt_id, 'sa_slide' . $i . '_popup_video_type', '' );
				update_post_meta( $cpt_id, 'sa_slide' . $i . '_popup_background', 'no' );
				update_post_meta( $cpt_id, 'sa_slide' . $i . '_popup_html', '' );
				update_post_meta( $cpt_id, 'sa_slide' . $i . '_popup_shortcode', '0' );
				update_post_meta( $cpt_id, 'sa_slide' . $i . '_popup_bgcol', '#ffffff' );
				update_post_meta( $cpt_id, 'sa_slide' . $i . '_popup_width', '600' );
			}
			// insert meta data for the 'sample slider' configuration.
			update_post_meta( $cpt_id, 'sa_disable_visual_editor', '0' );
			update_post_meta( $cpt_id, 'sa_num_slides', 3 );
			update_post_meta( $cpt_id, 'sa_slide_duration', 10 );
			update_post_meta( $cpt_id, 'sa_slide_transition', 0.3 );
			update_post_meta( $cpt_id, 'sa_slide_by', 1 );
			update_post_meta( $cpt_id, 'sa_loop_slider', '1' );
			update_post_meta( $cpt_id, 'sa_stop_hover', '1' );
			update_post_meta( $cpt_id, 'sa_nav_arrows', '1' );
			update_post_meta( $cpt_id, 'sa_pagination', '1' );
			update_post_meta( $cpt_id, 'sa_shortcodes', '0' );
			update_post_meta( $cpt_id, 'sa_random_order', '1' );
			update_post_meta( $cpt_id, 'sa_reverse_order', '0' );
			update_post_meta( $cpt_id, 'sa_mouse_drag', '0' );
			update_post_meta( $cpt_id, 'sa_touch_drag', '1' );
			update_post_meta( $cpt_id, 'sa_mousewheel', '0' );
			update_post_meta( $cpt_id, 'sa_click_advance', '0' );
			update_post_meta( $cpt_id, 'sa_auto_height', '0' );
			update_post_meta( $cpt_id, 'sa_vert_center', '0' );
			update_post_meta( $cpt_id, 'sa_items_width1', 1 );
			update_post_meta( $cpt_id, 'sa_items_width2', 2 );
			update_post_meta( $cpt_id, 'sa_items_width3', 3 );
			update_post_meta( $cpt_id, 'sa_items_width4', 4 );
			update_post_meta( $cpt_id, 'sa_items_width5', 4 );
			update_post_meta( $cpt_id, 'sa_items_width6', 4 );
			update_post_meta( $cpt_id, 'sa_transition', '' );
			update_post_meta( $cpt_id, 'sa_hero_slider', '0' );
			update_post_meta( $cpt_id, 'sa_showcase_slider', '0' );
			update_post_meta( $cpt_id, 'sa_showcase_width', '120' );
			update_post_meta( $cpt_id, 'sa_showcase_tablet', '1' );
			update_post_meta( $cpt_id, 'sa_showcase_width_tab', '130' );
			update_post_meta( $cpt_id, 'sa_showcase_mobile', '0' );
			update_post_meta( $cpt_id, 'sa_showcase_width_mob', '140' );
			update_post_meta( $cpt_id, 'sa_css_id', 'sample_slider' );
			update_post_meta( $cpt_id, 'sa_background_color', '#fafafa' );
			update_post_meta( $cpt_id, 'sa_border_width', 1 );
			update_post_meta( $cpt_id, 'sa_border_color', '#f0f0f0' );
			update_post_meta( $cpt_id, 'sa_border_radius', 5 );
			update_post_meta( $cpt_id, 'sa_wrapper_padd_top', 8 );
			update_post_meta( $cpt_id, 'sa_wrapper_padd_right', 8 );
			update_post_meta( $cpt_id, 'sa_wrapper_padd_bottom', 8 );
			update_post_meta( $cpt_id, 'sa_wrapper_padd_left', 8 );
			update_post_meta( $cpt_id, 'sa_slide_min_height_perc', 300 );
			update_post_meta( $cpt_id, 'sa_slide_padding_tb', 5 );
			update_post_meta( $cpt_id, 'sa_slide_padding_lr', 5 );
			update_post_meta( $cpt_id, 'sa_slide_margin_lr', 0 );
			update_post_meta( $cpt_id, 'sa_autohide_arrows', '1' );
			update_post_meta( $cpt_id, 'sa_dot_per_slide', '0' );
			update_post_meta( $cpt_id, 'sa_slide_icons_location', 'Center Center' );
			update_post_meta( $cpt_id, 'sa_slide_icons_visible', '0' );
			update_post_meta( $cpt_id, 'sa_slide_icons_color', 'white' );
			update_post_meta( $cpt_id, 'sa_thumbs_active', '0' );
			update_post_meta( $cpt_id, 'sa_thumbs_location', 'Inside Bottom' );
			update_post_meta( $cpt_id, 'sa_thumbs_image_size', 'thumbnail' );
			update_post_meta( $cpt_id, 'sa_thumbs_padding', 3 );
			update_post_meta( $cpt_id, 'sa_thumbs_width', 150 );
			update_post_meta( $cpt_id, 'sa_thumbs_height', 85 );
			update_post_meta( $cpt_id, 'sa_thumbs_opacity', 50 );
			update_post_meta( $cpt_id, 'sa_thumbs_border_width', 0 );
			update_post_meta( $cpt_id, 'sa_thumbs_border_color', '#ffffff' );
			update_post_meta( $cpt_id, 'sa_thumbs_resp_tablet', 75 );
			update_post_meta( $cpt_id, 'sa_thumbs_resp_mobile', 50 );
		}
	}
}
/**
 * ##### ACTION HOOK - REGISTER SCRIPTS (JS AND CSS) FOR WordPress DASHBOARD ONLY #####
 */
if (!function_exists('esrcpt_slider_register_admin_scripts')) {
	function esrcpt_slider_register_admin_scripts() {
		$screen      = get_current_screen();
		$plugin_path = dirname( __FILE__ ) . '/../easy_slider_revolution.php';
		$plugin_data = get_plugin_data( $plugin_path, false, false );
		$plugin_ver  = $plugin_data['Version'];
		if ( 'es_slider' === $screen->post_type ) {
			// ONLY LOAD SCRIPTS (JS & CSS) WITHIN 'EASY SLIDER' SCREENS IN WordPress DASHBOARD.
			// enqueues all scripts, styles & settings required in order to use the WordPress Media JS APIs.
			wp_enqueue_media();
			// load 'WordPress jquery-ui' scripts.
			wp_enqueue_script( 'jquery-ui-core' );
			wp_enqueue_script( 'jquery-ui-accordion' );
			wp_enqueue_script( 'jquery-ui-tabs' );
			wp_enqueue_script( 'jquery-ui-slider' );
			wp_enqueue_script( 'jquery-ui-sortable' );
			wp_enqueue_script( 'jquery-ui-draggable' );
			wp_enqueue_script( 'jquery-ui-droppable' );
			wp_enqueue_script( 'jquery-ui-resize' );
			wp_enqueue_script( 'jquery-ui-dialog' );
			wp_enqueue_script( 'jquery-ui-button' );
			wp_enqueue_script( 'jquery-ui-tooltip' );
			wp_enqueue_script( 'jquery-ui-spinner' );
			// load 'spectrum colorpicker' script and css.
			wp_register_script( 'spectrum_js', ESRCPT_PLUGIN_PATH . 'spectrum/spectrum.js', array( 'jquery' ), '1.8.0', true );
			wp_enqueue_script( 'spectrum_js' );
			wp_register_style( 'spectrum_css', ESRCPT_PLUGIN_PATH . 'spectrum/spectrum.css', array(), '1.8.0' );
			wp_enqueue_style( 'spectrum_css' );
			// load 'jquery-ui' css.
			wp_register_style( 'admin_ui_css', ESRCPT_PLUGIN_PATH . 'css/admin-user-interface.min.css', array(), '1.11.4' );
			wp_enqueue_style( 'admin_ui_css' );
			// load 'slide-anything' custom javasript and css for WordPress admin.
			wp_register_script( 'sa-slider-admin-script', ESRCPT_PLUGIN_PATH . 'js/easy-slider-revolution-admin.js', array( 'jquery' ), $plugin_ver, true );
			wp_enqueue_script( 'sa-slider-admin-script' );
			wp_register_style( 'sa-slider-admin-css', ESRCPT_PLUGIN_PATH . 'css/easy-slider-revolution-admin.css', array(), $plugin_ver );
			wp_enqueue_style( 'sa-slider-admin-css' );
		}
		if ( 'settings_page_sa-settings-page' === $screen->id ) {
			// EASY SLIDER SETTINGS PAGE - load custom css script.
			wp_register_style( 'sa-slider-admin-css', ESRCPT_PLUGIN_PATH . 'css/easy-slider-revolution-admin.css', array(), $plugin_ver );
			wp_enqueue_style( 'sa-slider-admin-css' );
		}
		// style for TINYMCE editor 'EASY SLIDER sliders' button.
		wp_register_style( 'tinymce-css', ESRCPT_PLUGIN_PATH . 'css/tinymce_style.css', array(), $plugin_ver );
		wp_enqueue_style( 'tinymce-css' );
	}
}

/**
 * ##### ADD A CUSTOM BUTTON TO WordPress TINYMCE EDITOR (ON PAGES AND POSTS ONLY) #####
 */
if (!function_exists('esrcpt_slider_add_tinymce_button')) {
	function esrcpt_slider_add_tinymce_button() {
		global $typenow;
		// check user permissions.
		if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
			return;
		}
		// verify the post type - only display button on posts and pages.
		if ( ! in_array( $typenow, array( 'post', 'page' ), true ) ) {
			return;
		}
		// check if WYSIWYG is enabled.
		if ( 'true' === get_user_option( 'rich_editing' ) ) {
			add_filter( 'mce_external_plugins', 'cpt_slider_add_tinymce_plugin' );
			add_filter( 'mce_buttons', 'esrcpt_slider_register_tinymce_button' );
		}
	}
}

/**
 * ##### ACTION HOOK - REGISTER THE 'EASY SLIDER' CUSTOM POST TYPE #####
 */
if (!function_exists('esrcpt_slider_register')) {
	function esrcpt_slider_register() {
		$labels = array(
			'name'               => _x( 'Easy Sliders', 'post type general name', 'sa_slider_textdomain' ),
			'singular_name'      => _x( 'Slider', 'post type singular name', 'sa_slider_textdomain' ),
			'menu_name'          => __( 'Easy Slider', 'sa_slider_textdomain' ),
			'add_new'            => __( 'Add New Slider', 'sa_slider_textdomain' ),
			'add_new_item'       => __( 'Add New Slider', 'sa_slider_textdomain' ),
			'edit_item'          => __( 'Edit Slider', 'sa_slider_textdomain' ),
			'new_item'           => __( 'New Slider', 'sa_slider_textdomain' ),
			'view_item'          => __( 'View Slider', 'sa_slider_textdomain' ),
			'not_found'          => __( 'No sliders found', 'sa_slider_textdomain' ),
			'not_found_in_trash' => __( 'No sliders found in Trash', 'sa_slider_textdomain' ),
		);
		$args   = array(
			'labels'              => $labels,
			'description'         => __( 'Easy Slider', 'sa_slider_textdomain' ),
			'public'              => false,
			'exclude_from_search' => true,
			'publicly_queryable'  => false,
			'show_ui'             => true,
			'show_in_nav_menus'   => false,
			'show_in_menu'        => true,
			'menu_position'       => 10,
			'menu_icon'           => 'dashicons-images-alt2',
			'hierarchical'        => false,
			'supports'            => array( 'title' ),
			'has_archive'         => false,
			'query_var'           => false,
			'can_export'          => true,
			'rewrite'             => true,
			'capability_type'     => 'post',
		);
		register_post_type( 'es_slider', $args ); //custom post type register
	}
}



/**
 * ##### WP DASHBOARD - SLIDER LIST PAGE #####
 * ACTION HOOK - ADD/REMOVE (HOVER-OVER) ROW ACTIONS WHEN THIS CUSTOM POST TYPE IS LISTED IN DASHBOARD
 *
 * @param array $actions Row Actions.
 * @param array $post Post Type.
 */
if (!function_exists('esrcpt_slider_row_actions')) {
	function esrcpt_slider_row_actions( $actions, $post ) {
		if ( 'es_slider' === $post->post_type ) {
			// REMOVE 'Quick Edit' ROW ACTION.
			unset( $actions['inline hide-if-no-js'] );
		}
		return $actions;
	}
}

/**
 * ##### FILTER TO ADD/REMOVE COLUMNS DISPLAYED FOR THIS CUSTOM POST TYPE IN DASHBOARD #####
 *
 * @param array $columns Post List Columns.
 */
if (!function_exists('esrcpt_slider_modify_columns')) {
	function esrcpt_slider_modify_columns( $columns ) {
		// new columns to be added.
		$new_columns = array(
			'slides'    => 'Slides',
			'shortcode' => 'Shortcode',
		);
		$columns     = array_slice( $columns, 0, 2, true ) + $new_columns + array_slice( $columns, 2, null, true );
		return $columns;
	}
}

/**
 * ##### DEFINE OUTPUT FOR EACH CUSTOM COLUMN DISPLAYED FOR THIS POST TYPE IN THE DASHBOARD #####
 *
 * @param array $column Post List Column.
 */
if (!function_exists('esrcpt_slider_custom_column_content')) {
	function esrcpt_slider_custom_column_content( $column ) {
		// get post object for this row.
		global $post;

		// output for the 'Slides' column.
		if ( 'slides' === $column ) {
			$num_slides = get_post_meta( $post->ID, 'sa_num_slides', true );
			if ( '' === $num_slides ) {
				$num_slides = '-';
			}
			echo esc_html( $num_slides );
		}

		// output for the 'Shortcode' column.
		if ( 'shortcode' === $column ) {
			$shortcode = "[easy-slider-revolution id='" . $post->ID . "']";
			echo esc_html( $shortcode );
		}
	}
}

/**
 * ##### ACTION HOOK: admin_footer #####
 */
if (!function_exists('esrcpt_slider_get_tinymce_shortcode_array')) {
	function esrcpt_slider_get_tinymce_shortcode_array() {
		$screen = get_current_screen();
		if ( 'envira' !== $screen->post_type ) { // ### BUG FIX - CLASHING WITH ENVIRA GALLERY (VER 2.0.13) ###.
			// display 2 javascript arrays (in footer) containing all the slide anything post titles and post ids.
			// these 2 arrays are used to display the shortcode options by the TinyMCE button.
			echo "<script type='text/javascript'>\n";
			echo "var sa_title_arr = new Array();\n";
			echo "var sa_id_arr = new Array();\n";

			$args            = array(
				'post_type'      => 'es_slider',
				'post_status'    => 'publish',
				'posts_per_page' => -1,
			);
			$sa_slider_query = new WP_Query( $args );
			$count           = 0;
			foreach ( $sa_slider_query->posts as $sa_post ) {
				$title = $sa_post->post_title;
				echo 'sa_title_arr[' . esc_js( $count ) . "] = '" . esc_js( $title ) . "';\n";
				echo 'sa_id_arr[' . esc_js( $count ) . "] = '" . esc_js( $sa_post->ID ) . "';\n";
				$count++;
			}
			echo "</script>\n";
		}
	}
}



/**
 * ##### ACTION HOOK - ADD META BOXES TO THE 'EASY SLIDER' CUSTOM POST TYPE #####
 */
if (!function_exists('esrcpt_slider_add_meta_boxes')) {
	function esrcpt_slider_add_meta_boxes() {
		global $post;
		global $current_user;
		if ( ! is_object( $post ) ) {
			return;
		}

		$info_added      = get_post_meta( $post->ID, 'sa_info_added', true );
		$info_deleted    = get_post_meta( $post->ID, 'sa_info_deleted', true );
		$info_duplicated = get_post_meta( $post->ID, 'sa_info_duplicated', true );
		$info_moved      = get_post_meta( $post->ID, 'sa_info_moved', true );
		if ( '1' === $info_added ) {
			add_meta_box( 'esrcpt_slide_added', __( 'Information' ), 'esrcpt_slide_added_content', 'es_slider', 'normal', 'high' );
			update_post_meta( $post->ID, 'sa_info_added', '0' );
		}
		if ( '1' === $info_deleted ) {
			add_meta_box( 'esrcpt_slide_deleted', __( 'Information' ), 'esrcpt_slide_deleted_content', 'es_slider', 'normal', 'high' );
			update_post_meta( $post->ID, 'sa_info_deleted', '0' );
		}
		if ( '1' === $info_duplicated ) {
			add_meta_box( 'esrcpt_slide_duplicated', __( 'Information' ), 'esrcpt_slide_duplicated_content', 'es_slider', 'normal', 'high' );
			update_post_meta( $post->ID, 'sa_info_duplicated', '0' );
		}
		if ( '1' === $info_moved ) {
			add_meta_box( 'esrcpt_slide_moved', __( 'Information' ), 'esrcpt_slide_moved_content', 'es_slider', 'normal', 'high' );
			update_post_meta( $post->ID, 'sa_info_moved', '0' );
		}
		add_meta_box( 'esrcpt_slider_slides', __( 'Slides' ), 'esrcpt_slider_slides_content', 'es_slider', 'normal', 'high' );
		add_meta_box( 'esrcpt_slider_shortcode', __( 'Shortcode' ), 'esrcpt_slider_shortcode_content', 'es_slider', 'side', 'high' );
		remove_meta_box( 'mymetabox_revslider_0', 'es_slider', 'normal' ); // remove revolution slider meta box.
	}
}


/**
 * ##### META BOX CONTENT - 'Information' (slide added) BOX #####
 */
if (!function_exists('esrcpt_slide_added_content')) {
	function esrcpt_slide_added_content() {
		echo "<h3 id='sa_slide_added_mess'>A new slide has been added to this slider.</h3>";
	}
}




/**
 * ##### META BOX CONTENT - 'Information' (slide deleted) BOX #####
 */
if (!function_exists('esrcpt_slide_deleted_content')) {
	function esrcpt_slide_deleted_content() {
		echo "<h3 id='sa_slide_deleted_mess'>A slide has been deleted from this slider.</h3>";
	}
}




/**
 * ##### META BOX CONTENT - 'Information' (slide duplicated) BOX #####
 */
if (!function_exists('esrcpt_slide_duplicated_content')) {
	function esrcpt_slide_duplicated_content() {
		echo "<h3 id='sa_slide_duplicated_mess'>A slide has been duplicated (copied) within this slider.</h3>";
	}
}



/**
 * ##### META BOX CONTENT - 'Information' (slide moved) BOX #####
 */
if (!function_exists('esrcpt_slide_moved_content')) {
	function esrcpt_slide_moved_content() {
		echo "<h3 id='sa_slide_moved_mess'>The slide order of this slider has been has changed.</h3>";
	}
}

/**
 * ##### META BOX CONTENT - 'Slides' BOX #####
 *
 * @param array $post Custom Post 'es_slider'.
 */
if (!function_exists('esrcpt_slider_slides_content')) {
function esrcpt_slider_slides_content( $post ) {

$num_slides = get_post_meta( $post->ID, 'sa_num_slides', true );
$slide_height = get_post_meta( $post->ID, 'sa_slide_min_height_perc', true );
if('' === $slide_height){
$slide_height = '';
}
	echo "<div id='sa_slider_settings'>\n";

	echo '<div  class=""><span style="margin-right:20px">Slider Height:</span>';
		echo "<input type='text' style='width:50px' id='slider_height' name='slider_height' placeholder='500' ";
		echo "value=''/>px</div>\n";

	// NONCE TO PREVENT CSRF SECURITY ATTACKS.
	wp_nonce_field( basename( __FILE__ ), 'nonce_save_slider' );

	// HIDDEN FIELD - NUMBER OF SLIDES.
	if ( '' === $num_slides ) {
		// new slider is being created.
		echo "<input type='hidden' id='num_slides_id' name='sa_num_slides' value='3'/>\n";
	} else {
		// existing slider.
		$num_slides = intval( $num_slides );
		echo "<input type='hidden' id='num_slides_id' name='sa_num_slides' value='" . esc_attr( $num_slides ) . "'/>\n";
	}
	// HIDDEN FIELD - SLIDE ADDED INDICATOR.
	echo "<input type='hidden' id='sa_info_added' name='sa_info_added' value='0'/>\n";
	// HIDDEN FIELD - SLIDE DELETED INDICATOR.
	echo "<input type='hidden' id='sa_info_deleted' name='sa_info_deleted' value='0'/>\n";
	// HIDDEN FIELD - SLIDE DUPLICATED INDICATOR.
	echo "<input type='hidden' id='sa_info_duplicated' name='sa_info_duplicated' value='0'/>\n";
	// HIDDEN FIELD - SLIDE MOVED UP INDICATOR.
	echo "<input type='hidden' id='sa_info_moved' name='sa_info_moved' value='0'/>\n";
	// HIDDEN FIELD - DUPLICATE SLIDE NUMBER.
	echo "<input type='hidden' id='sa_duplicate_slide' name='sa_duplicate_slide' value='0'/>\n";
	// HIDDEN FIELD - MOVE SLIDE UP (SLIDE NUMBER).
	echo "<input type='hidden' id='sa_move_slide_up' name='sa_move_slide_up' value='0'/>\n";
	// HIDDEN FIELD - PRO VERSION.
	echo "<input type='hidden' id='sa_pro_version' name='sa_pro_version' value='1'/>\n";
	// SLIDE DURATION.
	$slide_duration = get_post_meta( $post->ID, 'sa_slide_duration', true );
	if ( '' === $slide_duration ) {
		$slide_duration = 5;
	}
echo "<input type='hidden' id='sa_slide_duration' name='sa_slide_duration' readonly value='" . esc_attr( $slide_duration ) . "'>\n";
		$slide_transition = get_post_meta( $post->ID, 'sa_slide_transition', true );
	if ( '' === $slide_transition ) {
		$slide_transition = 0.2;
	}

echo "<input type='hidden' id='sa_slide_transition' name='sa_slide_transition' readonly value='" . esc_attr( $slide_transition ) . "'>\n";

	$slide_by = get_post_meta( $post->ID, 'sa_slide_by', true );
	if ( '' === $slide_by ) {
		$slide_by = 1;
	}

echo "<input type='hidden' id='sa_slide_by' name='sa_slide_by' readonly value='" . esc_attr( $slide_by ) . "'>";
		$loop_slider = get_post_meta( $post->ID, 'sa_loop_slider', true );
	if ( '' === $loop_slider ) {
		$loop_slider = '1';
	}
echo "<input type='hidden' id='sa_loop_slider' name='sa_loop_slider' value='1' />";
	$stop_hover = get_post_meta( $post->ID, 'sa_stop_hover', true );
	if ( '' === $stop_hover ) {
		$stop_hover = '1';
	}
echo "<input type='hidden' id='sa_stop_hover' name='sa_stop_hover' value='1' />";

echo "<input type='hidden' id='sa_random_order' name='sa_random_order' value='0'/>";
echo "<input type='hidden' id='sa_reverse_order' name='sa_reverse_order' value='0'/>";
echo "<input type='hidden' id='sa_shortcodes' name='sa_shortcodes' value='0' />";
echo "<input type='hidden' id='sa_vert_center' name='sa_vert_center' value='0'/>";
echo "<input type='hidden' id='sa_nav_arrows' name='sa_nav_arrows' value='1' />";
echo "<input type='hidden' id='sa_pagination' name='sa_pagination' value='1' />";
echo "<input type='hidden' id='sa_mouse_drag' name='sa_mouse_drag' value='1' />";
echo "<input type='hidden' id='sa_touch_drag' name='sa_touch_drag' value='1' />";
echo "<input type='hidden' id='sa_mousewheel' name='sa_mousewheel' value='0'/>";
echo "<input type='hidden' id='sa_click_advance' name='sa_click_advance' value='0'/>";
echo "<input type='hidden' id='sa_auto_height' name='sa_auto_height' value='0'/>";
echo "<input type='hidden' id='sa_disable_visual_editor' name='sa_disable_visual_editor' value='0'/>";

$num_slides    = get_post_meta( $post->ID, 'sa_num_slides', true );
	$slider_css_id = get_post_meta( $post->ID, 'sa_css_id', true );
	// DISABLE VISUAL EDITOR CHECKBOX.
	$disable_visual_editor = get_post_meta( $post->ID, 'sa_disable_visual_editor', true );
	if ( '' === $disable_visual_editor ) {
		$disable_visual_editor = '0';
	}

	// SLIDER EDITOR BOX SETTINGS.
	if ( '1' === $disable_visual_editor ) {
		$editor_args = array(
			'tinymce'       => false,
			'wpautop'       => false,
			'media_buttons' => true,
			'editor_class'  => 'sa_slide_content',
			'editor_height' => '250',
		);
	} else {
		$editor_args = array(
			'tinymce'       => true,
			'wpautop'       => false,
			'media_buttons' => true,
			'editor_class'  => 'sa_slide_content',
			'editor_height' => '250',
		);
	}
	if ( '' === $num_slides ) {
		// A NEW SLIDER IS BEING CREATED - ADD 3 INITIAL SLIDES.
		$num_slides                        = 3;
		$slide_data[0]['edit_id']          = 'sa_slide1_content';
		$slide_data[0]['content']          = 'Slide content';
		$slide_data[0]['del_id']           = 'sa_slide1_delete';
		$slide_data[0]['image_data']       = 'sa_slide1_image_data';
		$slide_data[0]['image_id']         = 'sa_slide1_image_id';
		$slide_data[0]['thumb']            = 'slide1_thumb';
		$slide_data[0]['image_del']        = 'slide1_image_del';
		$slide_data[0]['image_pos']        = 'sa_slide1_image_pos';
		$slide_data[0]['image_size']       = 'sa_slide1_image_size';
		$slide_data[0]['image_repeat']     = 'sa_slide1_image_repeat';
		$slide_data[0]['image_color']      = 'sa_slide1_image_color';
		$slide_data[0]['link_text']         = 'sa_slide1_link_text';
		$slide_data[0]['link_url']         = 'sa_slide1_link_url';
		$slide_data[0]['link_target']      = 'sa_slide1_link_target';
		$slide_data[0]['button_background'] = 'sa_slide1_button_background';
		$slide_data[0]['button_color']      = 'sa_slide1_button_color';
		$slide_data[0]['slide_no']         = 1;
		$slide_data[1]['edit_id']          = 'sa_slide2_content';
		$slide_data[1]['content']          = 'Slide content';
		$slide_data[1]['del_id']           = 'sa_slide2_delete';
		$slide_data[1]['image_data']       = 'sa_slide2_image_data';
		$slide_data[1]['image_id']         = 'sa_slide2_image_id';
		$slide_data[1]['thumb']            = 'slide2_thumb';
		$slide_data[1]['image_del']        = 'slide2_image_del';
		$slide_data[1]['image_pos']        = 'sa_slide2_image_pos';
		$slide_data[1]['image_size']       = 'sa_slide2_image_size';
		$slide_data[1]['image_repeat']     = 'sa_slide2_image_repeat';
		$slide_data[1]['image_color']      = 'sa_slide2_image_color';
		$slide_data[1]['link_url']         = 'sa_slide2_link_url';
		$slide_data[1]['link_text']         = 'sa_slide2_link_text';
		$slide_data[1]['link_target']      = 'sa_slide2_link_target';
		$slide_data[1]['button_background'] = 'sa_slide2_button_background';
		$slide_data[1]['button_color']      = 'sa_slide2_button_color';
		$slide_data[1]['slide_no']         = 2;
		$slide_data[2]['edit_id']          = 'sa_slide3_content';
		$slide_data[2]['content']          = 'Slide content';
		$slide_data[2]['del_id']           = 'sa_slide3_delete';
		$slide_data[2]['image_data']       = 'sa_slide3_image_data';
		$slide_data[2]['image_id']         = 'sa_slide3_image_id';
		$slide_data[2]['thumb']            = 'slide3_thumb';
		$slide_data[2]['image_del']        = 'slide3_image_del';
		$slide_data[2]['image_pos']        = 'sa_slide3_image_pos';
		$slide_data[2]['image_size']       = 'sa_slide3_image_size';
		$slide_data[2]['image_repeat']     = 'sa_slide3_image_repeat';
		$slide_data[2]['image_color']      = 'sa_slide3_image_color';
		$slide_data[2]['link_url']         = 'sa_slide3_link_url';
		$slide_data[2]['link_text']         = 'sa_slide3_link_text';
		$slide_data[2]['link_target']      = 'sa_slide3_link_target';
		$slide_data[2]['button_background'] = 'sa_slide3_button_background';
		$slide_data[2]['button_color']      = 'sa_slide3_button_color';
		$slide_data[2]['slide_no']         = 3;
		$slide_data[0]['popup_type']       = 'sa_slide1_popup_type';
		$slide_data[0]['popup_imageid']    = 'sa_slide1_popup_imageid';
		$slide_data[0]['popup_imagetitle'] = 'sa_slide1_popup_imagetitle';
		$slide_data[0]['popup_video_id']   = 'sa_slide1_popup_video_id';
		$slide_data[0]['popup_video_type'] = 'sa_slide1_popup_video_type';
		$slide_data[0]['popup_background'] = 'sa_slide1_popup_background';
		$slide_data[0]['popup_html']       = 'sa_slide1_popup_html';
		$slide_data[0]['popup_shortcode']  = 'sa_slide1_popup_shortcode';
		$slide_data[0]['popup_bgcol']      = 'sa_slide1_popup_bgcol';
		$slide_data[0]['popup_width']      = 'sa_slide1_popup_width';
		$slide_data[1]['popup_type']       = 'sa_slide2_popup_type';
		$slide_data[1]['popup_imageid']    = 'sa_slide2_popup_imageid';
		$slide_data[1]['popup_imagetitle'] = 'sa_slide2_popup_imagetitle';
		$slide_data[1]['popup_video_id']   = 'sa_slide2_popup_video_id';
		$slide_data[1]['popup_video_type'] = 'sa_slide2_popup_video_type';
		$slide_data[1]['popup_background'] = 'sa_slide2_popup_background';
		$slide_data[1]['popup_html']       = 'sa_slide2_popup_html';
		$slide_data[1]['popup_shortcode']  = 'sa_slide2_popup_shortcode';
		$slide_data[1]['popup_bgcol']      = 'sa_slide2_popup_bgcol';
		$slide_data[1]['popup_width']      = 'sa_slide2_popup_width';
		$slide_data[2]['popup_type']       = 'sa_slide3_popup_type';
		$slide_data[2]['popup_imageid']    = 'sa_slide3_popup_imageid';
		$slide_data[2]['popup_imagetitle'] = 'sa_slide3_popup_imagetitle';
		$slide_data[2]['popup_video_id']   = 'sa_slide3_popup_video_id';
		$slide_data[2]['popup_video_type'] = 'sa_slide3_popup_video_type';
		$slide_data[2]['popup_background'] = 'sa_slide3_popup_background';
		$slide_data[2]['popup_html']       = 'sa_slide3_popup_html';
		$slide_data[2]['popup_shortcode']  = 'sa_slide3_popup_shortcode';
		$slide_data[2]['popup_bgcol']      = 'sa_slide3_popup_bgcol';
		$slide_data[2]['popup_width']      = 'sa_slide3_popup_width';
	} else {
		// AN EXISTING SLIDER - GET SLIDE DATA FROM THE DATABASE AND SAVE WITHIN AN ARRAY.
		$num_slides = intval( $num_slides );
		$slide_data = array();
		$count      = 0;
		for ( $i = 1; $i <= $num_slides; $i++ ) {
			$slide_edit_id                            = 'sa_slide' . $i . '_content';
			$slide_char_count                         = 'sa_slide' . $i . '_char_count';
			$slide_data[ $count ]['edit_id']          = $slide_edit_id;
			$slide_data[ $count ]['content']          = get_post_meta( $post->ID, $slide_edit_id, true );
			$slide_data[ $count ]['char_count']       = get_post_meta( $post->ID, $slide_char_count, true );
			$slide_data[ $count ]['del_id']           = 'sa_slide' . $i . '_delete';
			$slide_data[ $count ]['thumb']            = 'slide' . $i . '_thumb';
			$slide_data[ $count ]['image_del']        = 'slide' . $i . '_image_del';
			$slide_data[ $count ]['image_data']       = 'sa_slide' . $i . '_image_data';
			$slide_data[ $count ]['image_id']         = 'sa_slide' . $i . '_image_id';
			$slide_data[ $count ]['image_pos']        = 'sa_slide' . $i . '_image_pos';
			$slide_data[ $count ]['image_size']       = 'sa_slide' . $i . '_image_size';
			$slide_data[ $count ]['image_repeat']     = 'sa_slide' . $i . '_image_repeat';
			$slide_data[ $count ]['image_color']      = 'sa_slide' . $i . '_image_color';
			$slide_data[ $count ]['image_data']       = 'sa_slide' . $i . '_image_data';
			$slide_data[ $count ]['link_url']         = 'sa_slide' . $i . '_link_url';
			$slide_data[ $count ]['link_text']         = 'sa_slide' . $i . '_link_text';
			$slide_data[ $count ]['link_target']      = 'sa_slide' . $i . '_link_target';
			$slide_data[ $count ]['button_background'] = 'sa_slide'. $i . '_button_background';
			$slide_data[ $count ]['button_color']     = 'sa_slide' . $i. '_button_color'; 
			$slide_data[ $count ]['popup_type']       = 'sa_slide' . $i . '_popup_type';
			$slide_data[ $count ]['popup_imageid']    = 'sa_slide' . $i . '_popup_imageid';
			$slide_data[ $count ]['popup_imagetitle'] = 'sa_slide' . $i . '_popup_imagetitle';
			$slide_data[ $count ]['popup_video_id']   = 'sa_slide' . $i . '_popup_video_id';
			$slide_data[ $count ]['popup_video_type'] = 'sa_slide' . $i . '_popup_video_type';
			$slide_data[ $count ]['popup_background'] = 'sa_slide' . $i . '_popup_background';
			$slide_data[ $count ]['popup_html']       = 'sa_slide' . $i . '_popup_html';
			$slide_data[ $count ]['popup_shortcode']  = 'sa_slide' . $i . '_popup_shortcode';
			$slide_data[ $count ]['popup_bgcol']      = 'sa_slide' . $i . '_popup_bgcol';
			$slide_data[ $count ]['popup_width']      = 'sa_slide' . $i . '_popup_width';
			$slide_data[ $count ]['slide_no']         = $i;
			$count++;
		}
	}
	// GET AVAILABLE WordPress IMAGE SIZES AND SAVE WITHIN AN ARRAY.
	global $_wp_additional_image_sizes;
	$image_size_arr             = array();
	$image_size_arr[0]['value'] = 'no';
	$image_size_arr[0]['desc']  = 'NO';
	$count                      = 1;
	foreach ( get_intermediate_image_sizes() as $image_size ) {
		if ( in_array( $image_size, array( 'thumbnail', 'medium', 'medium_large', 'large' ), true ) ) {
			$width  = get_option( "{$image_size}_size_w" );
			$height = get_option( "{$image_size}_size_h" );
		} elseif ( isset( $_wp_additional_image_sizes[ $image_size ] ) ) {
			$width  = $_wp_additional_image_sizes[ $image_size ]['width'];
			$height = $_wp_additional_image_sizes[ $image_size ]['height'];
		}
		if ( ( 0 !== $width ) && ( 0 !== $height ) ) {
			$image_size_arr[ $count ]['value'] = $image_size;
			$image_size_arr[ $count ]['desc']  = $image_size . ' (' . $width . '&times;' . $height . ')';
			$count++;
		}
	}
	/**
	 * ###### LOOP TO DISPLAY INPUT ELEMENTS FOR EACH SLIDE ######
	 */
	echo "<div id='slider_accordion'>\n";

	// determine whether to use css classes instead of csss ids.
	$use_classes    = 0;
	$other_settings = get_post_meta( $post->ID, 'sa_other_settings', true );
	if ( '' !== $other_settings ) {
		$other_settings_arr = explode( '|', $other_settings );
	}
	if ( isset( $other_settings_arr ) && ( count( $other_settings_arr ) > 7 ) ) {
		$disable_slide_ids = $other_settings_arr[7];
	} else {
		$disable_slide_ids = '0';
	}
	if ( '1' === $disable_slide_ids ) {
		$use_classes = 1;
	}

	$tot = count( $slide_data );
	for ( $i = 0; $i < $tot; $i++ ) {
		// DISPLAY ACCORDION HEADING.
		echo '<h3>Slide ' . esc_html( $slide_data[ $i ]['slide_no'] );
		$css_id = $slider_css_id . '_slide' . sprintf( '%02d', $slide_data[ $i ]['slide_no'] );
		// display CSS ID/CLASS for the current slide.
		if ( 1 === $use_classes ) {
			echo '<span>.' . esc_html( $css_id ) . '</span>';
		} else {
			echo '<span>#' . esc_html( $css_id ) . '</span>';
		}
		echo "</h3>\n";
		echo "<div>\n";

		// ### DISPLAY THE SLIDE CONTENT EDITOR (textarea field) ###
		wp_editor( $slide_data[ $i ]['content'], $slide_data[ $i ]['edit_id'], $editor_args );

		/**
		 * ##############################
		 * ##### SLIDE TABS - START #####
		 * ##############################
		 */
		$tabs_num = $i + 1;
		echo "<div id='slide_" . esc_html( $tabs_num ) . "_tabs' class='sa_slide_tabs'>\n";
	

		/**
		 * ####### SLIDE TAB 1 - SLIDE BACKGROUND #######
		 */
		echo "<div id='slide" . esc_html( $tabs_num ) . "_background_tab' class='sa_slide_tab'>\n";

		// GET BACKGROUND IMAGE DATA FOR THIS SLIDE (image id, position, size, repeat and color) FROM DATABASE.
		$slide_image_data = get_post_meta( $post->ID, $slide_data[ $i ]['image_data'], true );
		if ( isset( $slide_image_data ) && ( '' !== $slide_image_data ) ) {
			$data_arr           = explode( '~', $slide_image_data );
			$slide_image_id     = $data_arr[0];
			$slide_image_pos    = $data_arr[1];
			$slide_image_size   = $data_arr[2];
			$slide_image_repeat = $data_arr[3];
			$slide_image_color  = $data_arr[4];
		} else {
			$slide_image_id     = get_post_meta( $post->ID, $slide_data[ $i ]['image_id'], true );
			$slide_image_pos    = get_post_meta( $post->ID, $slide_data[ $i ]['image_pos'], true );
			$slide_image_size   = get_post_meta( $post->ID, $slide_data[ $i ]['image_size'], true );
			$slide_image_repeat = get_post_meta( $post->ID, $slide_data[ $i ]['image_repeat'], true );
			$slide_image_color  = get_post_meta( $post->ID, $slide_data[ $i ]['image_color'], true );
		}
		if ( '' === $slide_image_pos ) {
			$slide_image_pos = 'left top';
		}
		if ( '' === $slide_image_size ) {
			$slide_image_size = 'contain';
		}
		if ( '' === $slide_image_repeat ) {
			$slide_image_repeat = 'no-repeat';
		}
		if ( '' === $slide_image_color ) {
			$slide_image_color = 'rgba(0,0,0,0)';
		}

		echo "<div class='sa_slide_bg_wrapper'>\n";

		/**
		 * ### 'USE POPUP IMAGE AS SLIDE BACKGROUND' SETTING ###
		 */
		$slide_popup_background = get_post_meta( $post->ID, $slide_data[ $i ]['popup_background'], true );
		if ( '' === $slide_popup_background ) {
			$slide_popup_background = 'no';
		}
		echo "<div class='popup_background_wrapper' style='display:none'>\n";
		echo '<div style="display:none">Use Popup Image as Slide Background:';
		$tooltip = 'Allows you to use the same image you defined as the popup image as the slide background image. You can use a smaller version of the popup image.';
		echo "<em class='sa_tooltip' href='' title='" . esc_attr( $tooltip ) . "'></em></div>\n";
		echo "<select style='display:none'id='" . esc_attr( $slide_data[ $i ]['popup_background'] ) . "' name='" . esc_attr( $slide_data[ $i ]['popup_background'] ) . "' ";
		echo "onChange='change_slide_popup_background(" . esc_attr( $slide_data[ $i ]['slide_no'] ) . ");'>";
		$tot_loop = count( $image_size_arr );
		for ( $j = 0; $j < $tot_loop; $j++ ) {
			if ( $slide_popup_background === $image_size_arr[ $j ]['value'] ) {
				echo "<option value='" . esc_attr( $image_size_arr[ $j ]['value'] ) . "' selected>" . esc_html( $image_size_arr[ $j ]['desc'] ) . '</option>';
			} else {
				echo "<option value='" . esc_attr( $image_size_arr[ $j ]['value'] ) . "'>" . esc_html( $image_size_arr[ $j ]['desc'] ) . '</option>';
			}
		}
		echo '</select>';
		echo "</div>\n"; // .popup_background_wrapper
		echo "<div style='clear:both; float:none; width:100%; height:1px;'></div>\n";
		echo "<div id='slide" . esc_attr( $slide_data[ $i ]['slide_no'] ) . "_imagebg_popup' class='sa_slide_bg_popup'><div></div></div>\n";

		// SLIDE BACKGROUND IMAGE - THUMBNAIL AND 'SET IMAGE' BUTTON.
		// get WordPress media upload frame url.
		$upload_frame_url = esc_url( get_upload_iframe_src( 'image', $post->ID ) . '&slide=' . $slide_data[ $i ]['slide_no'] );
		// Get image src for slide background image.
		$slide_image_src = wp_get_attachment_image_src( $slide_image_id, 'medium' );
		// check if the slide background image id already exists.
		$image_exists = is_array( $slide_image_src );
		// slide backround image - thumbnail (and delete button).
		echo "<div id='" . esc_attr( $slide_data[ $i ]['thumb'] ) . "' class='sa_slide_thumb'>\n";
		if ( $image_exists ) {
			echo "<div style='background-image:url(\"" . esc_attr( $slide_image_src[0] ) . '"); background-size:' . esc_attr( $slide_image_size ) . '; ';
			echo 'background-repeat:' . esc_attr( $slide_image_repeat ) . '; background-color:' . esc_attr( $slide_image_color ) . '; ';
			echo 'background-position:' . esc_attr( $slide_image_pos ) . ";'></div>\n";
			echo "<span id='" . esc_attr( $slide_data[ $i ]['image_del'] ) . "' onClick='remove_slide_bg_image(\"" . esc_attr( $slide_data[ $i ]['slide_no'] ) . "\");' title='Delete the background image for this slide'>X</span>\n";
			echo "</div>\n";
		} else {
			if ( isset( $slide_data[ $i ]['popup_type'] ) ) {
				$slide_popup_type = get_post_meta( $post->ID, $slide_data[ $i ]['popup_type'], true );
				$popup_video_type = get_post_meta( $post->ID, $slide_data[ $i ]['popup_video_type'], true );
				$popup_video_id   = get_post_meta( $post->ID, $slide_data[ $i ]['popup_video_id'], true );
			} else {
				$slide_popup_type = 'NONE';
				$popup_video_type = '';
				$popup_video_id   = '';
			}
			if ( ( '99999999' === $slide_image_id ) && ( 'VIDEO' === $slide_popup_type ) && ( 'youtube' === $popup_video_type ) ) {
				$youtube_thumb = 'https://img.youtube.com/vi/' . $popup_video_id . '/maxresdefault.jpg';
				echo "<div style='background-image:url(\"" . esc_attr( $youtube_thumb ) . '"); background-size:' . esc_attr( $slide_image_size ) . '; ';
				echo 'background-repeat:' . esc_attr( $slide_image_repeat ) . '; background-color:' . esc_attr( $slide_image_color ) . '; ';
				echo 'background-position:' . esc_attr( $slide_image_pos ) . ";'></div>\n";
				echo "<span id='" . esc_attr( $slide_data[ $i ]['image_del'] ) . "' onClick='remove_slide_bg_image(\"" . esc_attr( $slide_data[ $i ]['slide_no'] ) . "\");' title='Delete the background image for this slide'>X</span>\n";
				echo "</div>\n";
			} else {
				echo "<div style='background: transparent url(".plugins_url( '../images/image_placeholder_popup.jpg', __FILE__ ).") no-repeat top left;background-color:#ffffff; background-size:" . esc_attr( $slide_image_size ) . '; ';
				echo 'background-repeat:' . esc_attr( $slide_image_repeat ) . '; background-color:' . esc_attr( $slide_image_color ) . '; ';
				echo 'background-position:' . esc_attr( $slide_image_pos ) . ";'></div>\n";
				echo "<span id='" . esc_attr( $slide_data[ $i ]['image_del'] ) . "' class='sa_hidden' onClick='remove_slide_bg_image(\"" . esc_attr( $slide_data[ $i ]['slide_no'] ) . "\");' title='Delete the background image for this slide'>X</span>\n";
				echo "</div>\n";
			}
		}
		// slide background image - 'set image' button.
		echo "<a class='button button-secondary slide_image_add' id='slide" . esc_attr( $slide_data[ $i ]['slide_no'] ) . "_image_add' ";
		echo "href='" . esc_attr( $upload_frame_url ) . "' title='Set the background image for this slide'>Set Image</a>\n";
		// slide background image - image id hidden field.
		echo "<input type='hidden' id='" . esc_attr( $slide_data[ $i ]['image_id'] ) . "' name='" . esc_attr( $slide_data[ $i ]['image_id'] ) . "' value='" . esc_attr( $slide_image_id ) . "'/>\n";

		// SLIDE BACKGROUND IMAGE - BACKGROUND POSITION (dropdown box).
		echo "<div class='slide_image_settings_line'>";
		echo '<span>Background Position:</span>';
		$option_arr             = array();
		$option_arr[0]['desc']  = 'Top Left';
		$option_arr[0]['value'] = 'left top';
		$option_arr[1]['desc']  = 'Top Center';
		$option_arr[1]['value'] = 'center top';
		$option_arr[2]['desc']  = 'Top Right';
		$option_arr[2]['value'] = 'right top';
		$option_arr[3]['desc']  = 'Center Left';
		$option_arr[3]['value'] = 'left center';
		$option_arr[4]['desc']  = 'Center';
		$option_arr[4]['value'] = 'center center';
		$option_arr[5]['desc']  = 'Center Right';
		$option_arr[5]['value'] = 'right center';
		$option_arr[6]['desc']  = 'Bottom Left';
		$option_arr[6]['value'] = 'left bottom';
		$option_arr[7]['desc']  = 'Bottom Center';
		$option_arr[7]['value'] = 'center bottom';
		$option_arr[8]['desc']  = 'Bottom Right';
		$option_arr[8]['value'] = 'right bottom';
		echo "<select id='" . esc_attr( $slide_data[ $i ]['image_pos'] ) . "' name='" . esc_attr( $slide_data[ $i ]['image_pos'] ) . "' onChange='change_slide_image_pos(" . esc_attr( $slide_data[ $i ]['slide_no'] ) . ");'>";
		$tot_loop = count( $option_arr );
		for ( $j = 0; $j < $tot_loop; $j++ ) {
			if ( $slide_image_pos === $option_arr[ $j ]['value'] ) {
				echo "<option value='" . esc_attr( $option_arr[ $j ]['value'] ) . "' selected>" . esc_html( $option_arr[ $j ]['desc'] ) . '</option>';
			} else {
				echo "<option value='" . esc_attr( $option_arr[ $j ]['value'] ) . "'>" . esc_html( $option_arr[ $j ]['desc'] ) . '</option>';
			}
		}
		echo '</select>';
		echo "</div>\n";

		// SLIDE BACKGROUND IMAGE - BACKGROUND SIZE (dropdown box).
		echo "<div class='slide_image_settings_line'>";
		echo '<span>Background Size:</span>';
		$option_arr             = array();
		$option_arr[0]['value'] = 'auto';
		$option_arr[0]['desc']  = 'no resize';
		$option_arr[1]['value'] = 'contain';
		$option_arr[1]['desc']  = 'contain';
		$option_arr[2]['value'] = 'cover';
		$option_arr[2]['desc']  = 'cover';
		$option_arr[3]['value'] = '100% 100%';
		$option_arr[3]['desc']  = '100%';
		$option_arr[4]['value'] = '100% auto';
		$option_arr[4]['desc']  = '100% width';
		$option_arr[5]['value'] = 'auto 100%';
		$option_arr[5]['desc']  = '100% height';
		echo "<select id='" . esc_attr( $slide_data[ $i ]['image_size'] ) . "' name='" . esc_attr( $slide_data[ $i ]['image_size'] ) . "' onChange='change_slide_image_size(" . esc_attr( $slide_data[ $i ]['slide_no'] ) . ");'>";
		$tot_loop = count( $option_arr );
		for ( $j = 0; $j < $tot_loop; $j++ ) {
			if ( $slide_image_size === $option_arr[ $j ]['value'] ) {
				echo "<option value='" . esc_attr( $option_arr[ $j ]['value'] ) . "' selected>" . esc_html( $option_arr[ $j ]['desc'] ) . '</option>';
			} else {
				echo "<option value='" . esc_attr( $option_arr[ $j ]['value'] ) . "'>" . esc_html( $option_arr[ $j ]['desc'] ) . '</option>';
			}
		}
		echo '</select>';
		echo "</div>\n";

		// SLIDER BACKGROUND IMAGE - BACKGROUND REPEAT (dropdown box).
		echo "<div class='slide_image_settings_line'>";
		echo '<span>Background Repeat:</span>';
		$option_arr    = array();
		$option_arr[0] = 'no-repeat';
		$option_arr[1] = 'repeat';
		$option_arr[2] = 'repeat-x';
		$option_arr[3] = 'repeat-y';
		echo "<select id='" . esc_attr( $slide_data[ $i ]['image_repeat'] ) . "' name='" . esc_attr( $slide_data[ $i ]['image_repeat'] ) . "' ";
		echo "onChange='change_slide_image_repeat(" . esc_attr( $slide_data[ $i ]['slide_no'] ) . ");'>";
		$tot_loop = count( $option_arr );
		for ( $j = 0; $j < $tot_loop; $j++ ) {
			if ( $slide_image_repeat === $option_arr[ $j ] ) {
				echo "<option value='" . esc_attr( $option_arr[ $j ] ) . "' selected>" . esc_html( $option_arr[ $j ] ) . '</option>';
			} else {
				echo "<option value='" . esc_attr( $option_arr[ $j ] ) . "'>" . esc_html( $option_arr[ $j ] ) . '</option>';
			}
		}
		echo '</select>';
		echo "</div>\n";

			// SLIDER BACKGROUND IMAGE - BACKGROUND COLOR (color picker).
		echo "<div class='slide_image_settings_line'>";
		echo '<span>Background Color:</span>';
		echo "<input type='text' id='" . esc_attr( $slide_data[ $i ]['image_color'] ) . "' name='" . esc_attr( $slide_data[ $i ]['image_color'] ) . "' value='" . esc_attr( $slide_image_color ) . "' ";
		echo "onChange='change_slide_image_color(" . esc_attr( $slide_data[ $i ]['slide_no'] ) . ");'>";
		echo "</div>\n";

		// echo "<div style='clear:both; float:none; width:100%; height:1px;'></div>\n";
		// echo "</div>\n";
		// echo "</div>\n";

			// GET SLIDE LINK DATA FOR THIS SLIDE FROM THE DATABASE.
		$slide_link_url    = get_post_meta( $post->ID, $slide_data[ $i ]['link_url'], true );
		$slide_link_target = get_post_meta( $post->ID, $slide_data[ $i ]['link_target'], true );
		$slide_link_text = get_post_meta( $post->ID, $slide_data[ $i ]['link_text'], true );
		$slide_button_background = get_post_meta($post->ID, $slide_data[ $i ]['button_background'],true);
		$slide_button_color = get_post_meta($post->ID, $slide_data[$i]['button_color'],true);
		if ( '' === $slide_link_target ) {
			$slide_link_target = '_self';
		}
		if ( '' === $slide_link_text ) {
			$slide_link_text = '';
		}
		if ( '' === $slide_button_background ) {
			$slide_button_background = '';
		}
		if('' === $slide_button_color){
			$slide_button_color = '';
		}

		/** customized Button for each slide **/ 

		//a display text of button on each slide
		echo '<div class="slide_image_settings_line"><span >Button Text:</span>';
		echo "<input type='text' id='" . esc_attr( $slide_data[ $i ]['link_text'] ) . "' name='" . esc_attr( $slide_data[ $i ]['link_text'] ) . "' ";
		echo "value='" . esc_attr( $slide_link_text ) . "'/></div>\n";

		//button  background color on each slide
		echo '<div  class="slide_image_settings_line"><span >Button Background Color:</span>';
		echo "<input type='text' id='" . esc_attr( $slide_data[ $i ]['button_background'] ) . "' name='" . esc_attr( $slide_data[ $i ]['button_background'] ) . "' value='" . esc_attr( $slide_button_background ) . "' ";
		echo "onChange='change_slide_button_background_color(" . esc_attr( $slide_data[ $i ]['slide_no'] ) . ");' /></div>\n";

		//button text color on each slide
		echo '<div  class="slide_image_settings_line"><span >Button Text Color:</span>';
		echo "<input type='text' id='" . esc_attr( $slide_data[ $i ]['button_color'] ) . "' name='" . esc_attr( $slide_data[ $i ]['button_color'] ) . "'  ";
		echo "onChange='change_slide_button_text_color(" . esc_attr( $slide_data[ $i ]['slide_no'] ) . ");' value='" . esc_attr( $slide_button_color ) . "'/></div>\n";

		//button link or url on each slide
		echo '<div  class="slide_image_settings_line"><span >Button Link URL:</span>';
		echo "<input type='text' id='" . esc_attr( $slide_data[ $i ]['link_url'] ) . "' name='" . esc_attr( $slide_data[ $i ]['link_url'] ) . "' placeholder='https://google.com' ";
		echo "value='" . esc_attr( $slide_link_url ) . "'/></div>\n";


		// LINK TARGET.
		echo '<div class="slide_image_settings_line"><span >Button Link Target:</span>';
		echo "<select id='" . esc_attr( $slide_data[ $i ]['link_target'] ) . "' name='" . esc_attr( $slide_data[ $i ]['link_target'] ) . "' >";
		if ( '_blank' === $slide_link_target ) {
			echo "<option value='_self'>Same Tab/Window</option>";
			echo "<option value='_blank' selected>New Tab/Window</option>";
		} else {
			echo "<option value='_self' selected>Same Tab/Window</option>";
			echo "<option value='_blank'>New Tab/Window</option>";
		}
		echo '</select>';
		echo "</div>\n";

	

		echo "<div style='clear:both; float:none; width:100%; height:1px;'></div>\n";
		echo "</div>\n";
		echo "</div>\n";

		
		echo "</div>\n";

		// 3. DELETE STATUS FIELD (hidden) AND DELETE SLIDE BUTTON.
		echo "<input type='hidden' id='" . esc_attr( $slide_data[ $i ]['del_id'] ) . "' name='" . esc_attr( $slide_data[ $i ]['del_id'] ) . "' value='1'/>\n";
		echo "<div class='button button-secondary' onClick='delete_sa_slide(\"" . esc_attr( $slide_data[ $i ]['del_id'] ) . "\");' title='Delete this slide'>Delete Slide</div>\n";


		echo "</div>\n";
	}
	echo "</div>\n";

	// ADD SLIDE BUTTON.
	if ( $num_slides < 99 ) {
		// a maximum of 99 slides allowed.
		echo "<div id='sa_add_slide' class='button button-primary button-large' title='Add a new slide'>Add Slide</div>\n";
	}

	// JQUERY-UI DIALOG BOX DIV - FOR CONFIRMATION DIALOG BOXES.
	echo "<div id='sa_dialog_box'></div>\n";
}
}



/**
 * ##### META BOX CONTENT - 'Slider Preview/Shortcode' BOX #####
 *
 * @param array $post Custom Post 'es_slider'.
 */
if(!function_exists('esrcpt_slider_shortcode_content')){
	function esrcpt_slider_shortcode_content( $post ) {
		$post_status      = get_post_status( $post->ID );
		$allow_shortcodes = get_post_meta( $post->ID, 'sa_shortcodes', true );
		$shortcode        = '[easy-slider-revolution id="' . $post->ID . '"]';
		echo "<div id='sa_slider_shortcode'>" . esc_html( $shortcode ) . "</div>\n";
		//echo "<div id='sa_shortcode_copy' class='button button-secondary'>Copy to Clipboard</div>\n";
	}
}

/**
 * // ##### ACTION HOOK - SAVE CUSTOM POST TYPE ('EASY SLIDER') DATA #####
 */
if(!function_exists('esrcpt_slider_save_postdata')){
function esrcpt_slider_save_postdata() {
	global $post;

	// ### REMOVE XSS ATTACK VULNERABILITY FROM SLIDER POST TITLES ###
	global $wpdb;
	if ( isset( $post->ID ) && ( '' !== $post->ID ) ) {
		$post_title     = get_the_title( $post->ID );
		$sanitize_title = sanitize_text_field( $post_title );
		$where          = array( 'ID' => $post->ID );
		$wpdb->update( $wpdb->posts, array( 'post_title' => $sanitize_title ), $where ); // db call ok; no-cache ok.
	}

	// ### VERIFY 1) LOGGED-IN USER IS ADMINISTRATOR AND 2) VALID NONCE TO PREVENT CSRF HACKER ATTACKS ###
	if ( current_user_can( 'edit_pages' ) &&
		isset( $_POST['nonce_save_slider'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce_save_slider'] ) ), basename( __FILE__ ) ) ) {
		if ( isset( $_POST['sa_num_slides'] ) ) {
			$total_slides = intval( $_POST['sa_num_slides'] );
		} else {
			$total_slides = 1;
		}
		if ( isset( $_POST['sa_duplicate_slide'] ) ) {
			if ( ( '' === $_POST['sa_duplicate_slide'] ) || ( '0' === $_POST['sa_duplicate_slide'] ) ) {
				$duplicate_slide = 0;
			} else {
				// A SLIDE NEEDS TO BE DUPLICATED.
				$duplicate_slide = intval( $_POST['sa_duplicate_slide'] );
			}
		} else {
			$duplicate_slide = 0;
		}
		if ( isset( $_POST['sa_move_slide_up'] ) ) {
			if ( ( '' === $_POST['sa_move_slide_up'] ) || ( '0' === $_POST['sa_move_slide_up'] ) ) {
				$move_slide_up = 0;
			} else {
				// A SLIDE NEEDS TO BE MOVED.
				$move_slide_up = intval( $_POST['sa_move_slide_up'] );
			}
		} else {
			$move_slide_up = 0;
		}

		// UPDATE CONTENT FOR EACH SLIDE.
		$slides_saved = 0;
		for ( $i = 1; $i <= $total_slides; $i++ ) {
			$slide_edit_id          = 'sa_slide' . $i . '_content';
			$slide_image_id         = 'sa_slide' . $i . '_image_id';
			$slide_image_pos        = 'sa_slide' . $i . '_image_pos';
			$slide_image_size       = 'sa_slide' . $i . '_image_size';
			$slide_image_repeat     = 'sa_slide' . $i . '_image_repeat';
			$slide_image_color      = 'sa_slide' . $i . '_image_color';
			$slide_link_text = 'sa_slide' . $i . '_link_text';
			$slide_link_url         = 'sa_slide' . $i . '_link_url';
			$slide_link_target      = 'sa_slide' . $i . '_link_target';
			$slide_button_background = 'sa_slide' . $i . '_button_background';
			$slide_button_color     = 'sa_slide' . $i . '_button_color';
			$slide_popup_type       = 'NONE';
			$slide_popup_imageid    = '';
			$slide_popup_imagetitle = '';
			$slide_popup_video_id   = '';
			$slide_popup_video_type = '';
			$slide_popup_background = '';
			$slide_popup_html       = '';
			$slide_popup_shortcode  = '';
			$slide_popup_bgcol      = '';
			$slide_popup_width      = '';
			$slide_content          = '';
			$slide_image_id_val     = 0;
			$slide_image_pos_val    = '';
			$slide_image_size_val   = '';
			$slide_image_repeat_val = '';
			$slide_image_color_val  = '';
			$slide_link_url_val     = '';
						$slide_link_text_val     = '';
						$slide_button_background_val = '';
			$slide_link_target_val  = '';
			$slide_button_color_val = '';
			if ( isset( $_POST[ $slide_edit_id ] ) && ( '' !== $_POST[ $slide_edit_id ] ) ) {
				$slide_content = wp_kses_post( wp_unslash( $_POST[ $slide_edit_id ] ) );
			}
			if ( isset( $_POST[ $slide_image_id ] ) ) {
				$slide_image_id_val = abs( intval( $_POST[ $slide_image_id ] ) );
			}
			if ( isset( $_POST[ $slide_image_pos ] ) ) {
				$slide_image_pos_val = sanitize_text_field( wp_unslash( $_POST[ $slide_image_pos ] ) );
			}
			if ( isset( $_POST[ $slide_image_size ] ) ) {
				$slide_image_size_val = sanitize_text_field( wp_unslash( $_POST[ $slide_image_size ] ) );
			}
			if ( isset( $_POST[ $slide_image_repeat ] ) ) {
				$slide_image_repeat_val = sanitize_text_field( wp_unslash( $_POST[ $slide_image_repeat ] ) );
			}
			if ( isset( $_POST[ $slide_image_color ] ) ) {
				$slide_image_color_val = sanitize_text_field( wp_unslash( $_POST[ $slide_image_color ] ) );
			}
			if ( isset( $_POST[ $slide_link_text ] ) ) {
				$slide_link_text_val = sanitize_text_field( wp_unslash( $_POST[ $slide_link_text ] ) );
			}
			if ( isset( $_POST[ $slide_link_url ] ) ) {
				$slide_link_url_val = sanitize_text_field( wp_unslash( $_POST[ $slide_link_url ] ) );
			}
			if ( isset( $_POST[ $slide_link_target ] ) ) {
				$slide_link_target_val = sanitize_text_field( wp_unslash( $_POST[ $slide_link_target ] ) );
			}
			if( isset( $_POST[$slide_button_background] ) ){
				$slide_button_background_val = sanitize_text_field( wp_unslash( $_POST[ $slide_button_background ] ) );
			}
			if( isset( $_POST[$slide_button_color] ) ){
				$slide_button_color_val = sanitize_text_field( wp_unslash( $_POST[ $slide_button_color ] ) );
			}
			$slide_popup_type_val       = '';
			$slide_popup_imageid_val    = 0;
			$slide_popup_imagetitle_val = '';
			$slide_popup_video_id_val   = '';
			$slide_popup_video_type_val = '';
			$slide_popup_background_val = '';
			$slide_popup_html_val       = '';
			$slide_popup_shortcode_val  = '';
			$slide_popup_bgcol_val      = '';
			$slide_popup_width_val      = 0;
			if ( isset( $_POST[ $slide_popup_type ] ) ) {
				$slide_popup_type_val = sanitize_text_field( wp_unslash( $_POST[ $slide_popup_type ] ) );
			}
			if ( isset( $_POST[ $slide_popup_imageid ] ) ) {
				$slide_popup_imageid_val = sanitize_text_field( wp_unslash( $_POST[ $slide_popup_imageid ] ) );
			}
			if ( isset( $_POST[ $slide_popup_imagetitle ] ) ) {
				$slide_popup_imagetitle_val = sanitize_text_field( wp_unslash( $_POST[ $slide_popup_imagetitle ] ) );
			}
			if ( isset( $_POST[ $slide_popup_video_id ] ) ) {
				$slide_popup_video_id_val = sanitize_text_field( wp_unslash( $_POST[ $slide_popup_video_id ] ) );
			}
			if ( isset( $_POST[ $slide_popup_video_type ] ) ) {
				$slide_popup_video_type_val = sanitize_text_field( wp_unslash( $_POST[ $slide_popup_video_type ] ) );
			}
			if ( isset( $_POST[ $slide_popup_background ] ) ) {
				$slide_popup_background_val = sanitize_text_field( wp_unslash( $_POST[ $slide_popup_background ] ) );
			}
			if ( isset( $_POST[ $slide_popup_html ] ) ) {
				$slide_popup_html_val = balanceTags( wp_kses_post( wp_unslash( $_POST[ $slide_popup_html ] ) ), true );
			}
			if ( isset( $_POST[ $slide_popup_shortcode ] ) ) {
				$slide_popup_shortcode_val = sanitize_text_field( wp_unslash( $_POST[ $slide_popup_shortcode ] ) );
			}
			if ( isset( $_POST[ $slide_popup_bgcol ] ) ) {
				$slide_popup_bgcol_val = sanitize_text_field( wp_unslash( $_POST[ $slide_popup_bgcol ] ) );
			}
			if ( isset( $_POST[ $slide_popup_width ] ) ) {
				$slide_popup_width_val = abs( intval( $_POST[ $slide_popup_width ] ) );
			}
			// check delete status for slide.
			$del_status_id = 'sa_slide' . $i . '_delete';
			if ( isset( $_POST[ $del_status_id ] ) && ( '' !== $_POST[ $del_status_id ] ) ) {
				$del_status = sanitize_text_field( wp_unslash( $_POST[ $del_status_id ] ) );
			} else {
				// a new slide has been added.
				$del_status    = '1';
				$slide_content = '';
			}
			if ( '1' === $del_status ) {
				// save slide content only if slide has not been marked for deletion.
				$slides_saved++;
				$slide_edit_id_save           = 'sa_slide' . $slides_saved . '_content';
				$slide_image_data_saved       = 'sa_slide' . $slides_saved . '_image_data';
				$slide_link_url_saved         = 'sa_slide' . $slides_saved . '_link_url';
				$slide_link_text_saved        = 'sa_slide'. $slides_saved . '_link_text';
				$slide_link_target_saved      = 'sa_slide' . $slides_saved . '_link_target';
				$slide_button_background_saved = 'sa_slide'. $slides_saved . '_button_background';
				$slide_button_color_saved     = 'sa_slide' . $slides_saved . '_button_color';
 				$slide_popup_type_saved       = 'NONE';
				$slide_popup_imageid_saved    = '';
				$slide_popup_imagetitle_saved = '';
				$slide_popup_video_id_saved   = '';
				$slide_popup_video_type_saved = '';
				$slide_popup_background_saved = '';
				$slide_popup_html_saved       = '';
				$slide_popup_shortcode_saved  = '';
				$slide_popup_bgcol_saved      = '';
				$slide_popup_width_saved      = '';
				update_post_meta( $post->ID, $slide_edit_id_save, $slide_content );
				$slide_image_data_val = $slide_image_id_val . '~' . $slide_image_pos_val . '~' . $slide_image_size_val . '~' . $slide_image_repeat_val . '~' . $slide_image_color_val;
				update_post_meta( $post->ID, $slide_image_data_saved, $slide_image_data_val );
				update_post_meta( $post->ID, $slide_link_url_saved, $slide_link_url_val );
				update_post_meta( $post->ID, $slide_link_text_saved, $slide_link_text_val );
				update_post_meta( $post->ID, $slide_link_target_saved, $slide_link_target_val );
				update_post_meta( $post->ID, $slide_button_background_saved, $slide_button_background_val);
				update_post_meta( $post->ID, $slide_button_color_saved, $slide_button_color_val);
				update_post_meta( $post->ID, $slide_popup_type_saved, $slide_popup_type_val );
				update_post_meta( $post->ID, $slide_popup_imageid_saved, $slide_popup_imageid_val );
				update_post_meta( $post->ID, $slide_popup_imagetitle_saved, $slide_popup_imagetitle_val );
				update_post_meta( $post->ID, $slide_popup_video_id_saved, $slide_popup_video_id_val );
				update_post_meta( $post->ID, $slide_popup_video_type_saved, $slide_popup_video_type_val );
				update_post_meta( $post->ID, $slide_popup_background_saved, $slide_popup_background_val );
				update_post_meta( $post->ID, $slide_popup_html_saved, $slide_popup_html_val );
				update_post_meta( $post->ID, $slide_popup_shortcode_saved, $slide_popup_shortcode_val );
				update_post_meta( $post->ID, $slide_popup_bgcol_saved, $slide_popup_bgcol_val );
				update_post_meta( $post->ID, $slide_popup_width_saved, $slide_popup_width_val );
				if ( $i === $duplicate_slide ) {
					// the 'duplicate slide' button has been click for this slide - create a new slide that is an exact copy of previous slide.
					$slides_saved++;
					$slide_edit_id_save           = 'sa_slide' . $slides_saved . '_content';
					$slide_image_data_saved       = 'sa_slide' . $slides_saved . '_image_data';
					$slide_link_url_saved         = 'sa_slide' . $slides_saved . '_link_url';
					$slide_link_text_saved        = 'sa_slide' . $slides_saved . '_link_text';
					$slide_link_target_saved      = 'sa_slide' . $slides_saved . '_link_target';
					$slide_button_background_saved = 'sa_slide' . $slides_saved . '_button_background';
					$slide_button_color_saved     = 'sa_slide' . $slides_saved .'_button_color'; 
					$slide_popup_type_saved       = 'NONE';
					$slide_popup_imageid_saved    = '';
					$slide_popup_imagetitle_saved = '';
					$slide_popup_video_id_saved   = '';
					$slide_popup_video_type_saved = '';
					$slide_popup_background_saved = '';
					$slide_popup_html_saved       = '';
					$slide_popup_shortcode_saved  = '';
					$slide_popup_bgcol_saved      = '';
					$slide_popup_width_saved      = '';
					update_post_meta( $post->ID, $slide_edit_id_save, $slide_content );
					$slide_image_data_val = $slide_image_id_val . '~' . $slide_image_pos_val . '~' . $slide_image_size_val . '~' . $slide_image_repeat_val . '~' . $slide_image_color_val;
					update_post_meta( $post->ID, $slide_image_data_saved, $slide_image_data_val );
					update_post_meta( $post->ID, $slide_link_url_saved, $slide_link_url_val );
					update_post_meta( $post->ID, $slide_link_text_saved, $slide_link_text_val );
					update_post_meta( $post->ID, $slide_link_target_saved, $slide_link_target_val );
					update_post_meta( $post->ID, $slide_button_background_saved, $slide_button_background_val);
					update_post_meta( $post->ID, $slide_button_color_saved, $slide_button_color_val);
					update_post_meta( $post->ID, $slide_popup_type_saved, $slide_popup_type_val );
					update_post_meta( $post->ID, $slide_popup_imageid_saved, $slide_popup_imageid_val );
					update_post_meta( $post->ID, $slide_popup_imagetitle_saved, $slide_popup_imagetitle_val );
					update_post_meta( $post->ID, $slide_popup_video_id_saved, $slide_popup_video_id_val );
					update_post_meta( $post->ID, $slide_popup_video_type_saved, $slide_popup_video_type_val );
					update_post_meta( $post->ID, $slide_popup_background_saved, $slide_popup_background_val );
					update_post_meta( $post->ID, $slide_popup_html_saved, $slide_popup_html_val );
					update_post_meta( $post->ID, $slide_popup_shortcode_saved, $slide_popup_shortcode_val );
					update_post_meta( $post->ID, $slide_popup_bgcol_saved, $slide_popup_bgcol_val );
					update_post_meta( $post->ID, $slide_popup_width_saved, $slide_popup_width_val );
				}
			}
		}

		if ( 0 !== $move_slide_up ) {
			// A SLIDE NEEDS TO BE MOVED (TWO SLIDES ARE SWAPPED).
			$slide2              = $move_slide_up;
			$slide1              = intval( $move_slide_up ) - 1;
			$slide1_content      = '';
			$slide1_image_id     = 0;
			$slide1_image_pos    = '';
			$slide1_image_size   = '';
			$slide1_image_repeat = '';
			$slide1_image_color  = '';
			$slide1_link_url     = '';
			$slide1_link_text    = '';
			$slide1_button_background = '';
			$slide1_link_target  = '';
			$slide1_button_color = '';
			if ( isset( $_POST[ 'sa_slide' . $slide1 . '_content' ] ) ) {
				$slide1_content = wp_kses_post( wp_unslash( $_POST[ 'sa_slide' . $slide1 . '_content' ] ) );
				// $slide1_content = balanceTags( sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide1 . '_content' ] ) ), true );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide1 . '_image_id' ] ) ) {
				$slide1_image_id = abs( intval( $_POST[ 'sa_slide' . $slide1 . '_image_id' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide1 . '_image_pos' ] ) ) {
				$slide1_image_pos = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide1 . '_image_pos' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide1 . '_image_size' ] ) ) {
				$slide1_image_size = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide1 . '_image_size' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide1 . '_image_repeat' ] ) ) {
				$slide1_image_repeat = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide1 . '_image_repeat' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide1 . '_image_color' ] ) ) {
				$slide1_image_color = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide1 . '_image_color' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide1 . '_link_url' ] ) ) {
				$slide1_link_url = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide1 . '_link_url' ] ) );
			}
				if ( isset( $_POST[ 'sa_slide' . $slide1 . '_link_text' ] ) ) {
				$slide1_link_text = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide1 . '_link_text' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide1 . '_link_target' ] ) ) {
				$slide1_link_target = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide1 . '_link_target' ] ) );
			}
			if( isset( $_POST['sa_slide' . $slide1 . 'button_background' ] ) ){
				$slide1_button_background = sanitize_text_field( wp_unslash( $_POST['sa_slide' . $slide1. '_button_background']));
			}
			if( isset( $_POST['sa_slide' . $slide1 . 'button_color' ] ) ){
				$slide1_button_color = sanitize_text_field( wp_unslash( $_POST['sa_slide' . $slide1. '_button_color']));
			}

			$slide1_popup_type       = '';
			$slide1_popup_imageid    = '';
			$slide1_popup_imagetitle = '';
			$slide1_popup_video_id   = '';
			$slide1_popup_video_type = '';
			$slide1_popup_background = '';
			$slide1_popup_html       = '';
			$slide1_popup_shortcode  = '';
			$slide1_popup_bgcol      = '';
			$slide1_popup_width      = 0;
			if ( isset( $_POST[ 'sa_slide' . $slide1 . '_popup_type' ] ) ) {
				$slide1_popup_type = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide1 . '_popup_type' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide1 . '_popup_imageid' ] ) ) {
				$slide1_popup_imageid = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide1 . '_popup_imageid' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide1 . '_popup_imagetitle' ] ) ) {
				$slide1_popup_imagetitle = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide1 . '_popup_imagetitle' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide1 . '_popup_video_id' ] ) ) {
				$slide1_popup_video_id = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide1 . '_popup_video_id' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide1 . '_popup_video_type' ] ) ) {
				$slide1_popup_video_type = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide1 . '_popup_video_type' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide1 . '_popup_background' ] ) ) {
				$slide1_popup_background = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide1 . '_popup_background' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide1 . '_popup_html' ] ) ) {
				$slide1_popup_html = balanceTags( wp_kses_post( wp_unslash( $_POST[ 'sa_slide' . $slide1 . '_popup_html' ] ) ), true );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide1 . '_popup_shortcode' ] ) ) {
				$slide1_popup_shortcode = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide1 . '_popup_shortcode' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide1 . '_popup_bgcol' ] ) ) {
				$slide1_popup_bgcol = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide1 . '_popup_bgcol' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide1 . '_popup_width' ] ) ) {
				$slide1_popup_width = abs( intval( $_POST[ 'sa_slide' . $slide1 . '_popup_width' ] ) );
			}
			$slide2_content      = '';
			$slide2_image_id     = 0;
			$slide2_image_pos    = '';
			$slide2_image_size   = '';
			$slide2_image_repeat = '';
			$slide2_image_color  = '';
			$slide2_link_url     = '';
			$slide2_link_text    = '';
			$slide2_link_target  = '';
			$slide2_button_background = '';
			$slide2_button_color = '';
			if ( isset( $_POST[ 'sa_slide' . $slide2 . '_content' ] ) ) {
				$slide2_content = wp_kses_post( wp_unslash( $_POST[ 'sa_slide' . $slide2 . '_content' ] ) );
				// $slide2_content = balanceTags( sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide2 . '_content' ] ) ), true );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide2 . '_image_id' ] ) ) {
				$slide2_image_id = abs( intval( $_POST[ 'sa_slide' . $slide2 . '_image_id' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide2 . '_image_pos' ] ) ) {
				$slide2_image_pos = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide2 . '_image_pos' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide2 . '_image_size' ] ) ) {
				$slide2_image_size = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide2 . '_image_size' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide2 . '_image_repeat' ] ) ) {
				$slide2_image_repeat = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide2 . '_image_repeat' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide2 . '_image_color' ] ) ) {
				$slide2_image_color = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide2 . '_image_color' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide2 . '_link_url' ] ) ) {
				$slide2_link_url = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide2 . '_link_url' ] ) );
			}
				if ( isset( $_POST[ 'sa_slide' . $slide2 . '_link_text' ] ) ) {
				$slide2_link_text = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide2 . '_link_text' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide2 . '_link_target' ] ) ) {
				$slide2_link_target = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide2 . '_link_target' ] ) );
			}
			if( isset( $_POST['sa_slide'.$slide2.'_button_background'] )){
				$slide2_button_background = sanitize_text_field( wp_unslash ($_POST['sa_slide' .$slide2.'_button_background']));
			}
			if( isset( $_POST['sa_slide'.$slide2.'_button_color'] )){
				$slide2_button_color = sanitize_text_field( wp_unslash ($_POST['sa_slide' .$slide2.'_button_color']));
			}
			$slide2_popup_type       = '';
			$slide2_popup_imageid    = '';
			$slide2_popup_imagetitle = '';
			$slide2_popup_video_id   = '';
			$slide2_popup_video_type = '';
			$slide2_popup_background = '';
			$slide2_popup_html       = '';
			$slide2_popup_shortcode  = '';
			$slide2_popup_bgcol      = '';
			$slide2_popup_width      = 0;
			if ( isset( $_POST[ 'sa_slide' . $slide2 . '_popup_type' ] ) ) {
				$slide2_popup_type = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide2 . '_popup_type' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide2 . '_popup_imageid' ] ) ) {
				$slide2_popup_imageid = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide2 . '_popup_imageid' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide2 . '_popup_imagetitle' ] ) ) {
				$slide2_popup_imagetitle = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide2 . '_popup_imagetitle' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide2 . '_popup_video_id' ] ) ) {
				$slide2_popup_video_id = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide2 . '_popup_video_id' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide2 . '_popup_video_type' ] ) ) {
				$slide2_popup_video_type = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide2 . '_popup_video_type' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide2 . '_popup_background' ] ) ) {
				$slide2_popup_background = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide2 . '_popup_background' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide2 . '_popup_html' ] ) ) {
				$slide2_popup_html = balanceTags( wp_kses_post( wp_unslash( $_POST[ 'sa_slide' . $slide2 . '_popup_html' ] ) ), true );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide2 . '_popup_shortcode' ] ) ) {
				$slide2_popup_shortcode = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide2 . '_popup_shortcode' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide2 . '_popup_bgcol' ] ) ) {
				$slide2_popup_bgcol = sanitize_text_field( wp_unslash( $_POST[ 'sa_slide' . $slide2 . '_popup_bgcol' ] ) );
			}
			if ( isset( $_POST[ 'sa_slide' . $slide2 . '_popup_width' ] ) ) {
				$slide2_popup_width = abs( intval( $_POST[ 'sa_slide' . $slide2 . '_popup_width' ] ) );
			}
			update_post_meta( $post->ID, 'sa_slide' . $slide2 . '_content', $slide1_content );
			$slide1_image_data = $slide1_image_id . '~' . $slide1_image_pos . '~' . $slide1_image_size . '~' . $slide1_image_repeat . '~' . $slide1_image_color;
			update_post_meta( $post->ID, 'sa_slide' . $slide2 . '_image_data', $slide1_image_data );
			update_post_meta( $post->ID, 'sa_slide' . $slide2 . '_link_url', $slide1_link_url );
			update_post_meta( $post->ID, 'sa_slide' . $slide2 . '_link_text', $slide1_link_text );
			update_post_meta( $post->ID, 'sa_slide' . $slide2 . '_button_background',$slide1_button_background);
			update_post_meta( $post->ID, 'sa_slide' . $slide2 . '_button_color', $slide1_button_color );
			update_post_meta( $post->ID, 'sa_slide' . $slide2 . '_link_target', $slide1_link_target );
			update_post_meta( $post->ID, 'sa_slide' . $slide2 . '_popup_type', $slide1_popup_type );
			update_post_meta( $post->ID, 'sa_slide' . $slide2 . '_popup_imageid', $slide1_popup_imageid );
			update_post_meta( $post->ID, 'sa_slide' . $slide2 . '_popup_imagetitle', $slide1_popup_imagetitle );
			update_post_meta( $post->ID, 'sa_slide' . $slide2 . '_popup_video_id', $slide1_popup_video_id );
			update_post_meta( $post->ID, 'sa_slide' . $slide2 . '_popup_video_type', $slide1_popup_video_type );
			update_post_meta( $post->ID, 'sa_slide' . $slide2 . '_popup_background', $slide1_popup_background );
			update_post_meta( $post->ID, 'sa_slide' . $slide2 . '_popup_html', $slide1_popup_html );
			update_post_meta( $post->ID, 'sa_slide' . $slide2 . '_popup_shortcode', $slide1_popup_shortcode );
			update_post_meta( $post->ID, 'sa_slide' . $slide2 . '_popup_bgcol', $slide1_popup_bgcol );
			update_post_meta( $post->ID, 'sa_slide' . $slide2 . '_popup_width', $slide1_popup_width );
			update_post_meta( $post->ID, 'sa_slide' . $slide1 . '_content', $slide2_content );
			$slide2_image_data = $slide2_image_id . '~' . $slide2_image_pos . '~' . $slide2_image_size . '~' . $slide2_image_repeat . '~' . $slide2_image_color;
			update_post_meta( $post->ID, 'sa_slide' . $slide1 . '_image_data', $slide2_image_data );
			update_post_meta( $post->ID, 'sa_slide' . $slide1 . '_link_url', $slide2_link_url );
			update_post_meta( $post->ID, 'sa_slide' . $slide1 . '_link_text', $slide2_link_text );
			update_post_meta( $post->ID, 'sa_slide' . $slide1 . '_link_target', $slide2_link_target );
			update_post_meta( $post->ID, 'sa_slide' . $slide1 . '_button_background',$slide2_button_background);
			update_post_meta( $post->ID, 'sa_slide' . $slide1 . '_button_color', $slide2_button_color);
			update_post_meta( $post->ID, 'sa_slide' . $slide1 . '_popup_type', $slide2_popup_type );
			update_post_meta( $post->ID, 'sa_slide' . $slide1 . '_popup_imageid', $slide2_popup_imageid );
			update_post_meta( $post->ID, 'sa_slide' . $slide1 . '_popup_imagetitle', $slide2_popup_imagetitle );
			update_post_meta( $post->ID, 'sa_slide' . $slide1 . '_popup_video_id', $slide2_popup_video_id );
			update_post_meta( $post->ID, 'sa_slide' . $slide1 . '_popup_video_type', $slide2_popup_video_type );
			update_post_meta( $post->ID, 'sa_slide' . $slide1 . '_popup_background', $slide2_popup_background );
			update_post_meta( $post->ID, 'sa_slide' . $slide1 . '_popup_html', $slide2_popup_html );
			update_post_meta( $post->ID, 'sa_slide' . $slide1 . '_popup_shortcode', $slide2_popup_shortcode );
			update_post_meta( $post->ID, 'sa_slide' . $slide1 . '_popup_bgcol', $slide2_popup_bgcol );
			update_post_meta( $post->ID, 'sa_slide' . $slide1 . '_popup_width', $slide2_popup_width );
		}

		// UPDATE SLIDE CONTENT CHARACTER COUNT.
		$total_slides = get_post_meta( $post->ID, 'sa_num_slides', true );
		for ( $i = 1; $i <= $total_slides; $i++ ) {
			$slide_content = get_post_meta( $post->ID, 'sa_slide' . $i . '_content', true );
			$char_count    = strlen( $slide_content );
			update_post_meta( $post->ID, 'sa_slide' . $i . '_char_count', $char_count );
		}

		// UPDATE SLIDER SETTINGS.
		update_post_meta( $post->ID, 'sa_num_slides', abs( intval( $slides_saved ) ) );
	
			update_post_meta( $post->ID, 'sa_disable_visual_editor', '0' );
		
		if ( isset( $_POST['sa_info_added'] ) ) {
			update_post_meta( $post->ID, 'sa_info_added', abs( intval( $_POST['sa_info_added'] ) ) );
		}
		if ( isset( $_POST['sa_info_deleted'] ) ) {
			update_post_meta( $post->ID, 'sa_info_deleted', abs( intval( $_POST['sa_info_deleted'] ) ) );
		}
		if ( isset( $_POST['sa_duplicate_slide'] ) ) {
			update_post_meta( $post->ID, 'sa_duplicate_slide', abs( intval( $_POST['sa_duplicate_slide'] ) ) );
		}
		if ( isset( $_POST['sa_info_duplicated'] ) ) {
			update_post_meta( $post->ID, 'sa_info_duplicated', abs( intval( $_POST['sa_info_duplicated'] ) ) );
		}
		if ( isset( $_POST['sa_move_slide_up'] ) ) {
			update_post_meta( $post->ID, 'sa_move_slide_up', abs( intval( $_POST['sa_move_slide_up'] ) ) );
		}
		if ( isset( $_POST['sa_info_moved'] ) ) {
			update_post_meta( $post->ID, 'sa_info_moved', abs( intval( $_POST['sa_info_moved'] ) ) );
		}
	
			update_post_meta( $post->ID, 'sa_slide_duration', '10' );
		
		
			update_post_meta( $post->ID, 'sa_slide_transition', '0.2' );
		

			update_post_meta( $post->ID, 'sa_slide_by', '1' );
		
		
			update_post_meta( $post->ID, 'sa_loop_slider', '1' );
		
	
			update_post_meta( $post->ID, 'sa_stop_hover', '1' );
	
	
			update_post_meta( $post->ID, 'sa_nav_arrows', '1' );
	
			update_post_meta( $post->ID, 'sa_pagination', '1' );
		
			update_post_meta( $post->ID, 'sa_random_order', '0' );
		
	
			update_post_meta( $post->ID, 'sa_reverse_order', '0' );
		

			update_post_meta( $post->ID, 'sa_shortcodes', '0' );
	
		
			update_post_meta( $post->ID, 'sa_mouse_drag', '1' );
		
	
			update_post_meta( $post->ID, 'sa_touch_drag', '1' );

	
			update_post_meta( $post->ID, 'sa_mousewheel', '0' );
		

			update_post_meta( $post->ID, 'sa_click_advance', '0' );
	
			update_post_meta( $post->ID, 'sa_auto_height', '0' );
		
	
			update_post_meta( $post->ID, 'sa_vert_center', '0' );
		

		// UPDATE SLIDER ITEMS DISPLAYED.

			update_post_meta( $post->ID, 'sa_items_width1', '480' );

			update_post_meta( $post->ID, 'sa_items_width2', '768');
		
			update_post_meta( $post->ID, 'sa_items_width3', '980' );
		
		
			update_post_meta( $post->ID, 'sa_items_width4', '1200');
		
			update_post_meta( $post->ID, 'sa_items_width5', '1500' );
		
	
			update_post_meta( $post->ID, 'sa_items_width6', '1500' );
		
		
			update_post_meta( $post->ID, 'sa_transition', 'Slide');
		
	
			update_post_meta( $post->ID, 'sa_hero_slider', '0' );
		
	
			update_post_meta( $post->ID, 'sa_showcase_slider', '0' );
		
		
			update_post_meta( $post->ID, 'sa_showcase_width', '120' );
		

			update_post_meta( $post->ID, 'sa_showcase_tablet', '0' );
		
		
			update_post_meta( $post->ID, 'sa_showcase_width_tab', '130' );
		
	
			update_post_meta( $post->ID, 'sa_showcase_mobile', '0' );
		
			update_post_meta( $post->ID, 'sa_showcase_width_mob', '140' );


		// UPDATE SLIDER STYLE.
		
			$post_css_id = 'Slider_'.$post->ID;
			update_post_meta( $post->ID, 'sa_css_id', sanitize_text_field( $post_css_id ) );
		

			update_post_meta( $post->ID, 'sa_background_color', 'rgba(0,0,0,0)' );

			update_post_meta( $post->ID, 'sa_border_width', '0' );
	
			update_post_meta( $post->ID, 'sa_border_color', 'rgba(0,0,0,0)' );
	
		
			update_post_meta( $post->ID, 'sa_border_radius', '0' );
	
			update_post_meta( $post->ID, 'sa_wrapper_padd_top', '0' );
		
			update_post_meta( $post->ID, 'sa_wrapper_padd_right','0' );
		
			update_post_meta( $post->ID, 'sa_wrapper_padd_bottom', '0' );
		
			update_post_meta( $post->ID, 'sa_wrapper_padd_left', '0' );
			if($_POST['slider_height']){
				update_post_meta( $post->ID, 'sa_slide_min_height_perc', $_POST["slider_height"] );
			}else{
				update_post_meta( $post->ID, 'sa_slide_min_height_perc', '500' );
			}
			update_post_meta( $post->ID, 'sa_slide_padding_tb', '5' );
	
			update_post_meta( $post->ID, 'sa_slide_padding_lr', '5' );
		
			update_post_meta( $post->ID, 'sa_slide_margin_lr','0' );
	
	
			update_post_meta( $post->ID, 'sa_slide_icons_location', 'Center Center' );
	
		
			update_post_meta( $post->ID, 'sa_slide_icons_color', 'white' );

			update_post_meta( $post->ID, 'sa_autohide_arrows', '0' );
		

			update_post_meta( $post->ID, 'sa_dot_per_slide', '1' );
	
		
			update_post_meta( $post->ID, 'sa_slide_icons_visible', '1' );


			update_post_meta( $post->ID, 'sa_slide_icons_fullslide', '0' );
		

		// OTHER SETTINGS.
		$other_settings = '';
	
			$other_settings .= '0';
	

			$other_settings .= '|0';


			$other_settings .= '|0';
	
			$other_settings .= '|0';

			$other_settings .= '|0';

		// disable preview setting (now removed & permanently disabled).
		$other_settings .= '|1';
	
			$other_settings .= '|full';
	

			$other_settings .= '|0';
		
		update_post_meta( $post->ID, 'sa_other_settings', $other_settings );
		// starting slide number.
		if ( isset( $_POST['sa_start_pos'] ) ) {
			update_post_meta( $post->ID, 'sa_start_pos', abs( intval( $_POST['sa_start_pos'] ) ) );
		}

		// THUMBNAIL PAGINATION.

			update_post_meta( $post->ID, 'sa_thumbs_active', '0' );

		if ( isset( $_POST['sa_thumbs_location'] ) ) {
			update_post_meta( $post->ID, 'sa_thumbs_location', sanitize_text_field( wp_unslash( $_POST['sa_thumbs_location'] ) ) );
		}
		if ( isset( $_POST['sa_thumbs_image_size'] ) ) {
			update_post_meta( $post->ID, 'sa_thumbs_image_size', sanitize_text_field( wp_unslash( $_POST['sa_thumbs_image_size'] ) ) );
		}
		if ( isset( $_POST['sa_thumbs_padding'] ) ) {
			update_post_meta( $post->ID, 'sa_thumbs_padding', abs( floatval( $_POST['sa_thumbs_padding'] ) ) );
		}
		if ( isset( $_POST['sa_thumbs_width'] ) ) {
			update_post_meta( $post->ID, 'sa_thumbs_width', abs( intval( $_POST['sa_thumbs_width'] ) ) );
		}
		if ( isset( $_POST['sa_thumbs_height'] ) ) {
			update_post_meta( $post->ID, 'sa_thumbs_height', abs( intval( $_POST['sa_thumbs_height'] ) ) );
		}
		if ( isset( $_POST['sa_thumbs_opacity'] ) ) {
			update_post_meta( $post->ID, 'sa_thumbs_opacity', abs( intval( $_POST['sa_thumbs_opacity'] ) ) );
		}
		if ( isset( $_POST['sa_thumbs_border_width'] ) ) {
			update_post_meta( $post->ID, 'sa_thumbs_border_width', abs( intval( $_POST['sa_thumbs_border_width'] ) ) );
		}
		if ( isset( $_POST['sa_thumbs_border_color'] ) ) {
			update_post_meta( $post->ID, 'sa_thumbs_border_color', sanitize_text_field( wp_unslash( $_POST['sa_thumbs_border_color'] ) ) );
		}
		if ( isset( $_POST['sa_thumbs_resp_tablet'] ) ) {
			update_post_meta( $post->ID, 'sa_thumbs_resp_tablet', abs( intval( $_POST['sa_thumbs_resp_tablet'] ) ) );
		}
		if ( isset( $_POST['sa_thumbs_resp_mobile'] ) ) {
			update_post_meta( $post->ID, 'sa_thumbs_resp_mobile', abs( intval( $_POST['sa_thumbs_resp_mobile'] ) ) );
		}
	}
}
}



/**
 * ###################################################################################
 * ### FUNCTION DISPLAYS THE 'RE-ORDER SLIDES' SUB-PAGE IN THE WordPress DASHBOARD ###
 * ###################################################################################
 */
if(!function_exists('esrcpt_slider_extra_sa_menu_pages')){
function esrcpt_slider_extra_sa_menu_pages() {
	add_submenu_page(
		'edit.php?post_type=sa_slider',
		__( 'Re-Order Slides', 'menu-sa-order' ),
		__( 'Re-Order Slides', 'menu-sa-order' ),
		'manage_options',
		'reorderslides',
		'esrcpt_slider_sa_reorder_slides_page'
	);
}
}

/**
 * ### FUNCTION CONTAINING THE 'RE-ORDER' SLIDES FUNCTIONALITY ###
 */
if(!function_exists('esrcpt_slider_sa_reorder_slides_page')){
function esrcpt_slider_sa_reorder_slides_page() {
	$page_url          = get_admin_url() . 'edit.php?post_type=sa_slider&page=reorderslides';
	$placeholder_image = plugins_url( '../images/bg_placeholder.png', __FILE__ );

	echo "<div id='sa_reorder_slides'>\n";
	echo '<h1>EASY SLIDER - Re-Order Slides</h1>';

	if ( isset( $_SERVER['REQUEST_METHOD'] ) && ( 'POST' === $_SERVER['REQUEST_METHOD'] )
		&& isset( $_POST['reorder_nonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['reorder_nonce'] ) ), 'reorder_action' ) ) {
		// A POST VARIABLE FOR 'SLIDER ID' HAS BEEN PASSED.
		if ( isset( $_POST['sar_slider_id'] ) ) {
			$slider_id    = sanitize_text_field( wp_unslash( $_POST['sar_slider_id'] ) );
			$slider_title = get_the_title( $slider_id );
		} else {
			exit();
		}

		if ( isset( $_POST['sar_sort_order'] ) && ( '' !== $_POST['sar_sort_order'] ) ) {
			// CHANGE THE ORDER OF SLIDE DATA FOR THE SLIDER AND RE-SAVE METADATA.
			$sort_order   = sanitize_text_field( wp_unslash( $_POST['sar_sort_order'] ) );
			$data_in_arr  = array();
			$data_out_arr = array();

			// 1) SAVE SLIDES METADATA TO AN 'IN' ARRAY (ONLY SLIDES MEATDATA AND NO SETTINGS DATA SAVED!).
			$metadata   = get_metadata( 'post', $slider_id );
			$num_slides = $metadata['sa_num_slides'][0];
			foreach ( $metadata as $key => $value_arr ) {
				$value = $value_arr[0];
				for ( $i = 1; $i <= $num_slides; $i++ ) {
					$key_prefix = 'sa_slide' . $i . '_';
					if ( strpos( $key, $key_prefix ) === 0 ) {
						// metadata key starts with the key prefix ('sa_slide??').
						$data_in_arr[ $key ] = $value;
					}
				}
			}

			// 2) CREATE THE NEW SLIDES 'OUT' ARRAY (WITH THE NEW SLIDE ORDER).
			$sort_order_arr  = explode( ',', $sort_order );
			$count_order_arr = count( $sort_order_arr );
			for ( $i = 0; $i < $count_order_arr; $i++ ) {
				$loop_prefix  = 'sa_slide' . ( $i + 1 ) . '_'; // ascending loop order (1, 2, 3...).
				$order_prefix = 'sa_slide' . $sort_order_arr[ $i ] . '_'; // slide number to be stored in this slot.
				foreach ( $data_in_arr as $key => $value ) {
					if ( strpos( $key, $order_prefix ) === 0 ) {
						// metakey key value starts with the order prefix.
						$new_key                  = str_replace( $order_prefix, $loop_prefix, $key );
						$data_out_arr[ $new_key ] = $value;
					}
				}
			}

			// 3) LOOP THROUGH SLIDES 'OUT' ARRAY UPDATING POST METADATA.
			foreach ( $data_out_arr as $key => $value ) {
				update_post_meta( $slider_id, $key, $value );
			}

			echo "<h3 id='sar_success_message'>SLIDE ORDER HAS BEEN UPDATED</h3>";
		} else {
			if ( isset( $_POST['sar_del_slides'] ) && ( '' !== $_POST['sar_del_slides'] ) ) {
				// DELETE ALL SLIDES WITH THE 'DELETE SLIDE' CHECKBOX CHECKED.
				$del_slides     = sanitize_text_field( wp_unslash( $_POST['sar_del_slides'] ) );
				$del_slides_arr = explode( ',', $del_slides );
				$data_in_arr    = array();
				$data_out_arr   = array();

				// 1) SAVE SLIDES METADATA TO AN 'IN' ARRAY (ONLY SLIDES MEATDATA AND NO SETTINGS DATA SAVED!).
				$metadata   = get_metadata( 'post', $slider_id );
				$num_slides = $metadata['sa_num_slides'][0];
				foreach ( $metadata as $key => $value_arr ) {
					$value = $value_arr[0];
					for ( $i = 1; $i <= $num_slides; $i++ ) {
						$key_prefix = 'sa_slide' . $i . '_';
						if ( strpos( $key, $key_prefix ) === 0 ) {
							// metadata key starts with the key prefix ('sa_slide??').
							$data_in_arr[ $i ][ $key ] = $value;
						}
					}
				}

				// 2) CREATE THE NEW SLIDES 'OUT' ARRAY (WITH THE DELETED SLIDES REMOVED)
				$curr_index = 0;
				$tot_del    = 0;
				for ( $i = 1; $i <= $num_slides; $i++ ) {
					$loop_prefix   = 'sa_slide' . $i . '_';
					$delete_yn     = 0;
					$count_del_arr = count( $del_slides_arr );
					for ( $j = 0; $j < $count_del_arr; $j++ ) {
						if ( $i === $del_slides_arr[ $j ] ) {
							$delete_yn = 1;
						}
					}
					if ( 0 === $delete_yn ) {
						// current slide is NOT to be deleted - copy to 'out' array.
						$curr_index++;
						$curr_prefix = 'sa_slide' . $curr_index . '_';
						foreach ( $data_in_arr[ $i ] as $key => $value ) {
							$new_key                  = str_replace( $loop_prefix, $curr_prefix, $key );
							$data_out_arr[ $new_key ] = $value;
						}
					} else {
						$tot_del++;
					}
				}

				// 3) LOOP THROUGH SLIDES 'OUT' ARRAY UPDATING POST METADATA.
				update_post_meta( $slider_id, 'sa_num_slides', $curr_index );
				foreach ( $data_out_arr as $key => $value ) {
					update_post_meta( $slider_id, $key, $value );
				}

				if ( 1 === $tot_del ) {
					echo "<h3 id='sar_success_message'>" . esc_html( $tot_del ) . ' SLIDE HAS BEEN DELETED</h3>';
				} else {
					echo "<h3 id='sar_success_message'>" . esc_html( $tot_del ) . ' SLIDES HAVE BEEN DELETED</h3>';
				}
			}
		}

		// GET REQUIRED SLIDER METADATA AND SAVE WITHIN AN ARRAY.
		$num_slides = 0;
		$slide_arr  = array();
		$metadata   = get_metadata( 'post', $slider_id );
		if ( count( $metadata ) > 0 ) {
			$num_slides = $metadata['sa_num_slides'][0];
		}
		if ( 0 !== $num_slides ) {
			// SLIDER CONTAINS SLIDES - DISPLAY SORTABLE LIST OF SLIDES.
			for ( $i = 1; $i <= $num_slides; $i++ ) {
				$image_data                  = $metadata[ 'sa_slide' . $i . '_image_data' ][0];
				$image_data_arr              = explode( '~', $image_data );
				$slide_arr[ $i ]['image_id'] = $image_data_arr[0];
				$slide_arr[ $i ]['content']  = $metadata[ 'sa_slide' . $i . '_content' ][0];
				// cater for popup images used as the slide background.
				$popup_type       = '';
				$popup_background = '';
				if ( isset( $metadata[ 'sa_slide' . $i . '_popup_type' ][0] ) ) {
					$popup_type = $metadata[ 'sa_slide' . $i . '_popup_type' ][0];
				}
				if ( isset( $metadata[ 'sa_slide' . $i . '_popup_background' ][0] ) ) {
					$popup_background = $metadata[ 'sa_slide' . $i . '_popup_background' ][0];
				}
				if ( 'IMAGE' === $popup_type ) {
					if ( ( '' !== $popup_background ) && ( 'no' !== $popup_background ) ) {
							$slide_arr[ $i ]['image_id'] = $metadata[ 'sa_slide' . $i . '_popup_imageid' ][0];
					}
				}
			}

			// DISPLAY THE SORTABLE GRID OF SLIDES.
			echo "<h2 id='sar_slider_title'>" . esc_html( $slider_title ) . "</h2>\n";
			echo "<h3 id='sar_drag_message'>Drag slides to re-order...</h3>\n";
			echo "<ul id='sar_sortable'>\n";
			for ( $i = 1; $i <= $num_slides; $i++ ) {
				$bg_image        = $placeholder_image;
				$slide_image_src = wp_get_attachment_image_src( $slide_arr[ $i ]['image_id'], 'thumbnail' );
				if ( ! empty( $slide_image_src[0] ) ) {
					$bg_image = $slide_image_src[0];
				}
				echo "<li id='sar" . esc_attr( $i ) . "' class='ui-state-default'>\n";
				echo "<div class='sar_image' style='background-image:url(\"" . esc_url( $bg_image ) . "\");'></div>\n";
				echo "<div class='sar_content'>\n";
				echo "<h4 class='sar_slide_num'>SLIDE " . esc_html( $i ) . "</h4>\n";
				echo "<div class='sar_del_slide'>DELETE <span>SLIDE</span>";
				echo "<input type='checkbox' id='sar_del" . esc_attr( $i ) . "' name='sar_del" . esc_attr( $i ) . "' class='sar_del_checkbox'/>";
				echo "</div>\n";
				echo "<div class='sar_slide_html'>" . esc_html( nl2br( htmlentities( $slide_arr[ $i ]['content'] ) ) ) . "</div>\n";
				echo '</div>';
				echo "</li>\n";
			}
			echo "</ul>\n";

			// DISPLAY THE HTML FORM CONTAINING THE SORT ORDER INPUT ELEMENT.
			echo "<form method='post' id='sar_order_form'>\n";
			wp_nonce_field( 'reorder_action', 'reorder_nonce' );
			echo "<input type='hidden' name='sar_slider_id' value='" . esc_attr( $slider_id ) . "'/>";
			echo "<input type='hidden' id='sar_sort_order' name='sar_sort_order'/>";
			echo "<input type='hidden' id='sar_del_slides' name='sar_del_slides'/>";
			echo "<input type='submit' id='sar_update_but' value='UPDATE ORDER'/>";
			echo "<input type='submit' id='sar_delete_but' value='DELETE SLIDES'/>";
			echo "</form>\n";

		} else {
			// SLIDER CONTAINS NO SLIDES - DISPLAY MESSAGE.
			echo "<h3 id='sar_no_slides_found'>This slider contains NO slides!</h3>\n";
			echo "<a class='sar_back_button' href='" . esc_url( $page_url ) . "'>BACK</a>";
		}
	} else {
		// ##### NO POST VARIABLE FOR 'SLIDER ID' HAS BEEN PASSED #####
		// WP QUERY TO GET ARRAY OF SA SLIDERS (ID & TITLE) THAT EXIST.
		$slider_arr = array();
		$count      = 0;
		$args       = array(
			'post_type'      => 'es_slider',
			'post_status'    => array( 'publish', 'draft' ),
			'orderby'        => 'menu_order',
			'order'          => 'ASC',
			'posts_per_page' => -1,
		);
		$sliders    = new WP_Query( $args );
		if ( $sliders->have_posts() ) {
			while ( $sliders->have_posts() ) {
				$sliders->the_post();
				$slider_arr[ $count ]['id']    = get_the_ID();
				$slider_arr[ $count ]['title'] = get_the_title();
				$count++;
			}
		}
		wp_reset_postdata();

		if ( count( $slider_arr ) > 0 ) {
			// DISPLAY FORM CONTAINING SA SLIDER SELECT DROPDOWN.
			echo "<form method='post' id='sar_slider_form'>\n";
			wp_nonce_field( 'reorder_action', 'reorder_nonce' );
			echo "<p>This tool allows you to change the order of slides within a EASY SLIDER slider.</p>\n";
			echo "<p>Select the slider you would like to re-order, then just drag-and-drop slides for your new slide order.</p>\n";
			echo "<div style='padding-top:10px;'>Select Slider to Re-Order:<br/>";
			echo "<select id='sar_slider_id' name='sar_slider_id'>\n";
			$count_slider_arr = count( $slider_arr );
			for ( $i = 0; $i < $count_slider_arr; $i++ ) {
				echo '<h4>|' . esc_html( $slider_arr[ $i ]['id'] ) . '|' . esc_html( $slider_arr[ $i ]['title'] ) . '|</h4>';
				echo "<option value='" . esc_attr( $slider_arr[ $i ]['id'] ) . "'>" . esc_html( $slider_arr[ $i ]['title'] ) . ' (#' . esc_html( $slider_arr[ $i ]['id'] ) . ")</option>\n";
			}
			echo "<select></div>\n";
			echo "<div><input type='submit' value='Select Slider'/></div>\n";
			echo "</form>\n";
		} else {
			// NO SA SLIDERS FOUND - DISPLAY MESSAGE.
			echo "<h3 id='sar_no_sliders_found'>No EASY SLIDER sliders found!</h3>\n";
		}
	}

	echo "</div>\n";
}
}


/**
 * ### FILTER TO ALLOW IFRAMES WITHIN SLIDE CONTENT ###
 *
 * @param array $allowedposttags Allowed Post Tags.
 */
if(!function_exists('esrcpt_slider_allow_iframes_filter')){
function esrcpt_slider_allow_iframes_filter( $allowedposttags ) {
	// Only change for users who can publish posts.
	if ( ! current_user_can( 'publish_posts' ) ) {
		return $allowedposttags;
	}

	// Allow iframes and the following attributes.
	$allowedposttags['iframe'] = array(
		'align'           => true,
		'width'           => true,
		'height'          => true,
		'frameborder'     => true,
		'name'            => true,
		'src'             => true,
		'title'           => true,
		'allow'           => true,
		'allowfullscreen' => true,
		'id'              => true,
		'class'           => true,
		'style'           => true,
		'scrolling'       => true,
		'marginwidth'     => true,
		'marginheight'    => true,
	);
	return $allowedposttags;
}
}
?>
