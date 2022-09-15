<div class="badge">

<?php
while ( have_rows('badge') ) : the_row();
$img = get_sub_field('image');
$link = get_sub_field('link');
?>

    <a class="flex__col-3" href="<?php echo $link;?>" target="_blank"><img src="<?php echo $img;?>" /></a>

<?php endwhile; ?>
</div>