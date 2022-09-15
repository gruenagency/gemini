<?php

/**
 * Template Name: Archive *
 */


get_header();

if (have_posts()) :
?>
    <section class="panel panel--standard header-space">
        <h1 class="u-textAlignCenter">All the Posts</h1>
        <div class="flex flex--column flex--align-middle">

            <?php while (have_posts()) : the_post(); ?>

                <div class="container">
                    <h2><?php echo get_the_title() ?></h2>
                    <div class="flex__col">
                        <em>Posted by <?php the_author_posts_link() ?> on <?php the_time('F j, Y') ?> in <?php echo get_the_category_list('news') ?></em>
                    </div>
                    <div class="flex__col cf-p">
                        <?php the_excerpt() ?>
                        <p><a href="<?php the_permalink() ?>">Continue Reading &raquo;</a></p>
                    </div>
                </div>

        <?php
            endwhile;
        endif;
        ?>

        <div class="flex__col">

            <?php echo paginate_links(); ?>

        </div>
        </div>
    </section>

    <?php get_footer(); ?>