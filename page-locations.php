<?php

/**
 *
 * Template Name: Locations
 *
 */
get_header(); ?>
<section class="panel panel--location">
    <div class="flex flex--justify-between flex-lg--column">
        <div class=" u-marginTop12gu gmap flex__col-7">
            <div class="container locations-list">
                <h1 class="u-textSizePlus5"><?php the_title() ?></h1>
                <?php the_content(); ?>
            </div>
        </div>

        <div class="flex__col-5 u-marginTop8gu">
            <?php echo do_shortcode('[wpgmza id="1"]'); ?>
        </div>
    </div>
    <!--.container-->
</section>
<!--.panel-->


<?php
get_footer();
?>