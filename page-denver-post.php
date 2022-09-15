<?php

/**
 * Template Name: Denver Post
 */

get_header();


if (have_posts()) : while (have_posts()) : the_post();
        get_template_part('components/heroes/hero');
        get_template_part('components/component-page', 'header');
?>


        <section class="panel panel--standard">
            <div class="container flex flex-lg--column-reverse u-paddingTop8gu">
                <div class="flex__col-3">
                    <div class="flex u-marginBottom12gu">

                        <div id="breadcrumbs">
                            <?php echo do_shortcode('[wpseo_breadcrumb]'); ?>
                        </div>

                        <div class="u-marginTop8gu flex__col-10">

                            <?php get_template_part('components/component-sidebar', 'info'); ?>

                        </div>

                    </div>
                </div>
                <div class="container flex__col-8">
                <div class="flex flex--justify-center">
                        <figure class="flex__col-7">
                        <?php $denver_coupon = get_field('denver_coupon');?>
                            <!-- <img src="https://applewoodfixit.local/wp-content/uploads/2021/03/Impact-Note-Landing-Page_Denver-Post.png" alt=""> -->
                            <img src="<?php echo $denver_coupon['sizes']['large']?>" alt="denver coupon">

                        </figure>
                    </div>
                    
                    <!-- <h3 class="u-textSizePlus7 u-paddingLeft4gu"><?php the_title() ?></h3> -->
                    <?php the_content(); ?>

                </div>
            </div>
            <!--.container-->
        </section>
        <!--.panel-->

<?php endwhile;
endif;


get_footer(); ?>