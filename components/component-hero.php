<?php
if (have_rows('hero', get_the_id())) :
  while (have_rows('hero', get_the_id())) : the_row();
    $video = get_sub_field('video', get_the_id());
    $poster = get_sub_field('hero_image', get_the_id());
    $header = get_sub_field('hero_header');
    $copy = get_sub_field('hero_copy');
    $cta = get_sub_field('hero_cta');

    if ($video || $poster) :
?>
  <section class="hero">
    <?php if ($video) :
      $video_type = pathinfo($video['url'], PATHINFO_EXTENSION);
    ?>
      <video class="video hero--video" <?php $poster ? print 'poster="' . $poster['sizes']['background'] . '"' : ''; ?> autoplay muted loop>
        <source src="<?php echo $video['url']; ?>" type="<?php echo 'video/' . $video_type; ?>">
      </video>
      <div class="container flex u-paddingVert22gu flex--justify-between flex--align-middle">
        <div class="hero-card flex__col-6 flex__col-lg-12">
          <h1><?php echo $header ?></h1>
          <p class="u-textStyleItalic">
            <?php echo $copy ?>
          </p>
        </div>
        <div class="hero-form flex__col-5 flex__col-lg-12">
          <?php echo do_shortcode('[gravityform id="13" title="true" description="false"]'); ?>
        </div>
      </div>
      
      <?php else : ?>

          <div class="poster poster--margin panel--bg-image" <?php $poster ? print 'style="--background-image: url(' . $poster . ');"' : ''; ?>>
            <div class="container poster flex flex--align-middle">
              <div class="hero-card flex__col">
                <h2 class="u-margin0gu u-textColorBlack u-textUppercase"><?php echo $header ?></h2>
                <p> <?php echo $copy ?> </p>
                <?php if ($cta) : ?><a class='button button--primary u-marginTop8gu' href="<?php echo $cta['url']; ?>"><?php echo $cta['title']; ?></a><?php endif; ?>
              </div>
            </div>

          <?php endif; ?>

      </section>
      <!--.panel-->
<?php endif;
  endwhile;
endif;
?>