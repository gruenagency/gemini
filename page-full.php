<?php

/**
 * Template Name: Full-Width Page
 */

get_header();

get_template_part('components/component-page', 'header');
?>

    <section class="panel panel--standard">
        <div class="container">
        <?php $bread = get_field('show_hide_breadcrumbs');
        if ($bread == 'show') : ?>
            <div id="breadcrumbs">
                <?php echo do_shortcode('[wpseo_breadcrumb]'); ?>
            </div>
        <?php endif; ?>
            <article>
                <h1 class="u-textColorPrimary"><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </article>
        </div>
    </section>

<?php get_footer(); ?>