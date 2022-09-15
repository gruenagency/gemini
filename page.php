<?php
/**
 * The default page template
 */

get_header();
get_template_part('components/component-page', 'header');
?>

<section class="panel--standard">
  
  <?php $bread = get_field('show_hide_breadcrumbs');
    if ($bread == 'show') : ?>
      <div class="container" id="breadcrumbs">
        <?php echo do_shortcode('[wpseo_breadcrumb]'); ?>
      </div>
  <?php endif; ?>

  <div class="container flex flex-lg--wrap-reverse u-sm-padding0gu u-paddingHoriz8gu">

    <!-- Left Sidebar -->
    <div class="flex__col-lg-12 flex__col-4">
      <?php echo do_shortcode('[gravityform id=1 title=true description=true]');?>
      <?php if (get_field('enable_pulse_embed')) : ?>
        <div class="pulse u-marginVert12gu">
          <?php the_field('pulse_code', 'options'); ?>
        </div>
      <?php endif;
      global $post;
      $children = get_pages(array('child_of' => $post->ID));
      if (is_page() && $post->post_parent) : ?>
        <div class="page-menu u-marginTop12gu">
          <h4 class="u-paddingHoriz6gu u-textColorWhite u-margin0gu"><?php the_title() ?></h4>
          <?php echo themename_list_child_pages(); ?>
        </div>
      <?php endif; ?>
    </div>

    <!-- Right Content -->
    <div class="flex__col-lg-12 flex__col-7 u-lg-marginLeft0gu u-marginLeft14gu">
      <?php if (get_field('service_image')) : ?>
        <div class="card__about-img u-marginBottom8gu">
          <img src="<?php the_field('service_image'); ?>" alt="">
          <h2 class="u-margin0gu u-padding4gu u-textColorWhite"><?php the_title(); ?></h2>
        </div>
      <?php else : ?>
        <h2 class="u-textColorSecondary"><?php the_title() ?></h2>
      <?php endif; ?>
      <article>
        <?php the_content(); ?>
      </article>
    </div>
  </div>
</section>
<?php get_footer(); ?>