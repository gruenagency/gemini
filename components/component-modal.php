<?php

/** Modal component
 * empty by default, ties together with js to populate
 * 
 */
?>

<aside class="modal" id="modalWindow">
  <div class="panel panel--standard modal__inner">
    <button class="hamburger hamburger--modal" onclick="closeModal()">
      <span class="hamburger__middle hamburger__bar hamburger__bar--modal"></span>
      <span class="hamburger__middle hamburger__bar hamburger__bar--modal"></span>
    </button>

    <article id="modalContent" class="modal__content">
      <div class="container">


        <?php
        // * get navigation
        wp_nav_menu(array(
          'theme_location'  => 'mobile',
        ))
        ?>

      </div>
    </article>
    <div class="u-md-paddingHoriz8gu">
      <a href="<?php the_permalink(611); ?>" id="mob-cta" class="button button--primary u-textWeightBold">
        Schedule Now
      </a>
    </div>

  </div>
</aside>