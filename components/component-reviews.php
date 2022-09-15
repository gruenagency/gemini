<!-- Customer Review Block -->
<?php
    $header = get_field('reviews_heading');
    $cta_left = get_field('left_cta');
    $cta_rt = get_field('right_cta');
    $dude = get_field('the_dude');
?>
    <section class="panel--standard u-paddingVert40gu u-xl-paddingVert16gu reviews">
        <?php if($dude): ?>
            <img class="tech" src="<?php echo $dude; ?>" alt="">
        <?php endif; ?>
        <div class="container u-textAlignCenter">
            <div class="flex__col u-marginBottom8gu">
                <h2 class="u-textPrimary u-textColorSecondary"><?php echo $header ?></h2>
            </div>
                <div class="flex flex-sm--justify-start flex--justify-center container client-ratings">

                    <?php if (have_rows('ratings_block')) :
                        while (have_rows('ratings_block')) : the_row();
                            $label = get_sub_field('ratings_title');
                            $rating = get_sub_field('ratings_count');
                            $addOn = get_sub_field('ratings_addon');
                    ?>

                            <div class="flex__col u-marginHoriz8gu" id="rating-<?php echo get_row_index() ?>">
                                <span class="flex__col u-textSecondary u-textColorPrimary u-textSizePlus5"><em class="flex__col u-textSecondary u-textColorPrimary u-textSizePlus5 percentage-count" data-count="<?php echo $rating; ?>">1</em><?php echo $addOn ?></span>
                                <div class="flex__col"><?php echo $label ?></div>
                                <ul class="stargroup">
                                    <li class="u-marginHoriz2gu animated star"><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li class="u-marginHoriz2gu animated star"><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li class="u-marginHoriz2gu animated star"><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li class="u-marginHoriz2gu animated star"><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li class="u-marginHoriz2gu animated star"><i class="fa fa-star" aria-hidden="true"></i></li>
                                </ul>
                            </div>

                    <?php
                        endwhile;
                    endif; ?>

                </div>

                <?php if (have_rows('review_links')) :
                        while (have_rows('review_links')) : the_row();
                    
                            
                    ?>

                <div class="flex flex--justify-center">

                    <a href="<?php the_sub_field('read_review'); ?>;" target="_blank" onmouseover='hoverChangeColor(this)' onmouseout='offChangeColor(this)' id="btn-left" class="button button--primary u-textWeightBold u-marginHoriz2gu u-sm-marginVert4gu"><article class="text_review"><?php the_sub_field('read_review_text'); ?></article></a>
                    
                    <a href="<?php the_sub_field('write_review'); ?>;" target="_blank" onmouseover='hoverChangeColor(this)' onmouseout='offChangeColor(this)' id="btn-rt" class="button button--secondary u-textWeightBold u-marginHoriz2gu u-sm-marginVert4gu"><article class="text_review"><?php the_sub_field('write_review_text'); ?></article></a>
                </div>

                <?php
                        endwhile;
                    endif; ?>

            </div>
        </section>
