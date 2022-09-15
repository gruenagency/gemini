<?php
/**
 * Template Name: Thank You Pages
 */

get_header();
?>
<?php
$image = get_field('header_background');
$truck = get_field('truck', 'options');
$page_title = get_field('page_header') ? get_field('page_header') : 'Repair Services for the Homeowner';
?>

<section class="panel panel--page panel__overlay--dark <?php if (get_field('banner_text', 'options')) :echo 'announcemnt'; endif?> panel--bg-image" <?php $image ? print 'style="--background-image: url(' . $image . ');"' : ''; ?>>
    <div class="container flex__col-sm-10 flex__col">
        <h2 class="u-margin0gu u-textColorPrimary u-textUppercase u-textStyleItalic ">
            <?php if(get_field('supertext')): echo the_field('supertext'); else: echo ''; endif;?>
        </h2>
        <h1 class="page-title u-md-marginLeft0gu u-marginLeft8gu u-marginBottom0gu u-textColorWhite">Thank You</h1>
    </div>
</section>
 <section class="panel panel--standard">
	 <div class="container">
		 <?php the_content(); ?>
	 </div>
</section>

<?php get_footer(); ?>