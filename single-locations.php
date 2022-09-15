<?php

/**
 * The post template file
 */

get_header();


if (have_posts()) : while (have_posts()) : the_post();

    get_template_part('components/heroes/hero', 'single');
    get_template_part('components/component-page', 'header');

    $post_type = get_post_type();

?>


      <section class="panel panel--standard">
        <div class="container flex flex--wrap-reverse">
          <div class="flex__col-4 flex__col-lg-12 u-paddingHoriz0gu u-lg-paddingHoriz4gu">
            <div class="u-marginBottom12gu">
              <?php echo do_shortcode('[wpseo_breadcrumb]'); ?>
            </div>
            <?php echo do_shortcode('[gravityform id=1 name=ContactUs title=true description=true]'); ?>
          </div>
          <div class="flex__col-8 flex__col-lg-12">
            <div class="entry-content u-marginLeft12gu u-md-marginLeft0gu">
              <h1 class="page-title u-marginBottom2gu"><?php the_title(); ?></h1>
              <?php the_content(); ?>
            </div>
          </div>
        </div>
      </section>


<?php endwhile; endif;
get_footer(); ?>