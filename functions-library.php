<?php

/*************************************************************/
/*  CUSTOM POST TYPES 										 */
/*************************************************************/

// // make parent nav item highlighted
// add_action('nav_menu_css_class', 'add_current_nav_class', 10, 2 );
// function add_current_nav_class($classes, $item) {
// 	// Getting the current post details
// 	global $post;
// 	// Getting the post type of the current post
// 	$current_post_type = get_post_type_object(get_post_type($post->ID));
// 	$current_post_type_slug = $current_post_type->rewrite['slug'];
// 	// Getting the URL of the menu item
// 	$menu_slug = strtolower(trim($item->url));
// 	// If the menu item URL contains the current post types slug add the current-menu-item class
// 	if (strpos($menu_slug,$current_post_type_slug) !== false) {
// 		$classes[] = 'current-menu-item';
// 	}
// 	// Return the corrected set of classes to be added to the menu item
// 	return $classes;
// }


/*************************************************************/
/*  ADVANCED CUSTOM FIELDS 					 				 */
/*************************************************************/

// add options page
if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' 	=> 'Site Options',
		'menu_title'	=> 'Site Options',
		'menu_slug' 	=> 'global-options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	acf_add_options_page(array(
		'page_title' 	=> 'Menu',
		'menu_title'	=> 'Menu',
		'menu_slug' 	=> 'Menu',
		'icon_url' => 'dashicons-menu'
	));
	acf_add_options_page(array(
		'page_title' 	=> 'Footer',
		'menu_title'	=> 'Footer',
		'menu_slug' 	=> 'footer',
		'icon_url' => 'dashicons-editor-kitchensink'
	));

}
/**
 * Add quick-collapse feature to ACF Flexible Content fields
 */
