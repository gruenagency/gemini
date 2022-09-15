<?php
$utility_menu =
wp_nav_menu(
    array(
        'theme_location' => 'auxiliary',
        'sort_column'			=> 'menu_order',
        'container'				=> false,
        'echo'						=> '0',
        'depth'						=> 2,
        'menu_class'			=> 'nav__list nav__list--header u-textWeightBold flex flex--justify-end',
    )
);
?>		
<div class="u-bgColorTertiary u-paddingVert2gu u-block u-md-hidden">
    <div class="container flex flex--justify-end flex--align-middle">
        <?php echo $utility_menu; ?>
        <?php echo do_shortcode('[searchandfilter slug="site-search"]'); ?>
        <span class="search-icon">
           <i class="fas fa-search"></i>
        </span>
        <span class="close-icon">
           <i class="fas fa-times"></i>
        </span>
    </div>
</div>