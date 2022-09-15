<?php

/**
 * Basic Card compontent, called within the loop
 * 
 */

?>

<a class="card" href="<?php the_permalink(); ?>">
  <div class="card__body">
    <h3><?php the_title(); ?></h3>
    <button class="button button--secondary">Read More</button>
  </div>
</a>