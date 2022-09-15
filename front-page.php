<?php
    get_header();
    get_template_part('components/component-hero');
?>
<?php 
//Why Choose Applewood
    $bg_img = get_field('background_image'); 
// Join The Team
    $banner_header = get_field('employment_headline');
    $banner_copy = get_field('employment_copy');
    $banner_cta = get_field('employment_cta');
        $link_url = $banner_cta['url'];
        $link_title = $banner_cta['title'];
        $link_target = $banner_cta['target'] ? $banner_cta['target'] : '_self';
// Our Customers Love Us Section
    $ethics_bg_image = get_field('ethics_bg_image');
?>
<section class="u-md-padding0gu panel__overlay--white-fade panel--bg-image" <?php $bg_img ? print 'style="--background-image: url(' . $bg_img['sizes']['large'] . ');"' : ''; ?>>
    <div class="u-paddingTop12gu">
        <div class="container flex flex--justify-center flex-md--column-reverse flex--align-bottom">
            <div class="u-md-textAlignCenter flex__col-9">
                <?php
                $headline = get_field('headline');
                $copy = get_field('copy');
                $img = get_field('truck_image');
                ?>
                <h2 class="u-textSizePlus4 u-textWeightNormal u-textColorSecondary u-md-marginTop16gu"> <?php echo $headline ?> </h2>
                <p class="u-margin0gu"> <?php echo $copy ?> </p>
            </div>
            <div class="flex__col truck">
                <div>
                    <img src="<?php echo $img['sizes']['large'] ?>" alt="truck" />
                </div>
            </div>
        </div>
        <div class="panel panel--standard u-md-padding0gu">
            <div class="container">
                <?php if (have_rows('sub_fields')) :
                while (have_rows('sub_fields')) : the_row();
                $header = get_sub_field('sub_header');
                $copy = get_sub_field('sub_copy');
                ?>
                    <div class="u-paddingBottom8gu flex flex-md--column flex-md--align-middle">
                        <div class="flex__col">
                            <h3 class="u-textAlignLeft u-sm-textAlignCenter u-textColorPrimary u-textWeightNormal u-textSizePlus4"><?php echo $header ?></h3>
                        </div>
                        <div class="vert-divider"></div>
                        <div class="flex__col-8 u-md-paddingHoriz0gu u-paddingHoriz8gu">
                            <p class="u-margin0gu"><?php echo $copy ?></p>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </div>
</section>


<!-- Join the Team Banner -->
    <section class="panel--standard u-bgColorSecondary">
        <div class="container u-textColorWhite u-textAlignCenter">
            <h2 class="u-textColorWhite"><?php echo $banner_header; ?></h2>
            <p class=" u-marginBottom10gu"><?php echo $banner_copy; ?></p>
            <?php if( $banner_cta ): ?>
                <a class=" button button--primary u-sm-textAlignCenter u-textWeightBold" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>
        </div>
    </section>

<!-- Specalized Repair Services Section -->
    <?php get_template_part('components/component-service-cards'); ?>

