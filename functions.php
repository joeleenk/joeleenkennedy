<?php
/**
 * Joeleen Kennedy functions and definitions
 *
 * @package Joeleen Kennedy
 * @since Joeleen Kennedy 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Joeleen Kennedy 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'joeleenkennedy_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since Joeleen Kennedy 1.0
 */
function joeleenkennedy_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/tweaks.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 */
	load_theme_textdomain( 'joeleenkennedy', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'joeleenkennedy' ),
	) );

	/**
	 * Add support for the Aside Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside','gallery' ) );
}
endif; // joeleenkennedy_setup
add_action( 'after_setup_theme', 'joeleenkennedy_setup' );


/**
 * Implement the Custom Widgets
 */
require( get_template_directory() . '/inc/custom-widgets.php' );


/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since Joeleen Kennedy 1.0
 */
function joeleenkennedy_widgets_init() {

	register_widget( 'jk_recent_posts' );
	register_widget( 'jk_portfolio' );

	register_sidebar( array(
		'name' => __( 'Sidebar', 'joeleenkennedy' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}
add_action( 'widgets_init', 'joeleenkennedy_widgets_init' );


/**
 * Enqueue scripts and styles
 */
function joeleenkennedy_scripts() {
	global $post;

	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_script( 'fittext', get_template_directory_uri() . '/js/jquery.fittext.js', array( 'jquery' ), 'false', true );

	wp_enqueue_script( 'framework', get_template_directory_uri() . '/js/framework.js', array( 'jquery' ), 'false', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image( $post->ID ) ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'joeleenkennedy_scripts' );


// Add custom post type for portfolio
add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'portfolio',
		array(
			'labels' => array(
				'name' => __( 'Portfolio' ),
				'singular_name' => __( 'Portfolio' )
			),
		'public' => true,
		'menu_position' => 5,
		'supports' => array('title','editor','thumbnail','excerpt','custom-fields','revisions','post-formats'),
		'taxonomies' => array('category','post_tag'),
		'has_archive' => true
		)
	);
}

function custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more($more) {
       global $post;
	return '... <a href="'. get_permalink($post->ID) . '" class="more">read more</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');