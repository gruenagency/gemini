<?php

/** logo component
 * call this template to get an output of the logo, as uploaded to the theme's options page
 * 
 * variables accepted:
 *    $logo_classes
 *    $logo_acf
 *    $number_acf
 */

 $logo_acf = isset($logo_acf) ? $logo_acf : 'site_logo';
 $number_acf = isset($number_acf) ? $number_acf : 'phone_number';

 $logo = get_field($logo_acf, 'options');
 $number = get_field($number_acf, 'options');

 $svg_class = $logo['mime_type'] == 'image/svg+xml' ? 'style-svg' : '';
 ?>

<a class="a--logo logo<?php isset($logo_classes) ? print ' ' . $logo_classes : '' ; ?>" href="<?php bloginfo('url'); ?>">
  <img
    class="<?php echo $svg_class; ?>"
    src="<?php echo $logo['url']; ?>"
    srcset="<?php echo $logo['sizes']['large']; ?> 2x"
    alt="<?php echo $logo['alt']; ?>" />
</a>
