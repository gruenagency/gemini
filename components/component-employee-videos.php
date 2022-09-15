<!-- Video Section -->

<?php

$video_content = get_field('video_section_content');
$video_bg = get_field('video_section_background');

?>

<div class="panel__overlay--white-fade panel--bg-image" <?php $video_bg ? print 'style="--background-image: url(' . $video_bg['sizes']['large'] . ');"' : ''; ?>>
    <div class="container container--narrow u-marginBottom8gu"><?php echo $video_content; ?></div>

    <?php if (have_rows('video_link_section')) : ?>

        <div class="flex flex--justify-center">

            <?php
            while (have_rows('video_link_section')) : the_row();
                $video_link = get_sub_field('youtube_url');
                $video_img = get_sub_field('video_image');
                $video_title = get_sub_field('video_title');
                $provider = get_sub_field('video_provider');;

            ?>

                <a href="<?php echo $video_link;?>" target="_blank" class="card__emp flex flex--align-bottom flex__col-3 flex__col-md-5 u-margin4gu panel__overlay--primary-fade panel--bg-image" <?php $video_img ? print 'style="--background-image: url(' . $video_img['sizes']['large'] . ');"' : ''; ?>>
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
</div>