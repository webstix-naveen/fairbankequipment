<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package fairbankequipment
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function fairbankequipment_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'fairbankequipment_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function fairbankequipment_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'fairbankequipment_pingback_header' );

/**
 * Customize WordPress Login Page
 * http://example.com/wp-login.php
 * Change the Login Logo
 * To change the WordPress logo to your own, you will need to change the CSS styles associated with this theme.
 * Styling Your Login
 * You can style every HTML element on the WordPress login page with CSS
 * Change the Login Error Message
 * Set Remember Me To Checked
 * The Remember Me checkbox is unchecked by default, but if you have forgetful users who don’t check it, you can enable it automatically
 */
/**
 * WordPress Login page css
 */
if( ! function_exists('custom_login_page_design') ):
    /**
     * Add Custom own css file
     */
    function custom_login_page_design() {
        echo '<link rel="stylesheet" type="text/css" href="' . FB_ASSETS_DIR . '/css/login-style.css" />';
    }

endif;
add_action('login_head', 'custom_login_page_design');

/**
 * Change Login page logo 
 */
function custom_login_logo() {
    
    $custom_logo_id = get_theme_mod('custom_logo'); // Get the custom logo ID
    $logo_image = wp_get_attachment_image_src($custom_logo_id, 'full'); // Get the logo image URL and other information

    echo '<style type="text/css">'.
            '.login h1 a { background:url('.$logo_image[0].')  50% 50% no-repeat !important;background-color: #e4e4e5 !important; background-size: auto !important; height: 160px !important; width: 310px!important; display: block !important; opacity: 1;}'.
        '</style>';
}
add_action( 'login_head', 'custom_login_logo' );

/**
 * Change Default favions to admin login page and Dashboard and also add website frontend.
 */
if( ! function_exists('change_favicon') ):
    /**
     * Add Custom own favicon
     */
    function change_favicon() {
        echo '
        <!-- Fav Icon -->
        <link rel="icon" type="image/png" href="'.FB_ASSETS_DIR.'/images/favicon.png">
        <!-- Fav Icon -->';
    }

endif;
add_action('admin_head', 'change_favicon');
add_action('login_head', 'change_favicon');
add_action('wp_head', 'change_favicon');

/**
 *  Change Logo Link from wordpress
 */
if( !function_exists('custom_login_headerurl') ):
    /**
     *  Add own website link to logo wordpress
     */
    function custom_login_headerurl(){
        return site_url();
    }

endif;
add_filter('login_headerurl', 'custom_login_headerurl');

/**
 * Change Dashboard Logo Title
 */
if( !function_exists('custom_logo_url_title') ):
    /**
     * Change Our Website Title
     */
    function custom_logo_url_title() {
        return 'fairbankequipment';
    }

endif;
add_filter( 'login_headertitle', 'custom_logo_url_title' );

/**
 * Change the login Error Message 
 */
if( !function_exists('login_error_override') ):
    /**
     * Modified Error Message
     */
    function login_error_override() { 
        return 'Incorrect login details.';
    }

endif;
add_filter('login_errors', 'login_error_override');

/**
 * Auto check the "remember me" box
 */
if( !function_exists('login_checked_remember_me') ):
    /**
     * Check default "Remember Me"
     */
    function login_checked_remember_me() {
        add_filter( 'login_footer', 'rememberme_checked' );
    }
    function rememberme_checked() {
        echo "<script>document.getElementById('rememberme').checked = true;</script>";
    }

endif;
add_action( 'init', 'login_checked_remember_me' );

/**
 * Add additional class into wp nav li
 * https://gist.github.com/asufian97/55cd9deb6bc828ef85dbd626431a9212
 * https://developer.wordpress.org/reference/hooks/nav_menu_css_class/
 */
function wpdocs_nav_on_li_class( $classes, $item, $args ) {
	// check if the item is in the primary menu
    if ( 'primary' === $args->theme_location ) {
        //add class to ul li
        $classes[] = "navItem";
        // add active class to current menu item
        if (in_array('current-menu-item', $classes) ){
            $classes[] = 'active';
        }
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'wpdocs_nav_on_li_class', 10, 3 );

/**
 * adds a class attribute to all <a> tags in a particular menu location (‘primary’).
 */
function add_specific_menu_location_atts( $atts, $item, $args ) {
    // check if the item is in the primary menu
    if( $args->theme_location == 'primary' ) {
      // add the desired attributes:
      $atts['class'] = 'navLink';
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_specific_menu_location_atts', 10, 3 );
