<?php
/**
 * Template Name: Contact Page
 */

get_header();

if (have_posts()) : while (have_posts()) : the_post();
        get_template_part('components/heroes/hero');
        get_template_part('components/component-page', 'header');
?>


        <section class="panel panel--standard u-marginBottom12gu">
            <div class="container flex flex--justify-between flex-lg--column-reverse u-paddingTop8gu u-md-paddingTop0gu">
                <div class="flex__col-4" style="margin: 1em 0 1em 0;">
                    
                    <?php get_template_part('components/component-sidebar', 'info'); ?>
                </div>
                <div class="flex__col-7">
                    <h2><?php the_title(); ?></h2>
                    <?php the_content(); ?>
                </div>
            </div>
        </section>

<?php endwhile; endif;

get_footer(); ?>