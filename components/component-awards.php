<!-- Call this template to get the awards panel -->

<div class="container u-marginTop16gu u-textAlignCenter">

    <?php echo get_field('awards_section_content'); ?>

    <div class="flex flex--justify-center">
        <div class="flex__col-8">
            <img src="
            
            <?php
            $img = get_field('awards_image');
            echo $img['sizes']['large']; ?>" />

        </div>
    </div>
    <!--container-->
</div>

<?php if (have_rows('awards_link_section')) : ?>

    <div class="flex flex--justify-even u-paddingHoriz4gu">

        <?php while (have_rows('awards_link_section')) : the_row();
            $award_link = get_sub_field('award_link');
            $award_img = get_sub_field('award_image');
        ?>

            <div class="flex__col-lg-2 flex__col-1 u-marginHoriz4gu">
                <a href="<?php echo $award_link; ?>">
                    <img src="<?php echo $award_img['sizes']['large']; ?>" />
                </a>
            </div>

    <?php
        endwhile;
    endif; ?>

    </div>