<?php
$show_hide_header = get_field('show_hide_header');
$image = get_field('header_background');
$truck = get_field('truck', 'options');
$page_title = get_field('page_header') ? get_field('page_header') : 'Repair Services for the Homeowner';
?>
<?php if ($show_hide_header == 'hide') : ?>
    <section class="panel--no-header <?php if (get_field('banner_text', 'options')) :echo 'announcemnt'; endif?>">
    </section>
<?php else : ?>
    <section class="panel panel--page panel__overlay--dark <?php if (get_field('banner_text', 'options')) :echo 'announcemnt'; endif?> panel--bg-image" <?php $image ? print 'style="--background-image: url(' . $image . ');"' : ''; ?>>
        <div class="container">
            <h2 class="u-margin0gu u-textColorPrimary u-textUppercase u-textStyleItalic">
                <?php if(get_field('supertext')): echo the_field('supertext'); else: echo the_field('office_hours', 'options'); endif;?>
            </h2>
            <h1 class=" page-title u-margin0gu u-textColorWhite"><?php echo $page_title ?></h1>
            <div class="truck--page">
                <img src="<?php echo $truck['sizes']['large'] ?>">
            </div>
        </div>
    </section>
<?php endif; ?>