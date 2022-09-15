<?php

/**
 * 
 * section template to display each coupon
 * 
 */
if (have_rows('service_icon_block')) :
    while (have_rows('service_icon_block')) : the_row();
        $bg_img = get_sub_field('service_bg_image');
        $heading = get_sub_field('service_icon_heading');

?>

        <!-- Services Icons Block -->

        <section class="u-paddingVert32gu panel__overlay panel--bg-image" <?php $bg_img ? print 'style="--background-image: url(' . $bg_img['sizes']['large'] . ');"' : ''; ?>>
            <div class="container flex flex--column flex--align-middle">
                <div class="u-md-textAlignCenter">
                    <h3 class="u-textColorWhite"><?php echo $heading ?></h3>
                </div>

                <div class="flex flex--align-middle u-paddingTop8gu">


                    <!-- The Icons -->

                    <?php if (have_rows('service_icons')) :
                        while (have_rows('service_icons')) : the_row();
                            $icon = get_sub_field('service_icon');
                            $label = get_sub_field('service_label');
                    ?>

                            <a href="#" class="flex flex__col flex--column u-marginHoriz16gu">
                                <div class="flex flex--align-middle flex--justify-center flex__col--align-middle">
                                    <img src="<?php echo $icon['sizes']['large'] ?>" />
                                </div>
                                <div class="flex flex--align-middle flex--justify-center u-paddingTop4gu">
                                <h5 class="u-textSecondary u-textColorWhite u-textAlignCenter"><?php echo $label ?></h5>
                                </div>
                            </a>
                    <?php

                        endwhile;
                    endif;
                    ?>


                </div>
            </div>
        </section>
<?php

    endwhile;
endif;
?>