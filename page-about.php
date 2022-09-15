<?php

/**
* Template Name: About Page
*/

get_header();

if (have_posts()) : while (have_posts()) : the_post();
    get_template_part('components/heroes/hero');
    get_template_part('components/component-page', 'header');
?>

    <section class="panel--standard">
        <div class="container flex flex--wrap-reverse">
            <div class="flex__col-4 flex__col-lg-12">
                <div class=u-marginBottom12gu">
                    <div id="breadcrumbs">
                        <?php echo do_shortcode('[wpseo_breadcrumb]'); ?>
                    </div>
                </div>
                <?php echo do_shortcode('[gravityform id=1 name=ContactUs title=true description=true]'); ?>
                <?php if (is_active_sidebar('custom-page-widget')) : ?>
                    <div id="page-widget-area" class="cpw-widget-area widget-area" role="complementary">
                        <?php dynamic_sidebar('custom-page-widget'); ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="flex__col-8 flex__col-lg-12">
                <div class="u-lg-marginLeft0gu u-marginLeft16gu">
                    <div class="card__about-img u-marginBottom16gu">
                        <img src="<?php the_field('service_image'); ?>" alt="">
                        <h2 class="u-textColorPrimary margin0gu card__about-img--header"><?php the_title() ?></h2>
                    </div>
                    <?php the_content(); ?>
                </div>
            </div>

        </div>
    </section>
																						
<?php if(get_field('awards_image')) : ?>
    <section class="panel--standard container u-textAlignCenter">
        <h3>Awards</h3>
        <img src="<?php the_field('awards_image');?>" />
    </section>
<?php endif; ?>		

    <section class="panel--standard container u-textAlignCenter u-marginBottom16gu">
        <div class="flex flex--column flex--justify-center">
            <h3 class="u-textAlignCenter"><?php echo get_field('about_our_business_content'); ?></h3>
            <?php if (have_rows('about_link_section')) : ?>
                <div class="flex flex--justify-center">
                    <?php while (have_rows('about_link_section')) : the_row();
                        $about_link = get_sub_field('link');
                        $about_img = get_sub_field('page_url_image');
                        $about_title = get_sub_field('page_url_title');
                    ?>
                        <a href="<?php echo $about_link['url'] ?>" class="flex__col-3 card__about flex flex--align-bottom u-margin4gu panel__overlay--primary-fade panel--bg-image" <?php $about_img ? print 'style="--background-image: url(' . $about_img['sizes']['large'] . ');"' : ''; ?>>
                            <h3 class="z1 u-textColorWhite u-marginLeft4gu"><?php echo $about_title ?></h3>
                        </a>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>