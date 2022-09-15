<?php

/**
 * Template Name: pandora
 */

get_header();

if (have_posts()) : while (have_posts()) : the_post();

        get_template_part('components/component-page', 'header');

?>
        <section class="panel--standard u-sm-padding4gu">
            <div class="container flex flex-lg--column-reverse u-paddingTop8gu u-sm-padding0gu">
                <?php
                if ($post->ID != 6954) : ?>

                    <div class="container flex__col-4">
                        <div class="u-marginBottom12gu u-marginHoriz4gu">

                            <?php
                            echo do_shortcode('[gravityform id=1 name=ContactUs title=true description=true]');
                            ?>

                        </div>
                    </div>
                <?php endif; ?>

                <div class="flex__col-7 u-sm-margin0gu u-marginLeft12gu post-content">

                    <?php $serviceImg = get_field('service_image');
                    if (!empty($serviceImg)) : ?>

                        <div class="card__service-img u-marginBottom16gu">
                            <img src="<?php echo $serviceImg['sizes']['large']; ?>" alt="">
                            <h2 class="u-textSizePlus6 u-margin0gu u-textColorWhite">Hello, Pandora Listeners!</h2>
                        </div>

                    <? endif;

                    if (empty($serviceImg)) : ?>
                        <h1 class="page-title u-textColorSecondary u-margin0gu"><?php the_title() ?></h1>
                    <? endif; ?>
                    <div class="container">
                        <?php
                        include(locate_template('components/component-pandora-coupon.php', false, false));
                        ?>
                    </div>

                </div>
            </div>
            <!--.container-->
        </section>
        <!--.panel-->


<?php endwhile;
endif;


get_footer(); ?>