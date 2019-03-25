<?php
/**
 * elegant functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package elegant
 */

if ( ! function_exists( 'elegant_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function elegant_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on elegant, use a find and replace
		 * to change 'elegant' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'elegant', get_template_directory() . '/languages' );

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
    register_nav_menus(array(
      'primary' => __('Primary Menu', 'elegant')
    ));

    add_filter( 'nav_menu_css_class', 'add_my_class_to_nav_menu', 10, 2 );
    function add_my_class_to_nav_menu( $classes, $item ){
      /* $classes содержит
      Array(
          [1] => menu-item
          [2] => menu-item-type-post_type
          [3] => menu-item-object-page
          [4] => menu-item-284
      )
      */
      $classes[] = 'header__nav-list';

      return $classes;
    }

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
		add_theme_support( 'custom-background', apply_filters( 'elegant_custom_background_args', array(
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
add_action( 'after_setup_theme', 'elegant_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function elegant_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'elegant_content_width', 640 );
}
add_action( 'after_setup_theme', 'elegant_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function elegant_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'elegant' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'elegant' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'elegant_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

define('EL_THEME_ROOT', get_template_directory_uri());
define('EL_CSS_DIR', EL_THEME_ROOT.'/layouts');
define('EL_JS_DIR', EL_THEME_ROOT.'/js');
define('EL_IMG_DIR', EL_THEME_ROOT.'/img');

function elegant_scripts() {
	wp_enqueue_style( 'elegant-style', get_stylesheet_uri() );
  wp_enqueue_style( 'basic', EL_CSS_DIR.'/basic.css');
  wp_enqueue_style( 'header', EL_CSS_DIR.'/header.css');
  wp_enqueue_script( 'navigation', EL_JS_DIR.'/navigation.js');
  if(is_home()) {
    wp_enqueue_style( 'header-home', EL_CSS_DIR.'/header-home.css');
    wp_enqueue_style( 'whowe', EL_CSS_DIR.'/whowe.css');
    wp_enqueue_style( 'whatwe', EL_CSS_DIR.'/whatwe.css');
    wp_enqueue_style( 'whowe2', EL_CSS_DIR.'/whowe2.css');
    wp_enqueue_style( 'lastpost', EL_CSS_DIR.'/lastpost.css');
    wp_enqueue_style( 'home-contact', EL_CSS_DIR.'/home-contact.css');
  }
  if(is_page('about')) {
    wp_enqueue_style( 'header-about', EL_CSS_DIR.'/header-about.css');
    wp_enqueue_style( 'about-text', EL_CSS_DIR.'/about-text.css');
    wp_enqueue_style( 'services', EL_CSS_DIR.'/services.css');
  }
  if(is_page('blog')) {
    wp_enqueue_style( 'header-blog', EL_CSS_DIR.'/header-blog.css');
    wp_enqueue_style( 'blog', EL_CSS_DIR.'/blog.css');
    wp_enqueue_style( 'sidebar', EL_CSS_DIR.'/sidebar.css');
  }
  if(is_page('blogexpanded')) {
    wp_enqueue_style( 'header-blogexpanded', EL_CSS_DIR.'/header-blogexpanded.css');
    wp_enqueue_style( 'blogexpanded', EL_CSS_DIR.'/blogexpanded.css');
    wp_enqueue_style( 'sidebar', EL_CSS_DIR.'/sidebar.css');
  }
  wp_enqueue_style( 'footer', EL_CSS_DIR.'/footer.css');
}
add_action( 'wp_enqueue_scripts', 'elegant_scripts' );

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


function create_post_type() {

  register_post_type( 'el_works',
    array(
      'labels' => array(
        'name' => __( 'Works' ),
        'singular_name' => __( 'Works' ),
      ),
      'public' => true,
      'menu_icon'     => 'dashicons-format-image',
      'has_archive' => true,
      'supports'           => array('title','thumbnail')
    )
  );

  register_post_type( 'el_team',
    array(
      'labels' => array(
        'name' => __( 'Team' ),
        'singular_name' => __( 'Team' ),
      ),
      'public' => true,
      'menu_icon'     => 'dashicons-groups',
      'has_archive' => true,
      'supports'           => array('title','thumbnail','editor', 'excerpt')
    )
  );
}
add_action( 'init', 'create_post_type' );
