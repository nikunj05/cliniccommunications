<?php
/**
 * Clinic Communications functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Clinic_Communications
 */

if ( ! function_exists( 'clinic_communications_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function clinic_communications_setup() {
		/*
		 * Let WordPress manage the document title.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1'      => esc_html__( 'Primary', 'clinic-communications' ),
				'footer-menu' => esc_html__( 'Footer Menu', 'clinic-communications' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add support for custom logo
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 76,
				'width'       => 190,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'clinic_communications_setup' );

/**
 * Enqueue scripts and styles.
 */
function clinic_communications_scripts() {
	// Styles
	wp_enqueue_style( 'clinic-communications-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '5.0.0' );
	wp_enqueue_style( 'clinic-communications-aos', get_template_directory_uri() . '/css/aos.css', array(), '1.0.0' );
	wp_enqueue_style( 'clinic-communications-slick', get_template_directory_uri() . '/css/slick.css', array(), '1.8.1' );
	wp_enqueue_style( 'clinic-communications-slick-theme', get_template_directory_uri() . '/css/slick-theme.css', array( 'clinic-communications-slick' ), '1.8.1' );
	wp_enqueue_style( 'clinic-communications-main-style', get_template_directory_uri() . '/css/style.css', array(), '1.0.0' );
	wp_enqueue_style( 'clinic-communications-style', get_stylesheet_uri(), array(), '1.0.0' );

	// Scripts
	wp_enqueue_script( 'clinic-communications-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.bundle.js', array(), '5.0.0', true );
	wp_enqueue_script( 'clinic-communications-aos-js', get_template_directory_uri() . '/js/aos.js', array(), '1.0.0', true );
	wp_enqueue_script( 'clinic-communications-slick-js', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery' ), '1.8.1', true );
	wp_enqueue_script( 'clinic-communications-jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), '3.6.0', true );
	wp_enqueue_script( 'clinic-communications-main-js', get_template_directory_uri() . '/js/main.js', array( 'clinic-communications-jquery', 'clinic-communications-slick-js' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'clinic_communications_scripts' );

/**
 * Add 'nav-item' class to menu <li> elements.
 */
function clinic_communications_add_li_class( $classes, $item, $args ) {
	if ( isset( $args->theme_location ) && 'menu-1' === $args->theme_location ) {
		$classes[] = 'nav-item';
		if ( in_array( 'menu-item-has-children', $classes ) ) {
			$classes[] = 'has-submenu';
		}
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'clinic_communications_add_li_class', 10, 3 );

/**
 * Add 'nav-link' class to menu <a> elements.
 */
function clinic_communications_add_a_class( $atts, $item, $args, $depth ) {
	if ( isset( $args->theme_location ) && 'menu-1' === $args->theme_location ) {
		if ( $depth > 0 ) {
			$atts['class'] = 'submenu-link';
		} else {
			$atts['class'] = 'nav-link';
			if ( in_array( 'menu-item-has-children', $item->classes ) ) {
				$atts['class'] .= ' dropdown-toggle';
			}
		}
	}
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'clinic_communications_add_a_class', 10, 4 );

/**
 * Custom Menu Walker to match static HTML structure.
 */
class Clinic_Communications_Walker extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = null ) {
		$indent  = str_repeat( "\t", $depth );
		$output .= "\n$indent<div class=\"header_submenu submenu\"><div class=\"submenu-inner\"><ul class=\"submenu-list\">\n";
	}
	function end_lvl( &$output, $depth = 0, $args = null ) {
		$indent  = str_repeat( "\t", $depth );
		$output .= "$indent</ul></div></div>\n";
	}
}

/**
 * Append the SVG arrow to menu items that have children.
 */
function clinic_communications_add_arrow_to_menu_title( $title, $item, $args, $depth ) {
	if ( isset( $args->theme_location ) && 'menu-1' === $args->theme_location ) {
		if ( in_array( 'menu-item-has-children', $item->classes ) ) {
			$title .= '
				<svg width="12" height="12" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="submenu-arrow-down-icon">
					<path d="M17.9997 7.05857C18.0046 6.85222 17.9404 6.64958 17.8158 6.47883C17.6912 6.30807 17.5125 6.17769 17.3046 6.10580C17.0967 6.03392 16.87 6.0241 16.6559 6.07772C16.4417 6.13133 16.251 6.24572 16.1099 6.40497L10.5173 12.4813L4.92658 6.40497C4.83959 6.2948 4.72915 6.20255 4.60209 6.13397C4.47502 6.06539 4.33407 6.02198 4.18813 6.00644C4.0422 5.9909 3.89443 6.00357 3.754 6.04366C3.61358 6.08375 3.48352 6.1504 3.37205 6.23943C3.26058 6.32846 3.17015 6.43795 3.10625 6.56105C3.04235 6.68415 3.00646 6.8182 3.00079 6.95482C2.99513 7.09143 3.01975 7.22766 3.07327 7.35498C3.12679 7.48229 3.20798 7.59795 3.31175 7.69471L9.7067 14.6516C9.80686 14.7608 9.93119 14.8485 10.0713 14.9087C10.2114 14.9688 10.3639 15 10.5182 15C10.6725 15 10.825 14.9688 10.9652 14.9087C11.1053 14.8485 11.2297 14.7608 11.3299 14.6516L17.731 7.69471C17.8987 7.51897 17.9938 7.29356 17.9997 7.05857Z" fill="currentColor"></path>
				</svg>';
		}
	}
	return $title;
}
add_filter( 'nav_menu_item_title', 'clinic_communications_add_arrow_to_menu_title', 10, 4 );

/**
 * Register Social Media settings in Customizer.
 */
/**
 * Get all supported social platforms and their icons/metadata.
 */
function clinic_communications_get_social_platforms() {
	return array(
		'instagram' => array(
			'label'         => 'Instagram',
			'icon'          => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 2.16338C15.2044 2.16338 15.5841 2.17566 16.8506 2.2335C18.0206 2.28684 18.6553 2.4825 19.0781 2.64656C19.6387 2.86406 20.0391 3.12375 20.4591 3.54188C20.8781 3.96188 21.1378 4.36031 21.3553 4.92188C21.5184 5.34469 21.7144 5.97938 21.7678 7.14938C21.8247 8.41594 21.8378 8.79563 21.8378 12C21.8378 15.2044 21.8256 15.5841 21.7678 16.8506C21.7144 18.0206 21.5184 18.6553 21.3553 19.0781C21.1378 19.6387 20.8781 20.0391 20.4591 20.4591C20.0391 20.8781 19.6406 21.1378 19.0781 21.3553C18.6553 21.5184 18.0206 21.7144 16.8506 21.7678C15.5841 21.8247 15.2044 21.8378 12 21.8378C8.79563 21.8378 8.41594 21.8256 7.14938 21.7678C5.97938 21.7144 5.34469 21.5184 4.92188 21.3553C4.36125 21.1378 3.96281 20.8781 3.54281 20.4591C3.12281 20.0391 2.86313 19.6406 2.64563 19.0781C2.4825 18.6553 2.28684 18.0206 2.2335 16.8506C2.17656 15.5841 2.16338 15.2044 2.16338 12C2.16338 8.79563 2.17566 8.41594 2.2335 7.14938C2.28684 5.97938 2.4825 5.34469 2.64656 4.92188C2.86406 4.36125 3.12375 3.96281 3.54188 3.54281C3.96188 3.12281 4.36031 2.86313 4.92188 2.64563C5.34469 2.4825 5.97938 2.28684 7.14938 2.2335C8.41594 2.17656 8.79563 2.16338 12 2.16338ZM12 0C8.74125 0 8.3325 0.0140625 7.05188 0.0721875C5.77312 0.13125 4.90125 0.33375 4.14 0.629063C3.35156 0.934687 2.68219 1.34344 2.01562 2.01562C1.34344 2.68219 0.934687 3.35156 0.629063 4.14C0.33375 4.90125 0.13125 5.77312 0.0721875 7.05188C0.0140625 8.3325 0 8.74125 0 12C0 15.2588 0.0140625 15.6675 0.0721875 16.9481C0.13125 18.2269 0.33375 19.0988 0.629063 19.86C0.934687 20.6484 1.34344 21.3178 2.01562 21.9844C2.68219 22.6566 3.35156 23.0653 4.14 23.3709C4.90125 23.6663 5.77312 23.8688 7.05188 23.9278C8.3325 23.9859 8.74125 24 12 24C15.2588 24 15.6675 23.9859 16.9481 23.9278C18.2269 23.8688 19.0988 23.6663 19.86 23.3709C20.6484 23.0653 21.3178 22.6566 21.9844 21.9844C22.6566 21.3178 23.0653 20.6484 23.3709 19.86C23.6663 19.0988 23.8688 18.2269 23.9278 16.9481C23.9859 15.6675 24 15.2588 24 12C24 8.74125 23.9859 8.3325 23.9278 7.05188C23.8688 5.77312 23.6663 4.90125 23.3709 4.14C23.0653 3.35156 22.6566 2.68219 21.9844 2.01562C21.3178 1.34344 20.6484 0.934687 19.86 0.629063C19.0988 0.33375 18.2269 0.13125 16.9481 0.0721875C15.6675 0.0140625 15.2588 0 12 0ZM12 5.83875C8.59781 5.83875 5.83875 8.59781 5.83875 12C5.83875 15.4022 8.59781 18.1613 12 18.1613C15.4022 18.1613 18.1613 15.4022 18.1613 12C18.1613 8.59781 15.4022 5.83875 12 5.83875ZM12 16C9.79125 16 8 14.2087 8 12C8 9.79125 9.79125 8 12 8C14.2087 8 16 9.79125 16 12C16 14.2087 14.2087 16 12 16ZM18.1631 4.4025C17.3681 4.4025 16.7212 5.04937 16.7212 5.84437C16.7212 6.63937 17.3681 7.28625 18.1631 7.28625C18.9581 7.28625 19.605 6.63937 19.605 5.84437C19.605 5.04937 18.9581 4.4025 18.1631 4.4025Z" fill="currentColor"/></svg>',
			'floating_icon' => 'instagram.svg',
		),
		'linkedin'  => array(
			'label'         => 'LinkedIn',
			'icon'          => '<svg width="24" height="24" viewBox="0 0 128 128" fill="none" xmlns="http://www.w3.org/2000/svg" id="linkdin"><path fill-rule="evenodd" d="M72.658 52.912c7.188-8.265 15.318-12.457 25.597-11.951 16.723.822 28.493 12.464 29.339 30.639.743 16.008.216 32.072.33 48.108.028 3.848-1.774 5.286-5.467 5.193-4.947-.125-9.912-.239-14.847.049-4.896.286-6.758-1.679-6.674-6.542.193-10.887.074-21.782.053-32.673-.007-2.968.03-5.95-.202-8.904-.715-9.143-6.08-14.661-14.034-14.599-8.175.063-14.789 6.633-14.933 15.374-.211 12.868-.084 25.741-.111 38.612-.019 8.618-.026 8.618-8.535 8.674-18.4.118-18.393.118-18.4-18.286-.007-18.811.13-37.627-.144-56.434-.079-5.446 1.742-7.627 7.172-7.118 3.14.295 6.331.033 9.501.046C70.761 43.142 70.761 43.147 72.658 52.912zM1.921 83.654c0-11.282.207-22.569-.091-33.842-.137-5.272 1.876-7.097 6.958-6.784 4.93.302 9.896.17 14.84.065 3.714-.077 5.393 1.435 5.379 5.27-.088 23.751-.1 47.499-.054 71.25.007 3.802-1.637 5.369-5.376 5.29-5.341-.114-10.692-.156-16.029.021-4.097.137-5.636-1.614-5.592-5.646.13-11.874.046-23.751.046-35.625C1.977 83.654 1.949 83.654 1.921 83.654zM15.182 31.319C6.494 31.282.059 25.299 0 17.203-.06 9.245 6.582 3.029 15.147 3.023c9.32-.005 15.632 5.739 15.595 14.19C30.702 25.819 24.592 31.356 15.182 31.319z" clip-rule="evenodd" fill="currentColor"/></svg>',
			'floating_icon' => 'linkdin.svg',
		),
		'tiktok'    => array(
			'label'         => 'TikTok',
			'icon'          => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.589 6.686a4.793 4.793 0 01-3.77-4.245V2h-3.445v13.672a2.896 2.896 0 01-5.201 1.743l-.002-.001.002.001a2.895 2.895 0 013.183-4.51v-3.5a6.329 6.329 0 00-5.394 10.692 6.33 6.33 0 0010.857-4.424V8.687a8.182 8.182 0 004.773 1.526V6.79a4.831 4.831 0 01-1.003-.104z" fill="currentColor"/></svg>',
			'floating_icon' => 'instagram.svg', // Fallback as no specific small white svg for tiktok bar yet
		),
		'youtube'   => array(
			'label'         => 'YouTube',
			'icon'          => '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="youtube"><path d="M23,9.71a8.5,8.5,0,0,0-.91-4.13,2.92,2.92,0,0,0-1.72-1A78.36,78.36,0,0,0,12,4.27a78.45,78.45,0,0,0-8.34.3,2.87,2.87,0,0,0-1.46.74c-.9.83-1,2.25-1.1,3.45a48.29,48.29,0,0,0,0,6.48,9.55,9.55,0,0,0,.3,2,3.14,3.14,0,0,0,.71,1.36,2.86,2.86,0,0,0,1.49.78,45.18,45.18,0,0,0,6.5.33c3.5.05,6.57,0,10.2-.28a2.88,2.88,0,0,0,1.53-.78,2.49,2.49,0,0,0,.61-1,10.58,10.58,0,0,0,.52-3.4C23,13.69,23,10.31,23,9.71ZM9.74,14.85V8.66l5.92,3.11C14,12.69,11.81,13.73,9.74,14.85Z" fill="currentColor"/></svg>',
			'floating_icon' => 'youtube.svg',
		),
		'pinterest' => array(
			'label'         => 'Pinterest',
			'icon'          => '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 999.9 999.9" id="pinterest"><path d="M0 500c2.6-141.9 52.7-260.4 150.4-355.4S364.6 1.3 500 0c145.8 2.6 265.3 52.4 358.4 149.4 93.1 97 140.3 213.9 141.6 350.6-2.6 140.6-52.7 258.8-150.4 354.5-97.7 95.6-214.2 144.1-349.6 145.4-46.9 0-93.7-7.2-140.6-21.5 9.1-14.3 18.2-30.6 27.3-48.8 10.4-22.1 23.4-63.8 39.1-125 3.9-16.9 9.8-39.7 17.6-68.4 9.1 15.6 24.7 29.9 46.9 43 58.6 27.3 120.4 24.7 185.5-7.8 67.7-39.1 114.6-99.6 140.6-181.6 23.4-85.9 20.5-165.7-8.8-239.2C778.3 277 725.9 224 650.4 191.4c-95-27.3-187.5-24.4-277.3 8.8s-152.3 90.2-187.5 170.9C176.5 401 171 430.7 169 460c-2 29.3-1 57.9 2.9 85.9s13.7 53.1 29.3 75.2 36.5 39.1 62.5 50.8c6.5 2.6 11.7 2.6 15.6 0 5.2-2.6 10.4-13 15.6-31.2 5.2-18.2 7.2-30.6 5.9-37.1-1.3-2.6-3.9-7.2-7.8-13.7-27.3-44.3-36.5-90.8-27.3-139.6 9.1-48.8 29.3-90.2 60.5-124 48.2-43 104.5-66.4 168.9-70.3 64.4-3.9 119.5 13.7 165 52.7 24.7 28.6 40.7 63.1 47.8 103.5s7.2 79.1 0 116.2c-7.2 37.1-19.9 71.9-38.1 104.5-32.6 50.8-71 76.8-115.2 78.1-26-1.3-47.2-11.4-63.5-30.3s-21.2-40.7-14.6-65.4c2.6-14.3 10.4-42.3 23.4-84 13-41.7 20.2-72.9 21.5-93.7-3.9-49.5-26.7-74.9-68.4-76.2-32.6 3.9-56.6 18.6-72.3 43.9s-24.1 54.4-25.4 86.9c3.9 37.8 9.8 63.8 17.6 78.1-14.3 58.6-25.4 105.5-33.2 140.6-2.6 9.1-9.8 37.1-21.5 84s-18.2 82.7-19.5 107.4V957C206.3 914 133.3 851.9 80 770.5 26.7 689.1 0 598.9 0 500z" fill="currentColor"/></svg>',
			'floating_icon' => 'pinterest.svg',
		),
	);
}

/**
 * Get active social media links.
 */
function clinic_communications_get_active_social_links() {
	$platforms     = clinic_communications_get_social_platforms();
	$active_links = array();

	foreach ( $platforms as $id => $data ) {
		$url = get_theme_mod( "clinic_communications_{$id}_url" );
		if ( ! empty( $url ) ) {
			// Fetch custom uploaded icons
			$custom_icon         = get_theme_mod( "clinic_communications_{$id}_icon" );
			$custom_sidebar_icon = get_theme_mod( "clinic_communications_{$id}_sidebar_icon" );

			$active_links[ $id ] = array_merge( $data, array(
				'url'          => $url,
				'icon'         => ! empty( $custom_icon ) ? '<img src="' . esc_url( $custom_icon ) . '" alt="' . esc_attr( $data['label'] ) . '">' : $data['icon'],
				'sidebar_icon' => ! empty( $custom_sidebar_icon ) ? $custom_sidebar_icon : $data['floating_icon'],
				'is_custom'    => ! empty( $custom_icon ),
				'is_custom_sidebar' => ! empty( $custom_sidebar_icon ),
			) );
		}
	}

	return $active_links;
}



function clinic_communications_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'clinic_communications_social_section',
		array(
			'title'    => esc_html__( 'Social Media Links', 'clinic-communications' ),
			'priority' => 30,
		)
	);

	// Footer Section
	$wp_customize->add_section(
		'clinic_communications_footer_section',
		array(
			'title'    => esc_html__( 'Footer Settings', 'clinic-communications' ),
			'priority' => 31,
		)
	);

	// Acknowledgement Text 1
	$wp_customize->add_setting(
		'clinic_communications_ack_text_1',
		array(
			'default'           => 'Clinic Communications acknowledges and pays respect to the Gadigal,<br> Cammeraygal and Gweagal people on the lands in which we work.',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		'clinic_communications_ack_text_1',
		array(
			'label'   => esc_html__( 'Acknowledgement Text 1', 'clinic-communications' ),
			'section' => 'clinic_communications_footer_section',
			'type'    => 'textarea',
		)
	);

	// Acknowledgement Text 2
	$wp_customize->add_setting(
		'clinic_communications_ack_text_2',
		array(
			'default'           => 'Clinic Communications acknowledges we are working on stolen<br> lands and that sovereignty has not been ceded.',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		'clinic_communications_ack_text_2',
		array(
			'label'   => esc_html__( 'Acknowledgement Text 2', 'clinic-communications' ),
			'section' => 'clinic_communications_footer_section',
			'type'    => 'textarea',
		)
	);

	$platforms = clinic_communications_get_social_platforms();

	foreach ( $platforms as $id => $data ) {
		// URL Setting
		$wp_customize->add_setting(
			"clinic_communications_{$id}_url",
			array(
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control(
			"clinic_communications_{$id}_url",
			array(
				'label'   => esc_html__( "{$data['label']} URL", 'clinic-communications' ),
				'section' => 'clinic_communications_social_section',
				'type'    => 'url',
			)
		);

		// Main Icon Setting
		$wp_customize->add_setting(
			"clinic_communications_{$id}_icon",
			array(
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				"clinic_communications_{$id}_icon",
				array(
					'label'   => esc_html__( "{$data['label']} Main Icon", 'clinic-communications' ),
					'section' => 'clinic_communications_social_section',
				)
			)
		);

		// Sidebar/Floating Icon Setting
		$wp_customize->add_setting(
			"clinic_communications_{$id}_sidebar_icon",
			array(
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				"clinic_communications_{$id}_sidebar_icon",
				array(
					'label'   => esc_html__( "{$data['label']} Sidebar Icon", 'clinic-communications' ),
					'section' => 'clinic_communications_social_section',
				)
			)
		);
	}

	// Global CTA Section
	$wp_customize->add_section(
		'clinic_communications_global_cta_section',
		array(
			'title'    => esc_html__( 'Global CTA Settings', 'clinic-communications' ),
			'priority' => 32,
		)
	);

	// CTA Background Image
	$wp_customize->add_setting(
		'clinic_communications_global_cta_bg',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'clinic_communications_global_cta_bg',
			array(
				'label'   => esc_html__( 'CTA Background Image', 'clinic-communications' ),
				'section' => 'clinic_communications_global_cta_section',
			)
		)
	);

	// CTA Title
	$wp_customize->add_setting(
		'clinic_communications_global_cta_title',
		array(
			'default'           => 'You’re here for your <span class="font-style-italic">clients</span>.<br> We’re here for your <span class="font-style-italic">content</span>.',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		'clinic_communications_global_cta_title',
		array(
			'label'   => esc_html__( 'CTA Title', 'clinic-communications' ),
			'section' => 'clinic_communications_global_cta_section',
			'type'    => 'textarea',
		)
	);

	// CTA Subtitle
	$wp_customize->add_setting(
		'clinic_communications_global_cta_subtitle',
		array(
			'default'           => 'Let’s elevate your socials together. Book your complimentary 15-minute call.',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		'clinic_communications_global_cta_subtitle',
		array(
			'label'   => esc_html__( 'CTA Subtitle', 'clinic-communications' ),
			'section' => 'clinic_communications_global_cta_section',
			'type'    => 'textarea',
		)
	);

	// CTA Button Text
	$wp_customize->add_setting(
		'clinic_communications_global_cta_btn_text',
		array(
			'default'           => 'BOOK NOW',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'clinic_communications_global_cta_btn_text',
		array(
			'label'   => esc_html__( 'CTA Button Text', 'clinic-communications' ),
			'section' => 'clinic_communications_global_cta_section',
			'type'    => 'text',
		)
	);

	// CTA Button Link
	$wp_customize->add_setting(
		'clinic_communications_global_cta_btn_link',
		array(
			'default'           => '#',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'clinic_communications_global_cta_btn_link',
		array(
			'label'   => esc_html__( 'CTA Button Link', 'clinic-communications' ),
			'section' => 'clinic_communications_global_cta_section',
			'type'    => 'url',
		)
	);
}
add_action( 'customize_register', 'clinic_communications_customize_register' );

/**
 * Allow SVG upload.
 */
function clinic_communications_allow_svg( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';
	$mimes['svgz'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'clinic_communications_allow_svg' );

/**
 * Fix SVG display in media library.
 */
function clinic_communications_fix_svg() {
	echo '<style type="text/css">
		.attachment-266x266, .thumbnail img {
			width: 100% !important;
			height: auto !important;
		}
	</style>';
}
add_action( 'admin_head', 'clinic_communications_fix_svg' );

function allow_svg_uploads($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_uploads');


add_filter('wpcf7_form_class_attr', function($class) {
    return $class . ' form-fields';
});