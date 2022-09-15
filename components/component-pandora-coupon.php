<?php

/**
 * 
 * section template to display each coupon
 * 
 */
$uri = get_template_directory_uri();
?>

<div class="flex flex--column flex--justify-even u-md-marginVert8gu u-padding8gu u-decoBorder u-marginVert4gu">
    <div class="container u-paddingBottom8gu">

        <?php if (have_rows('pandora_offers')) :
            while (have_rows('pandora_offers')) : the_row();
                $offer = get_sub_field('offer');
                $title = get_sub_field('title');
                $content = get_sub_field('content');
                $exp_date = get_sub_field('expiration_date');
                $fine_print = get_sub_field('fine_print');
        ?>

                <h3 class="u-textAlignCenter u-marginBottom2gu"><?php echo $title ?: ""; ?></h3>
                <h3 class="u-marginBottom4gu u-textAlignCenter u-textColorPrimary u-textSecondary"><?php echo $offer ?></h3>
                <article>
                    <p><?php echo $content; ?></p>
                </article>
                <div class="container u-paddingBottom4gu">
                    <em class="u-textAlignCenter u-textColorNeutral u-block">Valid through:<?php echo $exp_date; ?></em>
                    <em class="u-textColorNeutral u-textAlignCenter u-block"><?php echo $fine_print; ?></em>
                </div>
                <hr>
        <?php endwhile;
        endif; ?>
    </div>

    <div class="container">
        <img src="<?php echo $uri .'/lib/images/phone_nocrawl.png'; ?>">
    </div>
</div>