add_action('acf/input/admin_head', function () { ?>
	<script type="text/javascript">
		(function($) {
			$(document).ready(function() {
				var collapseButtonClass = 'collapse-all';

				// Add a clickable link to the label line of flexible content fields
				$('.acf-field-flexible-content > .acf-label')
					.append('<a class="' + collapseButtonClass + '" style="position: absolute; top: 0; right: 0; cursor: pointer;">Collapse All</a>');

				// Simulate a click on each flexible content item's "collapse" button when clicking the new link
				$('.' + collapseButtonClass).on('click', function() {
					$('.acf-flexible-content .layout:not(.-collapsed) .acf-fc-layout-controls .-collapse').click();
				});
			});
		})(jQuery);
	</script><?php
			});


			/*************************************************************/
			/*  EXCERPTS 												 */
			/*************************************************************/

			// change the excerpt "more" tag
			function new_excerpt_more($more)
			{
				global $post;
				return '&hellip;';
			}
			add_filter('excerpt_more', 'new_excerpt_more');

			// CUSTOM FIELD EXCERPT
			function custom_field_excerpt($fieldName)
			{
				global $post;
				$text = get_field($fieldName);
				if ('' != $text) {
					$text = strip_shortcodes($text);
					$text = apply_filters('the_content', $text);
					$text = str_replace(']]>', ']]>', $text);
					$excerpt_length = 30; // set the number of words here
					$excerpt_more = '&hellip;';
					$text = wp_trim_words($text, $excerpt_length, $excerpt_more);
				}
				$text = apply_filters('the_excerpt', $text);
				echo $text;
			}

			// create a shorter/longer excerpt
			function get_my_excerpt()
			{
				$text = get_the_content();
				$text = strip_shortcodes($text);
				$text = apply_filters('the_content', $text);
				$text = strip_tags($text);
				$excerpt_length = 25; // set the number of words here
				$excerpt_more = '&hellip;';
				$text = wp_trim_words($text, $excerpt_length, $excerpt_more);
				return $text;
			}

			function excerpt($limit)
			{
				$excerpt = explode(' ', get_the_excerpt(), $limit);
				if (count($excerpt) >= $limit) {
					array_pop($excerpt);
					$excerpt = implode(" ", $excerpt) . '...';
				} else {
					$excerpt = implode(" ", $excerpt);
				}
				$excerpt = preg_replace('`[[^]]*]`', '', $excerpt);
				return $excerpt;
			}

			/*************************************************************/
			/*  LOG TO CONSOLE 								 */
			/*************************************************************/

			function console($content)
			{
				echo '<script>console.log("' . $content . '")</script>';
			}

			/*************************************************************/
			/*  GET THE PAGE ID BY SLUG 											 */
			/*************************************************************/

			function get_id_by_slug($page_slug)
			{
				$page = get_page_by_path($page_slug);
				if ($page) {
					return $page->ID;
				} else {
					return null;
				}
			}

			/*************************************************************/
			/*  SHOW SUBPAGES AND SIBLINGS 											 */
			/*************************************************************/


			function themename_list_child_pages()
			{

				global $post;
				if (is_page() && $post->post_parent) :
					$childpages = wp_list_pages('sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0');
				else :
					$childpages = wp_list_pages('sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0');
				endif;

				if ($childpages) {
					$string = '<ul class="page-menu__list">' . $childpages . '</ul>';
				}

				return $string;
			}

			/************************************************************/
			/* Add A Quote Icon to the Blockquote in the Content Area */
			/************************************************************/

			function add_quotes_to_quote($content)
			{
				$content = str_replace('</blockquote>', '<span class="blockquote--quote">&ldquo;<sub>&rdquo;</sub></span></blockquote>', $content);
				return $content;
			}
			add_filter('the_content', 'add_quotes_to_quote');

			/*************************************************************/
			/*  SHORTCODES 											 */
			/*************************************************************/
			function themename_button($atts, $content)
			{
				$a = shortcode_atts(array(
					'size' => 'button'
				), $atts);
				return '<button>' . $content . '</button>';
			}
			add_shortcode('button', 'themename_button');


			// Shortcode to Display Menus


			add_shortcode('menu', 'menu_function');

			function menu_function($atts, $content = null)
			{
				extract(
					shortcode_atts(
						array('name' => null,),
						$atts
					)
				);
				return wp_nav_menu(
					array(
						'menu' => $name,
						'echo' => false,
						'menu_class' => 'menu-inline'
					)
				);
			}


			function years_in_business($atts, $content = null)
			{
				// $cur = date('Y');
				// $exp = $cur - 1973;
				// return '<span class="years-experience">' . $exp . '</span>';
				$date1 = new DateTime("1973-10-01");
				$date2 = new DateTime("now");
				$interval = $date1->diff($date2);
				return '<span class="years-experience">' . $interval->y . '</span>';
			}

			add_shortcode('years_experience', 'years_in_business');

			/*************************************************************/
			/*  RANDOM NUMBER 											 */
			/*************************************************************/

			function get_random_digits($digits)
			{
				// * generate a random digit, good for creating panel instance IDs
				$random = str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);
				return $random;
			}


			/************************************************************/
			/* Generate Post Chips */
			/************************************************************/

			// * for current post
			function themename_get_the_chips($taxonomy = null)
			{
				global $post;

				if ($taxonomy == null) {
					// get the default categories
					$chips = get_the_category();
				} else {
					// get the custom taxonomy
					$chips = get_the_terms($post->ID, array($taxonomy));
				}


				if ($chips) {
					foreach ($chips as $chip) {
						$chip_link = get_term_link($chip);
						$return .= '<a class="button button--chip" href="' . $chip_link . '">' . $chip->name . '</a>';
					}
				}

				return $return;
			}

			function themename_the_chips($taxonomy = false)
			{
				$return = themename_get_the_chips($taxonomy);
				echo $return;
			}

			// * all the chips

			function themename_get_chips($taxonomy = null)
			{
				global $post;

				// get the category object for the current category
				$thisCat = get_category(get_query_var('cat'));

				if ($taxonomy == null) {
					// get the default categories
					$taxonomy = 'categories';
					$chips = get_categories();
				} else {
					// get the custom taxonomy
					$chips = get_terms(array('taxonomy' => $taxonomy, 'hide_empty' => true));
				}

				if ($chips) {
					foreach ($chips as $chip) {

						$chip_link = get_term_link($chip);

						// * see if this is the current category
						$active = $thisCat->term_id == $chip->term_id ? 'true' : 'false';

						$return .= '<a class="button button--chip" href="' . $chip_link . '">' . $chip->name . '</a>';
					}
				}

				return $return;
			}

			function themename_chips($taxonomy = false)
			{
				$return = themename_get_chips($taxonomy);
				echo $return;
			}

			/*************************************************************/
			/*  SUPERSCRIPT AND SUBSCRIPT 											 */
			/*************************************************************/

			function themename_mce_buttons_2($buttons)
			{
				/**
				 * Add in a core button that's disabled by default
				 */
				$buttons[] = 'superscript';
				$buttons[] = 'subscript';

				return $buttons;
			}
			add_filter('mce_buttons_2', 'themename_mce_buttons_2');

			/*************************************************************/
			/*  ADD CPT TO CATEGORY AND TAG ARCHIVES 								 */
			/*************************************************************/

			function themename_add_custom_types_to_archives($query)
			{
				if (
					!is_admin() && is_category() && $query->is_main_query() ||
					!is_admin() && is_tag() && $query->is_main_query()
				) {
					$query->set(
						'post_type',
						array(
							// * insert custom post types here
						)
					);
				}
			}
			add_filter('pre_get_posts', 'themename_add_custom_types_to_archives');

			function themename_archive_title($title)
			{
				if (is_category()) {
					$title = single_cat_title('', false);
				} elseif (is_tag()) {
					$title = single_tag_title('', false);
				} elseif (is_author()) {
					$title = get_the_author();
				} elseif (is_post_type_archive()) {
					$title = post_type_archive_title('', false);
				} elseif (is_tax()) {
					$title = single_term_title('', false);
				}

				return $title;
			}

			add_filter('get_the_archive_title', 'themename_archive_title');

			/*************************************************************/
			/*  PAGINATION 												 */
			/*************************************************************/


			function build_pagination($paged = NULL, $max = NULL, $prev_url = NULL, $next_url = NULL)
			{

				$max = isset($max) ? $max : 1;

				// for jumpto nav
				$big = 99999999; // need an unlikely integer
				$base = str_replace($big, '%#%', esc_url(get_pagenum_link($big)));

				// define icons

				$output = '<nav class="container flex flex--align-middle flex--justify-center pagination">' . "\n";

				$link_classes = 'pagination__link button button--tertiary';
				$prev_link_classes = $link_classes . ' button--back button--tertiary--back';

				if ($paged && $paged != 1 && $prev_url) {
					$output .= '<a href="' . $prev_url . '" class="' . $prev_link_classes . '">Previous Page</a>';
				} else {
					$prev_link_classes .= ' disabled';
					$output .= '<span class="' . $prev_link_classes . '">Previous Page</span>';
				}

				$output .= '<span class="p--large u-inlineBlock u-marginHoriz8gu">Page ' . $paged . ' of ' . $max . '</span>';

				if ($next_url) {
					$output .= '<a href="' . $next_url . '" class="' . $link_classes . '">Next Page</a>';
				} else {
					$output .= '<span class="' . $link_classes . ' disabled">Next Page</span>';
				}

				$output .= '</nav>' . "\n";

				return $output;
			}

			function get_the_pagination(&$new_query)
			{
				global $wp_query;

				$current_query = is_object($new_query) ? $new_query : $wp_query;

				$paged = get_query_var('paged') ? get_query_var('paged') : 1;
				$max = $current_query->max_num_pages;
				$prev_url = previous_posts(false);
				$next_url = next_posts($max, false);

				$output = build_pagination($paged, $max, $prev_url, $next_url);

				// $output .= '<br>$paged: '. $paged;
				return $output;
			}

			function the_pagination(&$new_query = false)
			{
				$return = get_the_pagination($new_query);

				echo $return;
			}

			// remove empty space where admin bar is when not logged in

			function clear_admin_space()
			{
				if (current_user_can('administrator')) {
					add_filter('body_class', 'add_body_classes');
					function add_body_classes($classes)
					{
						$classes[] = 'adminSpace';
						return $classes;
					};
				}
			}

			// clear_admin_space();



			function applewood_2020_widgets_init()
			{

				register_sidebar(array(
					'name'          => 'About Page Widget Area',
					'id'            => 'custom-page-widget',
					'before_widget' => '<aside class="chw-widget">',
					'after_widget'  => '</aside>',
					'before_title'  => '<h3 class="chw-title">',
					'after_title'   => '</h3>',
				));

				register_sidebar(array(
					'name'		   	=> 'Blog Sidebar',
					'id'           	=> 'categories-widget',
					'before_widget' => '<div class="cat-widget">',
					'after_widget'  => '</div>',
					'before_title'  => '<h3 class="cat-title">',
					'after_title'   => '</h3>',
				));
			}
			add_action('widgets_init', 'applewood_2020_widgets_init');
