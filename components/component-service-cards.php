<section class="panel--standard">
<?php 
    $service_heading = get_field('service_heading');
    $service_copy = get_field('service_copy');
?>
    <div class="container container--narrow u-textAlignCenter u-marginBottom8gu">
        <h2 class="u-textUppercase u-textWeightNormal u-textColorSecondary u-textSizePlus4"><?php echo $service_heading ?></h2>
        <p><?php echo $service_copy ?></p>
    </div>

    <div class="container flex flex--justify-center u-paddingBottom8gu">
        <?php if (have_rows('services')) : while (have_rows('services')) : the_row();
            $bg_img = get_sub_field('service_bg_image');
            $icon = get_sub_field('service_ikon');
            $title = get_sub_field('service_title');
            $content = get_sub_field('service_content');
            $link_url = get_sub_field('service_link');
			$link = $link_url['url'];
        ?>
        <div class="panel flex__col-5 flex__col-lg-12 u-paddingTop10gu panel__overlay--servicedark card__service panel--bg-image" <?php $bg_img ? print 'style="--background-image: url(' . $bg_img['sizes']['large'] . ');"' : ''; ?>>
            <div class="flex flex--align-stretch">
                <div class="flex__col-7 flex__col-md-12">
                    <div class="flex flex--align-middle u-marginBottom4gu">
                        <img src="<?php echo $icon['sizes']['medium']; ?>">
                        <a href="<?php echo $link;?>">
                            <h3 class="u-textColorWhite u-textPrimary u-textWeightLight u-marginBottom0gu u-marginLeft2gu"><?php echo $title; ?></h3>
                        </a>
                    </div>
                    <p class="u-margin0gu u-textColorWhite">
                        <?php echo $content ?>
                    </p>
                </div>
            
                <div class="flex__col-5 flex__col-md-12 flex u-md-marginTop4gu flex--justify-center flex-md--justify-start">
                    <?php if (have_rows('service_list')) : ?>
                    <ul class="u-marginTop10gu u-md-marginTop4gu">
                        <?php while (have_rows('service_list')) : the_row();
                            $link = get_sub_field('service_individiual');
                            if( $link ): 
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                <li>
                                    <a class="u-textColorPrimary u-textWeightMedium u-textPrimary" href="<?php echo $link_url; ?>">
                                    - <?php echo $link_title; ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endwhile;?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endwhile; endif; ?>



</section>