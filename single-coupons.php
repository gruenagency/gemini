<?php

/**
 * The coupon template file
 */

get_header();


if (have_posts()) : while (have_posts()) : the_post();

        get_template_part('components/heroes/hero', 'single');
        if (have_rows('coupon_block')) :
            while (have_rows('coupon_block')) : the_row();
                $price = get_sub_field('price');
                $fine_print = get_sub_field(('fine_print'));
                $exp_date = get_sub_field('expiration_date');

?>
                <section class="panel panel--page <?php if (get_field('banner_text', 'options')) :echo 'announcemnt'; endif?>">
                    <div class="flex flex--justify-center">
                        <div class="flex flex--column flex--justify-even flex__col-md-6 flex__col-3 u-md-marginVert8gu u-padding8gu u-decoBorder u-bgColorWhite u-marginVert4gu">
                            <h4 class="u-textColorPrimary u-textSecondary u-textAlignCenter u-textSizePlus2 u-margin0gu"><?php the_title() ?></h4>
                            <h2 class="u-marginBottom4gu u-textAlignCenter u-textColorPrimary u-textSecondary u-textSizePlus6"><?php echo $price ?></h2>
                            <?php the_content(); ?>
                            <em class="u-textAlignCenter u-textColorNeutral">Valid through:<?php echo $exp_date; ?></em>
                            <em class="u-textColorNeutral u-textAlignCenter"><?php echo $fine_print; ?></em>

                        </div>
                    </div>
                </section>
        <?php endwhile;
        endif; ?>

<?php
    endwhile;
endif;



get_footer(); ?>