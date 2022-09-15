<?php 
if (have_rows('split_block')) :
            while (have_rows('split_block')) : the_row();
                $img_left = get_sub_field('image_left');
                $heading = get_sub_field('heading_right');
                $copy = get_sub_field('content_right');
                $cta = get_sub_field('cta_right');
                $img_right = get_sub_field('image_right');
?>

                <!-- Split Block w/Truck animation -->

                <section class="flex flex-md--column flex--stretch">
                    <div class="flex__col u-sm-hidden panel--bg-image" <?php $img_left ? print 'style="--background-image: url(' . $img_left['sizes']['large'] . ');"' : ''; ?>></div>
                    <div class="panel--standard u-paddingBottom0gu flex__col flex">
                        <h2 class="u-paddingHoriz16gu u-textKernMinus50"><?php echo $heading ?></h2>
                        <p><?php echo $copy ?></p>
                        <a class="button">
                            <p><?php echo $cta ?></p>
                        </a>
                        <div class="flex__col truck">
                            <img src="<?php echo $img_right['sizes']['large'] ?>">
                        </div>
                    </div>
                </section>
        <?php
            endwhile;
        endif;
        ?>