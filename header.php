<?php

/**
 * The Header for our theme
 *
 * @package WordPress
 * @subpackage THEME_NAME
 * @since THEME_NAME 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8">
<![endif]-->
<!--[if gt IE 8]>
<html class="ie-modern">
<![endif]-->
<!--[if !IE]><!-->
<html class="not-ie" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=EDGE" />
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title('|', true, 'right'); ?></title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="format-detection" content="telephone=no">
	<link rel="icon" type="image/png" href="<?php bloginfo('url'); ?>/wp-content/themes/wsi/lib/favicons/favicon.ico" />
	<link rel="apple-touch-icon" href="<?php bloginfo('url'); ?>/wp-content/themes/wsi/lib/favicons/apple-touch-icon.png" />
	<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
	<?php if (is_front_page() || is_archive()) : ?>
		<meta property="og:title" content="<?php bloginfo('name'); ?>" />
	<?php else : ?>
		<meta property="og:title" content="<?php echo single_post_title(); ?>" />
	<?php endif; ?>
	<?php if (is_singular()) : ?>
		<meta property="og:type" content="article" />
		<meta property="og:url" content="<?php the_permalink(); ?>" />
	<?php endif; ?>
	<?php wp_head(); ?>
	
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
	<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
				

	
	<header id="header">
	
	<?php get_template_part('menus/utility'); ?>
	
	<?php if (get_field('banner_text', 'options')) :
		get_template_part('menus/banner');
	endif; ?>
	
	<?php get_template_part('menus/desktop', 'menu'); ?>
	<?php get_template_part('menus/mobile', 'menu'); ?>

	<?php if ( is_front_page() ) :
    	get_template_part('components/component', 'pulse');
	endif; ?>
	
	</header>

</head>

<body <?php body_class(); ?> >
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MRVND9G"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->