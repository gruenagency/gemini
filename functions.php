<?php

function my_add_theme_scripts() {
	// deregister default scripts
	wp_deregister_script('jquery');
	wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js', array(), '2.1.3');
	wp_enqueue_script('jquery');

	// add jquery ui
	wp_enqueue_script('jqueryui', '//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js', false, '1.11.4');

	// add modernizer
	wp_enqueue_script('modernizr', get_template_directory_uri() . '/lib/modernizr/modernizr.min.js', false, '2.7.0');

	// fontawesome
	wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/d8972ad702.js');

	// Typekit fonts
	wp_enqueue_style('franklinGothic', 'https://use.typekit.net/iie5ijc.css');

	// wp_enqueue_style( 'googlefontlibre', 'https://fonts.googleapis.com/css?family=Libre+Franklin:400,600,700');

	// compiled styles
	wp_enqueue_style('style', get_template_directory_uri() . '/dist/css/style.css');

	// scripts
	wp_register_script('compiled-scripts', get_template_directory_uri() . '/dist/js/compiled.js', array('jquery'), '1.0.0', true);

	wp_enqueue_script('compiled-scripts');
}
add_action('wp_enqueue_scripts', 'my_add_theme_scripts');



if (!function_exists('themename_setup')) :
	/**
	 * ThemeName Fixit setup.
	 *
	 * Set up theme defaults and registers support for various WordPress features.
	 *
	 * @since ThemeName Fixit 1.0
	 */
	function themename_setup() {
		add_editor_style('editor-style.css');

		register_nav_menus(
			array(
				'global' => __('Main Menu'),
				'auxiliary' => __('Auxiliary Menu'),
				'footer' => __('Footer Menu'),
				'mobile' => __('Mobile Menu'),
			)
		);

		add_theme_support('html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		));

		add_theme_support('post-formats', array(
			'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
		));

		add_theme_support('post-thumbnails');

		add_filter('use_default_gallery_style', '__return_false');
	}
endif; 
add_action('after_setup_theme', 'themename_setup');


/*************************************************************/
/*  ADD THE SITE TITLE 			 								*/
/***********************************************************/
/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since ThemeName Fixit 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function themename_wp_title($title, $sep)
{
	global $paged, $page;

	if (is_feed()) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo('name', 'display');

	// Add the site description for the home/front page.
	$site_description = get_bloginfo('description', 'display');
	if ($site_description && (is_home() || is_front_page())) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if (($paged >= 2 || $page >= 2) && !is_404()) {
		$title = "$title $sep " . sprintf(__('Page %s', 'themename'), max($paged, $page));
	}
	return $title;
}
add_filter('wp_title', 'themename_wp_title', 10, 2);

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');

// Filter except length to 35 words.
function tn_custom_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'tn_custom_excerpt_length', 999 );

require_once('functions-library.php');

require_once( 'lib/admin.php' );

// add_filter('show_admin_bar', '__return_false');