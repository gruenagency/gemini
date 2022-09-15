<?php

/**
 * Template Name: Employment Page
 */

get_header();
if (have_posts()) : while (have_posts()) : the_post();
    $hero_bg = get_field('hero_bg');
    $hero = get_field('hero_image');
?>
        <section class="panel--standard container panel--page <?php if (get_field('banner_text', 'options')) :echo 'announcemnt'; endif?>">
            <div class="hero--employee u-marginBottom28gu u-md-marginTop0gu u-marginTop20gu panel__overlay--echo">
                <div class="u-md-paddingTop0gu panel__overlay--primary-hot z-1 panel--bg-image" <?php $hero_bg ? print 'style="--background-image: url(' . $hero_bg['sizes']['2048x2048'] . ');"' : ''; ?>>
                    <div class="z1 panel--bg-image-emp" <?php $hero ? print 'style="--background-image: url(' . $hero['sizes']['large'] . ');"' : ''; ?>>
                        <div class="hero--employee--content">
                            <h1><?php the_field('hero_header'); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="container container--full">
            <h2 class="u-textColorSecondary u-textAlignCenter reasons-copy-1">
                <?php the_field('list_headline'); ?>
            </h2>
            <p class="reasons-copy-2"><?php echo get_field('reasons_copy_1') ?></p>
            
            <div class="flex flex--justify-even reasons-list">
                <?php if (have_rows('numbered_list')) : while (have_rows('numbered_list')) : the_row(); $li = get_sub_field('list_item'); ?>
                    <div class="u-paddingVert4gu u-marginHoriz2gu flex__col-lg-10 flex__col-3 list-item"><?php echo $li ?></div>
                <?php endwhile; endif; ?>
                <p class="u-paddingTop6gu"><?php echo get_field('reasons_copy_2') ?></p>
            </div>
        </section>

        <section class="container container--narrow content-top-mobile">
            <div class="panel--standard u-marginVert12gu">
                <?php the_field('content_top'); ?>
            </div>
        </section>
        
        <!-- Job listings Section -->
        <section class="container container--full">
            <?php function job_listing() { ?>
                <div id="BambooHR" class="job-listing">
                    <script src="https://applewoodfixit.bamboohr.com/js/jobs2.php" type="text/javascript"></script>
                </div>
            <?php } job_listing(); ?>
        </section>

        <section class="container container--narrow content-top">
            <div class="panel--standard u-marginVert12gu">
                <?php the_field('content'); ?>
            </div>
        </section>
        

        <?php
        $video_content = get_field('video_section_content');
        $video_bg = get_field('video_section_background');
        ?>
        
        <section class="container--full panel__overlay--white-fade panel--bg-image u-paddingBottom12gu" <?php $video_bg ? print 'style="--background-image: url(' . $video_bg . ');"' : ''; ?>>
            <div class="container u-paddingVert8gu"><?php echo $video_content; ?></div>
                <?php if (have_rows('video_link_section')) : ?>
                    <div class="flex flex--justify-center">
                        <?php while (have_rows('video_link_section')) : the_row();
                            $video_link = get_sub_field('youtube_url');
                            $video_img = get_sub_field('video_image');
                            $video_title = get_sub_field('video_title');
                            $provider = get_sub_field('video_provider');;
                        ?>
                        <a href="<?php echo $video_link;?>" target="_blank" class="card__emp flex flex--align-bottom flex__col-3 flex__col-md-5 u-margin4gu panel__overlay--primary-fade panel--bg-image" <?php $video_img ? print 'style="--background-image: url(' . $video_img . ');"' : ''; ?>>
                            <div class="container u-paddingBottom4gu u-textColorWhite z1">
                                <span class="u-textSizePlus2">
                                    <p class="z1 u-margin0gu"><i class="u-paddingRight4gu fa fa-<?php echo $provider; ?> fa-2x"></i>Video</p>
                                    <span class="u-textUppercase"><?php echo $video_title; ?></span>
                                </span>
                            </div>
                        </a>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </section>

        <section class="container container--narrow content-bottom">
            <div class="panel--standard u-marginVert12gu">
                <?php the_field('content_2'); ?>
            </div>
        </section>

        <section class="container u-marginVert16gu u-textAlignCenter">
            <h3>Awards</h3>
            <img src="<?php the_field('awards_image'); ?>" />
        </section>

<?php endwhile; endif;
get_footer(); ?>