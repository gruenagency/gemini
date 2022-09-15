<!-- Reasons section -->

<div class="flex">
    <div class="container">
        <h2 class="u-textColorSecondary u-textAlignCenter">

            <?php
            $count = count(get_field('numbered_list'));
            $disabled = get_field('disable_count'); ?>
            <span><?php echo ($disabled) ? "" : $count ?></span>
            <?php the_field('list_headline'); ?>

        </h2>
        <p><?php echo get_field('reasons_copy_1') ?></p>
    </div>
    <div class="flex flex--justify-even">

        <?php
        if (have_rows('numbered_list')) : while (have_rows('numbered_list')) : the_row();
                $li = get_sub_field('list_item');
        ?>

                <div class="u-paddingVert4gu u-marginHoriz2gu flex__col-lg-10 flex__col-3 list-item"><?php echo $li ?></div>

        <?php
            endwhile;
        endif;
        ?>
    </div>
    <div class="container">
        <p><?php echo get_field('reasons_copy_2') ?></p>
    </div>
</div>