<?php
/**
 * Seven Construction functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Seven_Construction
 */

if ( ! defined( 'SEVEN_CONSTRUCTION_VERSION' ) ) {
	/*
	 * Set the theme’s version number.
	 *
	 * This is used primarily for cache busting. If you use `npm run bundle`
	 * to create your production build, the value below will be replaced in the
	 * generated zip file with a timestamp, converted to base 36.
	 */
	define( 'SEVEN_CONSTRUCTION_VERSION', '0.1.0' );
}

if ( ! defined( 'SEVEN_CONSTRUCTION_TYPOGRAPHY_CLASSES' ) ) {
	/*
	 * Set Tailwind Typography classes for the front end, block editor and
	 * classic editor using the constant below.
	 *
	 * For the front end, these classes are added by the `seven_construction_content_class`
	 * function. You will see that function used everywhere an `entry-content`
	 * or `page-content` class has been added to a wrapper element.
	 *
	 * For the block editor, these classes are converted to a JavaScript array
	 * and then used by the `./javascript/block-editor.js` file, which adds
	 * them to the appropriate elements in the block editor (and adds them
	 * again when they’re removed.)
	 *
	 * For the classic editor (and anything using TinyMCE, like Advanced Custom
	 * Fields), these classes are added to TinyMCE’s body class when it
	 * initializes.
	 */
	define(
		'SEVEN_CONSTRUCTION_TYPOGRAPHY_CLASSES',
		'prose prose-neutral max-w-none prose-a:text-primary'
	);
}

if ( ! function_exists( 'seven_construction_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function seven_construction_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Seven Construction, use a find and replace
		 * to change 'seven-construction' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'seven-construction', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __( 'Primary', 'seven-construction' ),
				'menu-2' => __( 'Footer Menu', 'seven-construction' ),
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

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );
		add_editor_style( 'style-editor-extra.css' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Remove support for block templates.
		remove_theme_support( 'block-templates' );
	}
endif;
add_action( 'after_setup_theme', 'seven_construction_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function seven_construction_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Footer', 'seven-construction' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'seven-construction' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'seven_construction_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function seven_construction_scripts() {
	if (is_front_page(  )){
		wp_enqueue_style( 'glide-css', 'https://cdn.jsdelivr.net/npm/glidejs@2.1.0/dist/css/glide.core.min.css', array(), SEVEN_CONSTRUCTION_VERSION );
		wp_enqueue_script( 'glide-js', 'https://cdn.jsdelivr.net/npm/@glidejs/glide', array(), SEVEN_CONSTRUCTION_VERSION, true );
		wp_enqueue_script( 'vimeo-api', 'https://player.vimeo.com/api/player.js', array(), true );
	}

	wp_enqueue_style( 'seven-construction-style', get_stylesheet_uri(), array(), SEVEN_CONSTRUCTION_VERSION );
	wp_enqueue_script( 'seven-construction-script', get_template_directory_uri() . '/js/script.min.js', array(), SEVEN_CONSTRUCTION_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'seven_construction_scripts' );

/**
 * Enqueue the block editor script.
 */
function seven_construction_enqueue_block_editor_script() {
	if ( is_admin() ) {
		wp_enqueue_script(
			'seven-construction-editor',
			get_template_directory_uri() . '/js/block-editor.min.js',
			array(
				'wp-blocks',
				'wp-edit-post',
			),
			SEVEN_CONSTRUCTION_VERSION,
			true
		);
		wp_add_inline_script( 'seven-construction-editor', "tailwindTypographyClasses = '" . esc_attr( SEVEN_CONSTRUCTION_TYPOGRAPHY_CLASSES ) . "'.split(' ');", 'before' );
	}
}
add_action( 'enqueue_block_assets', 'seven_construction_enqueue_block_editor_script' );

/**
 * Add the Tailwind Typography classes to TinyMCE.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function seven_construction_tinymce_add_class( $settings ) {
	$settings['body_class'] = SEVEN_CONSTRUCTION_TYPOGRAPHY_CLASSES;
	return $settings;
}
add_filter( 'tiny_mce_before_init', 'seven_construction_tinymce_add_class' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

require get_template_directory() . '/inc/customizer.php';

require_once( get_template_directory() . '/plugins/navi/plugin.php' );

require_once( get_template_directory() . '/inc/blocks.php' );

require_once( get_template_directory() . '/inc/utilities.php' );

function process_post() {
	wp_register_script( 'accordion-script', get_template_directory() . '/blocks/accordion/accordion-script.js', array(), '1.0.0', true );
}
add_action( 'init', 'process_post' );
