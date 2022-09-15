<?php

get_header();

?>
<section class="panel panel--page panel--standard">
    <div class="flex flex-lg--column-reverse u-paddingTop8gu">
        <div class="flex__col-4">
            <div class="container u-marginBottom12gu">

                <div id="breadcrumbs">
                    <?php echo do_shortcode('[wpseo_breadcrumb]'); ?>
                </div>

               

                <?php echo do_shortcode('[gravityform id=1 name=ContactUs title=true description=true]'); ?>

            </div>
        </div>
        <div class="flex__col">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <div class="flex flex-lg--justify-center u-paddingBottom8gu post">
                        <div class="flex flex__col-3 flex__col-sm-10">
                            <?php $img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
                            <img src="<?php echo $img[0]; ?>" />
                        </div>
                        <div class="flex__col-6 flex__col-sm-10 u-sm-marginTop2gu u-marginLeft4gu">
                            <a href="<?php the_permalink() ?>">
                                <h3 class="u-marginBottom4gu u-textColorSecondary archive-post-title"><?php echo get_the_title() ?></h3>
                            </a>
                            <em class="u-textSizePlus1 u-textColorNeutral"><?php the_time('F j, Y') ?></em>
                        </div>
                        <div class="flex__col-10 u-marginTop4gu">
                            <div class="cf-p">
                                <?php the_excerpt() ?>
                                <p><a href="<?php the_permalink() ?>">Continue Reading &raquo;</a></p>
                            </div>
                        </div>
                    </div>

            <?php
                endwhile;
            endif;
            echo paginate_links(); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>