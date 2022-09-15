<?php

/**
 * Template Name: Coupon Archive *
 */


get_header();


?>

<section class="panel panel--page">
    <h1 class="u-textAlignCenter">Applewood Plumbing Coupons</h1>
    
    <?php if (have_posts()) : while (have_posts()) : the_post();

    $post_type = get_post_type();
?>
    <section class="u-marginBottom12gu u-marginTop12gu">
        <div class="container">
            <article class="entry-content--single">
              <?php the_content(); ?>
            </article>
        </div>
      </section>

      <?php endwhile; endif;
       ?>

    <div class="flex flex--justify-even">

        <?php
        $coupon_query = new WP_Query(array(
            'post_type'         => 'coupons',
            'posts_per_page'    => '3',
            'orderby'           => 'ID',
            'order'             => 'DESC'
        ));
        if ($coupon_query && $coupon_query->have_posts()) : while ($coupon_query->have_posts()) : $coupon_query->the_post();
                if (have_rows('coupon_block')) :

                    while (have_rows('coupon_block')) : the_row();
                        $price = get_sub_field('price');
                        $fine_print = get_sub_field(('fine_print'));
                        $exp_date = get_sub_field('expiration_date');
        ?>

                        <div class="flex flex--column flex--justify-even flex__col-3 flex__col-sm-10 flex__col-lg-8 u-md-marginVert8gu u-padding8gu u-decoBorder u-bgColorWhite u-marginVert4gu">
                            <h4 class="u-textColorPrimary u-textSecondary u-textAlignCenter u-textSizePlus2 u-margin0gu"><?php the_title() ?></h4>
                            <h2 class="u-marginBottom4gu u-textAlignCenter u-textColorPrimary u-textSecondary u-textSizePlus6"><?php echo $price ?></h2>
                            <?php the_content(); ?>
                            <div class="u-textAlignCenter u-marginVert4gu">
                                <a href="<?php the_permalink() ?>" class="button button--secondary u-textWeightBold">Get Coupon</a>
                            </div>
                            <em class="u-textAlignCenter u-textColorNeutral">Valid through:<?php echo $exp_date; ?></em>
                            <em class="u-textColorNeutral u-textAlignCenter"><?php echo $fine_print; ?></em>

                        </div>

                <?php endwhile;
                endif;
                ?>
        <?php endwhile;
        endif;
        ?>

    </div>
</section>

<?php
get_footer();

?>