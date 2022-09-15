
<?php
$logo = get_field('site_logo', 'options');
$number = get_field('phone_number', 'options');
?>

<div class="navigation-desktop">
    <div class="flex__col-3 u-paddingLeft12gu">
        <a href="/"><img class="logo--header" src="<?php echo $logo; ?>"></a>
    </div>
    <a class="flex__col-6" href="tel:+1<?php echo $number; ?>">
        <h2 class="u-paddingRight12gu u-textAlignRight u-marginBottom4gu u-textSecondary u-textColorPrimary"><?php echo $number ?></h2>
    </a>
    
    <div class="flex__col-12 u-paddingRight12gu">
        
        <!-- Start Menu -->
        <?php if( have_rows('dropdown_content', 'options') ): ?>
            <div class="nav">
                <?php while ( have_rows('dropdown_content', 'options') ) : the_row();
                    $dropdown = get_sub_field('dropdown');
                    $menu_link = get_sub_field('menu_link');
                ?>
                <?php if ($dropdown): 
                    $img = get_sub_field('menu_image');
                    $dropdown_menu_title = get_sub_field('menu_title');
                ?>
                    <h5><?php the_sub_field('nav_item'); ?></h5>

                    <!-- Start Dropdown -->
                    <div class="dropdown-menu">
                        <div class="flex flex--stretch">
                            <div class="flex__col-3 u-lg-hidden">
                                <img src="<?php echo $img; ?>" />
                            </div>
                            <div class="flex__col-9 flex__col-lg-12">
                                <div class="flex flex--align-middle u-bgColorPrimary u-paddingBottom0gu u-lg-paddingBottom6gu">
                                    <div class="flex__col-9 flex__col-lg-12 u-paddingVert4gu">
                                        <h3 class="u-margin0gu u-textColorWhite u-textUppercase u-textAlignCenter"><?php echo $dropdown_menu_title;?></h3>
                                    </div>
                                    <div class="flex__col-3 flex__col-lg-12 u-textAlignCenter">
                                        <a class="learn-more u-textUppercase u-textColorWhite" href="<?php echo $menu_link;?>" >Learn More</a>
                                    </div>
                                </div>
                                <?php 
                                $count = count(get_sub_field('menu_links'));
                                if( have_rows('menu_links') ): ?>
                                 
                                    <div class="flex">
                                    <?php while ( have_rows('menu_links') ) : the_row();
                                        $link_title = get_sub_field('link_title');
                                        $link_link = get_sub_field('link');
                                        $link_description = get_sub_field('link_description');
                                    ?>
                                        <div class="tile <?php if( $count == 2): echo 'two'; elseif( $count == 3): echo 'three'; elseif( $count == 4): echo 'four'; elseif( $count == 5): echo 'five'; elseif( $count == 6): echo 'six';  elseif( $count == 7): echo 'seven'; endif; ?>">
                                        
                                            <a href="<?php echo $link_link;?>">
                                                <div class="u-marginVert4gu u-lg-marginVert2gu u-lg-paddingHoriz6gu u-paddingHoriz12gu u-textColorWhite">
                                                    <h6 class="u-textUppercase u-marginVert4gu u-textAlignCenter u-textColorWhite"><?php echo $link_title;?></h6>
                                                    <p class="u-textSizeMinus2 ">
                                                        <?php echo $link_description;?>
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endwhile; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <!-- End Dropdown -->
                <?php else : ?>
                    <h5 class="u-paddingHoriz2gu u-textWeightLight u-textUppercase">
                        <a href="<?php echo $menu_link;?>">
                            <?php the_sub_field('nav_item'); ?>
                        </a>
                    </h5>
                <?php endif; ?>

                <!-- End Menu -->
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

