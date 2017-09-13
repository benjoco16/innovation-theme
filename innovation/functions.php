<?php
/**
 * innovation functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package innovation
 */

if ( ! function_exists( 'innovation_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function innovation_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on innovation, use a find and replace
		 * to change 'innovation' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'innovation', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'innovation' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'innovation_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'innovation_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function innovation_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'innovation_content_width', 640 );
}
add_action( 'after_setup_theme', 'innovation_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function innovation_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'innovation' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'innovation' ),
		'before_widget' => '<div id="%1$s" class="col-md-6">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'innovation' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'innovation' ),
		'before_widget' => '<div id="%1$s" class="col-md-6">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title" style="visibility:hidden;">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'innovation_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function innovation_scripts() {
	wp_enqueue_style( 'innovation-style', get_stylesheet_uri() );
	wp_enqueue_style( 'innovation-bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css', array(), '1.0', all );
	//wp_enqueue_style( 'innovation-bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css', array(), '1.0', all );
	wp_enqueue_style( 'innovation-flexslider-css', get_template_directory_uri() . '/css/flexslider.css', array(), '1.0', all );	
	wp_enqueue_style( 'innovation-custom-css', get_template_directory_uri() . '/css/custom.css', array(), '1.1', all );
	wp_enqueue_style( 'innovation-responsive-css', get_template_directory_uri() . '/css/responsive.css', array(), '1.0', all );

	wp_enqueue_script( 'innovation-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true );
	wp_enqueue_script( 'innovation-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '1.0', true );
	//wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js', array(), '1.0', true );
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array(), '1.0', true );
	wp_enqueue_script( 'csutom', get_template_directory_uri() . '/js/custom.js', array(), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'innovation_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function action_woocommerce_sidebar() { 
    // make action magic happen here...    
    $current_post_id = $post->ID; 
    $product_contact = get_field('products_text',  $current_post_id);  

    echo '<div class="product-quest">'.$product_contact.'</div>';
}; 
         
// add the action 
add_action( 'woocommerce_single_product_summary', 'action_woocommerce_sidebar', 50, 2 ); 

function woo_custom_cart_button_text() { 
        return __( 'Buy Now!', 'woocommerce' ); 
}
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );    // 2.1 + 