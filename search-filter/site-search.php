<?php
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( $query->have_posts() ) : 

	while ( $query->have_posts() ) : $query->the_post();
		the_title();
	endwhile; ?>
<?php endif;  ?>
<div class="u-marginVert8gu pagination">

			<?php 
				$paged = get_query_var('paged') ? get_query_var('paged') : 1;
				$max = $query->max_num_pages;
				$prev_url = previous_posts(false);
				$next_url = next_posts( $max, false);

				if($paged && $paged != 1 && $prev_url) { ?>
				<a href="<?php echo $prev_url ?>" class="pagination__link pagination__link--back">Previous Page</a>
				<?php } else { ?>
					<span class="pagination__link pagination__link--back disabled">Previous Page</span>
				<?php } ?>

				<strong class="p--large u-inlineBlock u-marginHoriz8gu">Page <?php echo $query->query['paged']; ?> of <?php echo $query->max_num_pages; ?> </strong>
				
				<?php if ($next_url) { ?>
					<span class="pagination__link"><?php next_posts_link( 'Next Page', $query->max_num_pages ); ?></span>
				<?php  } else { ?>
					<span class="pagination__link disabled">Next Page</span>
				<?php } 
			?>

  	</div>