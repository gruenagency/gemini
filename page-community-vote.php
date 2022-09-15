<?php

/**
 * Template Name: Community Vote
 */

get_header(); ?>

        <section class="panel panel--page <?php if (get_field('banner_text', 'options')) :echo 'announcemnt'; endif?>">
            <article class="container">
				<h1 class="u-textColorPrimary u-textAlignCenter"><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </article>
        </section>

<?php get_footer(); ?>