<?php

/**
 * 
 * section template to display sidebar information
 * 
 */
?>

<div class="u-bgColorSecondary" style="border: 2px solid #f15d22; box-shadow: -15px 15px 0 -4px white, -14px 14px 0 0 #f15d22; padding: 1.5rem 0 2rem 0.5rem;">
    <h3 class="u-textColorWhite u-textAlignCenter u-textWeightLight u-textSizePlus3 u-marginBottom8gu" style="padding:0 0.5rem; line-height: 1em;"><?php the_field('company_name', 'options') ?>
        <div class="bottom-border-title"></h3>
    <div class="flex flex--align-middle" style="padding: 0 0 1em 0;">
        <img style="width:60px;height:60px;"src="<?php echo get_template_directory_uri(); ?>/lib/images/map.png"/>
        <p class="container flex__col" style="color:white; font-weight: 100; line-height: 1.5em;">
            <?php the_field('address_st', 'options')?> <?php the_field('address_state', 'options');?>
        </p>
    </div>

    <div class="flex flex--align-middle" style="padding: 0 0 1em 0;">
        <img style="width:60px;height:60px;"src="<?php echo get_template_directory_uri(); ?>/lib/images/hours.png"/>
        <p class="container flex__col" style="color:white; font-weight: 100; line-height: 1.5em;"><?php the_field('office_hours', 'options')?></p>
    </div>

    <div class="flex flex--align-middle" style="padding: 0 0 0.5em 0;">
        <img style="width:60px;height:60px;"src="<?php echo get_template_directory_uri(); ?>/lib/images/phone.png"/>
        <p class="container flex__col"><a class="u-textColorPrimary" style="color:white; font-weight: 100; line-height: 1.5em;" href="tel:+1<?php the_field('phone_number', 'options');?>">
            <?php the_field('phone_number', 'options');?></a>
        </p>
    </div>

    <div class="flex flex--align-middle" style="padding: 0 0 0.5em 0;">
        <img style="width:60px;height:60px;"src="<?php echo get_template_directory_uri(); ?>/lib/images/email.png"/>
        <p class="container flex__col"><a class="u-textColorPrimary" style="color:white; font-weight: 100; line-height: 1.5em;" href="mailto:<?php the_field('customer_service_link', 'options');?>">
            <?php the_field('customer_service_link', 'options');?></a>
        </p>
    </div>

</div>


<div class="u-bgColorSecondary" style="margin-top: 7rem; border: 2px solid #f15d22; box-shadow: -15px 15px 0 -4px white, -14px 14px 0 0 #f15d22; padding: 1.5rem 0 2rem 0.5rem;">
    <h3 class="u-textColorWhite u-textAlignCenter u-textWeightLight u-textSizePlus3 u-marginBottom8gu" style="padding:0 0.5rem; line-height: 1em;"><?php the_field('coupon_title', 'options') ?>
        <div class="bottom-border-title"></h3>
    <div class="flex flex--align-middle" style="padding: 1em;">
        <p class="container flex__col" style="color:white; font-weight: 100; line-height: 1.5em;">
            <?php the_field('coupon_text', 'options')?> 
        </p>
        
    </div>
    <div class="flex flex--align-middle" style="padding: 0 25%;">
    <a class="button button--primary u-textWeightBold"  href="/coupons/">Get Coupons</a>   
    </div>
</div>