<?php

/**
 * The post template file
 */

get_header();


if (have_posts()) : while (have_posts()) : the_post();

    get_template_part('components/heroes/hero', 'single');
    $post_type = get_post_type();
?>


      <section class="panel panel--page <?php if (get_field('banner_text', 'options')) :echo 'announcemnt'; endif?> panel--standard">
        <div class="container">
            <article class="entry-content--single">
            <p class="u-textFauxSmCaps u-textColorNeutral u-margin0gu"><?php echo the_date(); ?></p>
            <h1 class="page-title"><?php the_title(); ?></h1>
            <br>
              <?php the_content(); ?>
            </article>
        </div>
      </section>

<?php

$prev_post = get_adjacent_post(false, '', true);
$next_post = get_adjacent_post(false, '', false);

if($prev_post || $next_post) :
?>

<section class="panel u-marginTop6gu u-paddingVert5gu u-bgColorTertiary">
  <div class="container flex flex--align-middle">
    <div class="flex__col">
      <?php if($prev_post) : ?>
        <a class="post-arrow post-arrow--prev" href="<?php the_permalink($prev_post->ID); ?>">
          <span class="u-textUppercase u-textSizeMinus1">Previous Post</span>
          <br>
          <span class="u-textTertiary"><?php echo get_the_title($prev_post->ID); ?></span>
        </a>
        <?php else : echo '&nbsp;'; endif; ?>
    </div>
<div class="flex__col u-textAlignCenter">
<a href="/news" class="button button--secondary no-after">View All Posts</a>
</div>
    <div class="flex__col u-textAlignRight">
      <?php if($next_post) : ?>
        <a class="post-arrow post-arrow--next" href="<?php the_permalink($next_post->ID);?>">
          <span class="u-textUppercase u-textSizeMinus1">Next Post</span>
          <br>
          <span class="u-textTertiary"><?php echo get_the_title($next_post->ID); ?></span>
        </a>
        <?php else : echo '&nbsp;'; endif; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php endwhile; endif;
get_footer(); ?>