<!-- News and Tips Section -->

<?php

if (have_rows('news_block')) :
    while (have_rows('news_block')) : the_row();
        $header = get_sub_field('news_header');
        $cta = get_sub_field('news_button');
        $args = (array('posts_per_page' => '5',));
        $post_query = new WP_Query($args);
        if ($post_query->have_posts()) :
            $i = 0;

?>
        <div class="u-textAlignCenter u-paddingBottom8gu">
            <h3 class="u-textAlignCenter u-textColorSecondary u-padding0gu u-lg-padding6gu u-textSizePlus4 u-textWeightNormal">
                <?php echo $header ?>
            </h3>
            <a class="button button--secondary " href="/news"><?php echo $cta ?></a>
        </div>
        
        <div class="container u-marginTop8gu grid">
            <?php
            while ($post_query->have_posts()) : $post_query->the_post();
                $img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                if ($i == 0) : ?>

                    <!-- This is the featured post -->

                    <div class="grid--dbl card__post--featured flex flex--align-bottom panel__overlay--primary-fade z1 panel--bg-image" <?php $img ? print 'style="--background-image: url(' . $img[0] . ');"' : ''; ?>>
                        <a href="<?php the_permalink() ?>">
                            <div class="container flex">
                                <h4 class="u-textColorWhite u-textSizePlus3 z1"><?php echo get_the_title(); ?></h4>
                            </div>
                        </a>
                    </div>

                <?php else : ?>

                <!-- these are the gridded posts -->

                <div class="card__post flex flex--align-bottom panel__overlay--primary-fade z1 panel--bg-image" <?php $img ? print 'style="--background-image: url(' . $img[0] . ');"' : ''; ?>>
                    <a href="<?php the_permalink() ?>">
                        <div class=" container flex flex--align-bottom">
                            <h4 class="z1 u-textColorWhite"><?php echo get_the_title(); ?></h4>
                        </div>
                    </a>
                </div>
            <?php endif; $i++; wp_reset_query();
                endwhile;
            endif;
        endwhile;
    endif; ?>
</div>