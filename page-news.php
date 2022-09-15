<?php
/**
 * Template Name: Blog Page
 */

get_header();
?>
<section class="panel panel--page panel--standard <?php if (get_field('banner_text', 'options')) :echo 'announcemnt'; endif?>">
    
    <div class="container">
        <?php echo do_shortcode('[wpseo_breadcrumb]'); ?>
        <?php echo do_shortcode ('[searchandfilter slug="news-search"]'); ?>
        <div class="results">
            <?php echo do_shortcode ('[searchandfilter slug="news-search" show="results"]'); ?>
        </div>
    </div>

</section>

<?php get_footer(); ?>