<!-- Our Customers Love Us Section -->
    <section class="panel--standard u-paddingTop0gu panel__overlay--white-fade panel--bg-image" <?php $ethics_bg_image ? print 'style="--background-image: url(' . $ethics_bg_image['sizes']['large'] . ');"' : ''; ?>>
        <div class="container container--narrow u-paddingTop16gu u-paddingBottom16gu u-md-paddingBottom4gu">
            <h3 class="u-textColorSecondary u-textWeightNormal u-textSizePlus4 u-textAlignCenter"><?php echo get_field('ethics_headline'); ?></h3>
            <p class="u-margin0gu u-textAlignCenter u-marginBottom8gu"><?php echo get_field('ethics_copy'); ?></p>
            
            <div class="flex flex--justify-center">
                <?php if (have_rows('each_ethic')) :  while (have_rows('each_ethic')) : the_row();
                    $title = get_sub_field('title');
                    $content = get_sub_field('content'); ?>
                    <div class="flex__col-sm-12 flex__col-md-5  flex__col-3 u-textAlignCenter u-margin4gu u-sm-margin0u">
                        <div class="u-textAlignCenter u-textUppercase u-textSizePlus2">We will</div>
                        <h3 class="u-marginBottom0gu u-textAlignCenter u-textSizePlus4 u-textWeightNormal u-textColorPrimary"><?php echo $title ?></h3>
                        <p class="u-textHeightDefault u-textPrimary u-margin0gu u-textAlignCenter"><?php echo $content ?></p>
                    </div>
                <?php endwhile; endif; ?>
            </div>
        </div>
            
        <!-- Coupons  -->
        <div class="container container--narrow u-textAlignCenter u-marginBottom12gu">
            <h3 class="u-textColorSecondary u-textSizePlus4"><?php the_field('coupon_headline'); ?></h3>
            <p><?php the_field('coupon_copy'); ?></p>
        </div>
        <div class="container container--large">
            <div class="flex flex--justify-even flex--stretch">
            <?php 
            $coupon_query = new WP_Query(array(
                'post_type'         => 'coupons',
                'posts_per_page'    => '3',
                'orderby'           => 'ID',
                'order'             => 'DESC'
            ));
            if ($coupon_query->have_posts()) : while ($coupon_query->have_posts()) : $coupon_query->the_post();
            ?>
                <div class="flex__col-3 flex__col-lg-12 flex flex--column flex--justify-even  u-padding8gu u-decoBorder u-bgColorWhite u-marginBottom10gu">
                    <?php if (have_rows('coupon_block')) : while (have_rows('coupon_block')) : the_row();
                        $price = get_sub_field('price');
                        $fine_print = get_sub_field(('fine_print'));
                        $exp_date = get_sub_field('expiration_date');
                    ?>
                        <h4 class="u-textColorPrimary u-textSecondary u-textAlignCenter u-textSizePlus2 u-margin0gu"><?php the_title() ?></h4>
                        <h2 class="u-marginBottom4gu u-textAlignCenter u-textColorPrimary u-textSecondary u-textSizePlus6"><?php echo $price ?></h2>
                        <?php the_content(); ?>
                        <div class="u-textAlignCenter u-marginVert4gu">
                            <a href="<?php the_permalink() ?>" class="button button--secondary u-textWeightBold">Get Coupon</a>
                        </div>
                        <em class="u-textAlignCenter u-textColorNeutral">Valid through:<?php echo $exp_date; ?></em>
                        <em class="u-textColorNeutral u-textAlignCenter"><?php echo $fine_print; ?></em>
                
                    <?php endwhile; endif; ?>
                </div>
            <?php wp_reset_query(); endwhile; endif; ?>
            </div>
        </div>
    </section>

    <?php if( have_rows('badge') ): ?>
        <section class="container container--narrow u-marginTop22gu">
            <?php include(locate_template('components/component-carousel.php')); ?>
        </section>
    <?php endif; ?>

<!-- Reviews Section -->
        <?php include(locate_template('components/component-reviews.php', false, false)); ?>

 <!-- News Section -->
        <?php
        $bg_image = get_field('news_section_background_image');
        ?>

        <section class="panel--standard u-md-padding0gu u-paddingHoriz8gu panel__overlay--white-fade panel--bg-image" <?php $bg_image ? print 'style="--background-image: url(' . $bg_image['sizes']['large'] . ');"' : ''; ?>>

        <?php get_template_part('components/component-news'); ?>

            <!-- layered cta section  -->
            <?php
            if (have_rows('layered_section')) :
                while (have_rows('layered_section')) : the_row();
                    $bg_img = get_sub_field('layered_bg_image');
                    $img = get_sub_field('layered_image');
                   	$top_headline = get_sub_field('top_headline');
					$bottom_headline = get_sub_field('bottom_headline');
                    $copy = get_sub_field('layered_copy');
                    $cta = get_sub_field('layered_cta');
            ?>

                    <div class="panel panel--standard">
                        <div class="u-md-marginTop4gu u-marginTop32gu container flex flex--justify-center">
                            <div class="card__front-page">
                                <div class="flex flex--justify-around flex__col-9 panel u-lg-paddingBottom16gu u-paddingTop8gu panel__overlay--primary-hot panel--bg-image" <?php $bg_img ? print 'style="--background-image: url(' . $bg_img['sizes']['large'] . ');"' : ''; ?>>

                                    <div class="flex__col-lg-5 flex__col-5">
                                        <img src="<?php echo $img['sizes']['large'] ?>" alt="" />
                                    </div>
                                    <div class="z1 u-md-textAlignCenter">
                                    <h3 class="u-textColorWhite u-paddingTop6gu"><?php echo $top_headline; ?></h3>
									<h3 class="u-block u-md-hidden u-textColorWhite u-textHeightTight u-textSizePlus6"><?php echo $bottom_headline; ?></h3>
									<span class="u-hidden u-md-block u-textColorWhite u-textSizePlus4"><?php echo $bottom_headline; ?></span>
                                    <p class="u-textColorWhite u-md-marginVert4gu u-marginVert10gu"><?php echo $copy; ?></p>

                                        <div class="flex flex-md--column flex--justify-between flex--align-middle">
                                            <a href="/schedule-service/" class="button button--secondary-variant u-textWeightLight u-md-marginBottom8gu"><?php echo $cta ?></a>
                                            <a href="tel:<?php echo get_field('phone_number', 'options') ?>" class="u-textColorWhite u-textSizePlus2 u-textWeightLight"><?php echo get_field('phone_number', 'options') ?></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
            <?php endwhile; endif; ?>

        </section>

    <?php get_footer() ?>