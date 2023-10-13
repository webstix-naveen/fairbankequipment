<?php
/**
 * fb_theme's functions and definitions
 *
 * @package fb_theme
 * @since fb_theme 1.0
 */


if ( ! function_exists( 'fb_theme_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various
	 * WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme
	 * hook, which runs before the init hook. The init hook is too late
	 * for some features, such as indicating support post thumbnails.
	 */
	function fb_theme_setup() {

		/**
		 * Make theme available for translation.
		 * Translations can be placed in the /languages/ directory.
		 */
		load_theme_textdomain( 'fairbankequipment', get_template_directory() . '/languages' );

		/**
		 * Add default posts and comments RSS feed links to <head>.
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Enable support for post thumbnails and featured images.
		 */
		add_theme_support( 'post-thumbnails' );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 250,
                'width'       => 250,
                'flex-width'  => true,
                'flex-height' => true,
            )
        );

		/**
		 * Add support for two custom navigation menus.
		 */
		register_nav_menus( array(
			'menu-1'   => __( 'Main Menu', 'fairbankequipment' ),
			'menu-2' => __( 'Manufacturers Menu', 'fairbankequipment' ),
            'menu-3' => __( 'Parts Categories Menu', 'fairbankequipment' ),
            'menu-4' => __( 'Equipment Categories Menu', 'fairbankequipment' ),
            'menu-5' => __( 'Catalogs Menu', 'fairbankequipment' ),
            'menu-6' => __( 'Market Menu', 'fairbankequipment' ),
            'menu-7' => __( 'Locations Menu', 'fairbankequipment' ),
            'menu-8' => __( 'Footer Menu', 'fairbankequipment' ),
		) );

		/**
		 * Enable support for the following post formats:
		 * aside, gallery, quote, image, and video
		 */
		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'quote', 'image', 'video' ) );

        /**
         * Declaring WooCommerce Support
         */
        add_theme_support( 'woocommerce' );

        /**
         * Header clean up
         * Sets up theme defaults and remove wp generator,admin bar.
         */
        remove_action('wp_head', 'wp_generator');                // #1
        remove_action('wp_head', 'wlwmanifest_link');            // #2
        remove_action('wp_head', 'rsd_link');                    // #3
        remove_action('wp_head', 'wp_shortlink_wp_head');        // #4
        remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);    // #5
        add_filter('the_generator', '__return_false');            // #6
        add_filter('show_admin_bar','__return_false');            // #7
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
        remove_action( 'admin_print_styles', 'print_emoji_styles' );

	}
endif; // fb_theme_setup

add_action( 'after_setup_theme', 'fb_theme_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fairbankequipment_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar 1', 'fairbankequipment' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'fairbankequipment' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
    register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar 2', 'fairbankequipment' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'fairbankequipment' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'fairbankequipment_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fairbankequipment_scripts() {
    /**
     * Boostratp Css, Main style, Animate Css, Font Awesome
     */
    wp_enqueue_style('fb-style', FB_ASSETS_DIR.'/css/style.min.css', array(),FB_VERSION, false);
    wp_enqueue_style('fb-themestyle', get_stylesheet_uri(), array(), FB_VERSION, false);
    wp_style_add_data( 'fb-themestyle', 'rtl', 'replace' );
    /**
     * All Javascript files
     */
    wp_enqueue_script( 'fb-bootstrap', FB_ASSETS_DIR.'/js/bootstrap.bundle.min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'fb-custom', FB_ASSETS_DIR.'/js/custom.js', array( 'jquery' ), '', true );
    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'fairbankequipment_scripts' );
