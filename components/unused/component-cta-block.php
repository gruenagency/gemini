<?php

if (have_rows('cta_block')) :
  while (have_rows('cta_block')) : the_row();

    $heading = get_sub_field('heading');
    $subHeading = get_sub_field('sub_heading');
    $cta = get_sub_field('cta');
    

    // CTA Block


?>

    <section class="u-paddingVert8gu u-sm-paddingHoriz4gu u-sm-textAlignCenter u-paddingHoriz12gu u-bgColorPrimary">
      <div class="flex flex--justify-between flex--align-middle">
        <div>
          <h2 class="u-textPrimary u-textColorWhite u-margin0gu u-textWeightBold"><?php echo $heading ?></h2>
          <p><?php echo $subHeading ?></p>
        </div>
        <div class="u-sm-hidden">
          <a href="<?php the_permalink(611) ?>" onmouseover='hoverChangeColor(this)' onmouseout='offChangeColor(this)' class="button button--primary u-textWeightBold"><?php echo $cta ?></a>
        </div>
      </div>
      </div>
      <!--.container-->
    </section>
    <!--.panel-->


<?php endwhile;
endif; ?>