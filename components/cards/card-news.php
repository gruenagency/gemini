<?php

/**
 * Basic Card compontent, called within the loop
 * 
 */

?>

<div class="card__news">
    <a href="<?php the_permalink() ?>">
        <?php the_post_thumbnail(); ?>
    
    <div class="u-padding4gu">

            <h3 class="u-marginBottom4gu u-textColorSecondary archive-post-title"><?php echo get_the_title() ?></h3>
        <p class="u-textSizeMinus1 u-marginBottom0gu u-textColorNeutral"><?php the_time('F j, Y') ?></p>
        <?php the_excerpt() ?>
        <br />
        <p>Continue Reading &raquo;</p>
    </div>
    </a>
</div>
