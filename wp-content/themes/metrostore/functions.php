<?php
/**
 * MetroStore functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MetroStore
 */

if ( ! function_exists( 'metrostore_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function metrostore_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on MetroStore, use a find and replace
	 * to change 'metrostore' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'metrostore', get_template_directory() . '/languages' );

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

	add_image_size('metrostore-cat-image', 270, 355, true);
	add_image_size('metrostore-blog-image', 375, 265, true);
	add_image_size('metrostore-banner-image', 1350, 520, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'metrostore' ),
	) );

	// Support WooCommerce WordPress Plugins
	add_theme_support( 'woocommerce' );

	// Set up the WordPress Gallery Lightbox
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	/**
	 * Editor style.
	*/
	add_editor_style( 'assets/css/editor-style.css' );

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
	add_theme_support( 'custom-background', apply_filters( 'metrostore_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/*
	 * Enable support for custom logo.
	*/
	add_theme_support( 'custom-logo', array(
		'height'      => 350,
		'width'       => 175,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( '.site-title', '.site-description' ),
	) );
}
endif;
add_action( 'after_setup_theme', 'metrostore_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function metrostore_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'metrostore_content_width', 640 );
}
add_action( 'after_setup_theme', 'metrostore_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function metrostore_widgets_init() {
	
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar Widget Area', 'metrostore' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'metrostore' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar Widget Area', 'metrostore' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'metrostore' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));


	if ( is_customize_preview() ) {
        $metrostore_description = sprintf( esc_html__( 'Displays widgets on home page main content area.%1$s Note : Please go to %2$s "Static Front Page"%3$s setting, Select "A static page" then "Front page" and "Posts page" to show added widgets', 'metrostore' ), '<br />','<b><a class="sparkle-customizer" data-section="static_front_page" style="cursor: pointer">','</a></b>' );
    }
    else{
        $metrostore_description = esc_html__( 'Displays widgets on Front/Home page. Note : First Create Page and Select "Page Attributes Template"( SpiderMag - FrontPage ) then Please go to Setting => Reading, Select "A static page" then "Front page" and add widgets to show on Home Page', 'metrostore' );
    }

	register_sidebar( array(
		'name'          => esc_html__( 'Metrostore HomePage Widget Area', 'metrostore' ),
		'id'            => 'metrostore_homepage',
		'description'   => $metrostore_description,
		'before_widget' => '',
		'after_widget'  => '',
	));
	

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area One', 'metrostore' ),
		'id'            => 'footer_one',
		'description'   => esc_html__( 'Add widgets here.', 'metrostore' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title links-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area Two', 'metrostore' ),
		'id'            => 'footer_two',
		'description'   => esc_html__( 'Add widgets here.', 'metrostore' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title links-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area Three', 'metrostore' ),
		'id'            => 'footer_three',
		'description'   => esc_html__( 'Add widgets here.', 'metrostore' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title links-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area Four', 'metrostore' ),
		'id'            => 'footer_four',
		'description'   => esc_html__( 'Add widgets here.', 'metrostore' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title links-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area Five', 'metrostore' ),
		'id'            => 'footer_five',
		'description'   => esc_html__( 'Add widgets here.', 'metrostore' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title links-title">',
		'after_title'   => '</h3>',
	));
}
add_action( 'widgets_init', 'metrostore_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
if ( ! function_exists( 'metrostore_scripts' ) ) {

	function metrostore_scripts() {

		$metrostore_theme = wp_get_theme();
		$theme_version = $metrostore_theme->get( 'Version' );

		/* Metro Store Google Font */
	    //wp_enqueue_style( 'metrostore-googleapis', '//fonts.googleapis.com/css?family=Lato:400,700,300');
    	$metrostore_font_args = array(
            'family' => 'Open+Sans+Condensed:300,700|Open+Sans:300,400,600,700,800|Karla:400,400italic,700,700italic|Dancing+Script:400,700|Source+Sans+Pro:200,200italic,300,300italic,400,400italic,600,600italic,700,700italic,900,900italic|Source+Code+Pro:400,500,600,700,300|Montserrat:400,500,600,700,800',
        );
        wp_enqueue_style('metrostore-google-fonts', add_query_arg( $metrostore_font_args, "//fonts.googleapis.com/css" ) );

	    /* Metro Store Bootstrap */
	    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/library/bootstrap/css/bootstrap.min.css', esc_attr( $theme_version ) );

	    /* Metro Store Font Awesome */
	    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/library/font-awesome/css/font-awesome.min.css', esc_attr( $theme_version ) );

	    /*Metro Store Flexslider CSS*/
	    wp_enqueue_style('jquery-flexslider', get_template_directory_uri() . '/assets/library/flexslider/css/flexslider.css', esc_attr( $theme_version ));

	    /* Metro Store Owl Carousel CSS */
	    wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/library/carouselowl/css/owl.carousel.css' );

	    wp_enqueue_style( 'owl-theme', get_template_directory_uri() . '/assets/library/carouselowl/css/owl.theme.css' );

	    /* Metro Store Main Style */
	    wp_enqueue_style( 'metrostore-style', get_stylesheet_uri() );

	   if ( has_header_image() ) {
	   	$custom_css = '.site-header{ background-image: url("' . esc_url( get_header_image() ) . '"); background-repeat: no-repeat; background-position: center center; background-size: cover; }';
	   	wp_add_inline_style( 'metrostore-style', $custom_css );
	   }
	   
	   /* Metro Store Jquery Section Start */
	    wp_enqueue_script( 'metrostore-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), esc_attr( $theme_version ), true );
	    wp_enqueue_script( 'metrostore-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), esc_attr( $theme_version ), true );

	    /* Metro Store html5 */
	    wp_enqueue_script('html5', get_template_directory_uri() . '/assets/library/html5shiv/html5shiv.min.js', array('jquery'), esc_attr( $theme_version ), false);
	    wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	    /* Metro Store Respond */
	    wp_enqueue_script('respond', get_template_directory_uri() . '/assets/library/respond/respond.min.js', array('jquery'), esc_attr( $theme_version ), false);
	    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

	    /*Metore Store Flexslider*/
 		wp_enqueue_script('jquery-flexslider', get_template_directory_uri() . '/assets/library/flexslider/js/jquery.flexslider-min.js', array('jquery'), esc_attr( $theme_version ), true);

	    /* Metore Store Bootstrap */
	    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/library/bootstrap/js/bootstrap.min.js', array('jquery'), esc_attr( $theme_version ), false);

	    /* Metore Store Carousel */
	    wp_enqueue_script('owl-carousel-min', get_template_directory_uri() . '/assets/library/carouselowl/js/owl.carousel.min.js', array(), esc_attr( $theme_version ), false);

	    /* Metore Store Responsive Mobile Menu */
	    wp_enqueue_script('mobile-menu', get_template_directory_uri() . '/assets/js/mobile-menu.js', array(), esc_attr( $theme_version ), false);

	    /* Metore Store Responsive Mobile Menu */
	    wp_enqueue_script('waypoints', get_template_directory_uri() . '/assets/library/waypoints/jquery.waypoints.min.js', array(), esc_attr( $theme_version ), false);
	   	
	   	/* Metore Store Full Background Video js */
	    wp_enqueue_script('youtubebackground', get_template_directory_uri() . '/assets/js/jquery.youtubebackground.js', array(), esc_attr( $theme_version ), false);

	  	/* Metrostore Sidebar Widget Ticker */
    	wp_enqueue_script('theia-sticky-sidebar', get_template_directory_uri() . '/assets/library/theia-sticky-sidebar/js/theia-sticky-sidebar.min.js', array('jquery'), esc_attr( $theme_version ), true);

	    /* Metore Store Theme Custom js */
	    wp_enqueue_script('metrostore-main', get_template_directory_uri() . '/assets/js/metrostore-main.js', array('jquery'), esc_attr( $theme_version ), false);

	    wp_localize_script( 'metrostore-main', 'metrostore_ajax_script', array( 'ajaxurl' => admin_url( 'admin-ajax.php') ) );

	    /* Metore Store Waypoints support js infographic */
	    wp_enqueue_script('infographic', get_template_directory_uri() . '/assets/js/infographic.js', array(), esc_attr( $theme_version ), false);


		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'metrostore_scripts' );

/**
 * Admin Enqueue scripts and styles.
**/
if ( ! function_exists( 'metrostore_admin_scripts' ) ) {

    function metrostore_admin_scripts($hook) {

    	if( 'widgets.php' != $hook )
        return;
        if (function_exists('wp_enqueue_media'))
          wp_enqueue_media();
          wp_enqueue_script('metrostore-media-uploader', get_template_directory_uri() . '/assets/js/metrostore-admin.js', array( 'jquery', 'customize-controls' ) );
          wp_localize_script('metrostore-media-uploader', 'metrostore_img_remove', array(
              'upload' => esc_html__('Upload', 'metrostore'),
              'remove' => esc_html__('Remove', 'metrostore')
          ));
        wp_enqueue_style( 'metrostore-style-admin', get_template_directory_uri() . '/assets/css/metrostore-admin.css');   
    }

}
add_action('admin_enqueue_scripts', 'metrostore_admin_scripts');

/**
 * Query WooCommerce activation
*/
if ( ! function_exists( 'metrostore_is_woocommerce_activated' ) ) {
  function metrostore_is_woocommerce_activated() {
    return class_exists( 'woocommerce' ) ? true : false;
  }
}

/**
 * Require init.
**/
require  trailingslashit( get_template_directory() ).'sparklethemes/init.php';