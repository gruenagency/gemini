<?php
$logo = get_field('site_logo', 'options');
$number = get_field('phone_number', 'options');
?>
<div class="navigation-mobile">
    <div class="flex flex--align-middle">
        <a class="flex__col u-paddingVert4gu u-bgColorPrimaryShade u-textWeightBold u-textAlignCenter u-textColorWhite" href="tel:+1<?php the_field('phone_number', 'options'); ?>">
                <?php the_field('phone_number', 'options'); ?>
        </a>
        <a href="/schedule-service/" style="border-left: 1px solid #fff;" class="flex__col u-paddingVert4gu u-bgColorPrimaryShade u-textWeightBold u-textAlignCenter u-textUppercase u-textColorWhite">Schedule Now</a>
    </div>

    <div class="flex flex--align-middle">
        <a href="/employment/" style="border-top: 1px solid #fff; border-bottom: 1px solid #fff;" class="flex__col u-paddingVert4gu u-bgColorPrimary u-textWeightBold u-textAlignCenter u-textUppercase u-textColorWhite">Employment</a>
    </div>

    <div class="flex flex--justify-around flex--align-middle u-paddingVert4gu">
        <a class="flex__col-2" href="tel:+1<?php the_field('phone_number', 'options'); ?>">
		<i class="fa fa-phone" id="icon"></i>
	</a>

    <div class="flex__col-4">
        <a href="/"><img class="logo--header" src="<?php echo $logo; ?>"></a>
    </div>



    <div class="flex__col-2">
        <button class="hamburger">
            <span class="hamburger__bar--top hamburger__bar"></span>
            <span class="hamburger__bar--middle hamburger__bar"></span>
            <span class="hamburger__bar--bottom hamburger__bar"></span>
        </button>
    </div>
    </div>

    <?php if( have_rows('dropdown_content', 'options') ): ?>
        <div class="mobile-nav flex__col-12">
            <?php while ( have_rows('dropdown_content', 'options') ) : the_row();
                    $dropdown = get_sub_field('dropdown');
                    $menu_link = get_sub_field('menu_link');
                    if ($dropdown): 
                        $img = get_sub_field('menu_image');
                        $dropdown_menu_title = get_sub_field('menu_title');
                    ?>
                    <div class="nav_line">
                        <h3><?php the_sub_field('nav_item'); ?><span class="arrow"></span></h3>
                        <ul>
                            <li>
                                <a class="u-textUppercase u-textColorWhite" href="<?php echo $menu_link;?>">View <?php the_sub_field('nav_item'); ?> Page</a>
                            </li>
                            <?php if( have_rows('menu_links') ): while ( have_rows('menu_links') ) : the_row();
                            $link_title = get_sub_field('link_title');
                            $link_link = get_sub_field('link');
                            ?>
                            <li>
                                <a class="u-textUppercase u-textColorWhite" href="<?php echo $link_link;?>">
                                    <?php echo $link_title;?>
                                </a>
                            </li>
                            <?php endwhile; endif; ?>
                        </ul>
                    </div>
                    
                <?php else : ?>
                    <div class="nav_line">
                        <h3>
                            <a href="<?php echo $menu_link;?>">
                                <?php the_sub_field('nav_item'); ?>
                            </a>
                        </h3>
                    </div>
                <?php endif; ?>
                    
            <?php endwhile; ?>
            <div class="nav_line">
                <h3>
                    <a href="/news"> Blog </a>
                </h3>
            </div>
			<div class="nav_line">
                <h3>
                    <a href="/coupons"> Coupons </a>
                </h3>
            </div>
            <div class="mobile_search">
                <?php echo do_shortcode('[searchandfilter slug="site-search"]'); ?>
            </div>
        </div>
    <?php endif; ?>
</div>