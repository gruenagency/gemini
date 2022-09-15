<?php
/*
Template Name: Search Page
*/

get_header();
?>
    <section class="panel panel--page panel--standard <?php if (get_field('banner_text', 'options')) :echo 'announcemnt'; endif?>">
        <h1 class="u-textAlignCenter">Search</h1>
        <div class="site-search">
            <?php echo do_shortcode ('[searchandfilter slug="site-search"]'); ?>
        </div>
        <div class="container flex flex--column flex--align-middle">
            <?php echo do_shortcode ('[searchandfilter slug="site-search" show="results"]'); ?>
        </div>
    </section>

<?php get_footer(); ?>