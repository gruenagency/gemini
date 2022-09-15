<!-- CTA dark gray background -->
<section class="panel--standard u-bgColorSecondary">
	
	
		<?php if (is_front_page()) : ?>
			<div class="container flex flex--justify-between flex--align-middle">
				<div class="flex__col-6 flex__col-lg-12 u-textAlignLeft u-lg-textAlignCenter ">
					<h3 class="u-textColorWhite">Become an Applewood Insider</h3>
					<p class="u-textColorWhite">Sign up today to become an Applewood Insider and receive instant access to exclusive savings, promotions, industry insights, and so much more. Members will receive periodic notices via email and can unsubscribe at any time.</p>
					<a href="" class="button button--primary sign-up">Sign Up</a>
					<div class="sign-up-modal">
						<?php echo do_shortcode('[gravityform id="5" title="false" description="false"]'); ?>
					</div>
				</div>
				<div class="flex__col-5 flex__col-lg-12 u-textAlignCenter">
					<h2 class="u-textPrimary u-textUppercase u-textWeightBold u-textColorWhite u-marginTop0gu u-lg-marginTop12gu u-sm-textSizePlus4 mob-text">Call &nbsp;<span class="u-textSecondary u-textWeightLight mob-text"><?php the_field('phone_number', 'options') ?></span></h2>
					<a href="/schedule-service/" class="button button--primary">Schedule Now</a>
				</div>
			</div>
		<?php else: ?>
			<div class="u-textAlignCenter">
				<h2 class="u-textPrimary u-textUppercase u-textWeightBold u-textColorWhite u-marginTop0gu u-lg-marginTop12gu u-sm-textSizePlus4 mob-text">Call &nbsp;<a href="tel:<?php the_field('phone_number', 'options') ?>" class="u-textSecondary u-textColorWhite u-textWeightLight mob-text"><?php the_field('phone_number', 'options') ?></a></h2>
				<a href="/schedule-service/" class="button button--primary">Schedule Now</a>
			</div>
		<?php endif; ?>
	</div>
</section>



<footer class="panel panel--footer">
	<section class="container--full flex flex--justify-even">
			<?php if( have_rows('footer_menu', 'options') ):
			while( have_rows('footer_menu', 'options') ) : the_row();
				$column_title = get_sub_field('column_title');
				$column_title_link = get_sub_field('column_title_link');
				$nav_items = get_sub_field('nav_items');
			?>
			<div class="flex__col flex__col-md-3 nav__list--footer">
				<?php if ($column_title_link) : ?>
					<h5><a href="<?php echo $column_title_link; ?>"><?php echo $column_title; ?></a></h5>
				<?php elseif ($column_title) : ?>
					<h5><?php echo $column_title; ?></h5>
				<?php endif; ?>
			
				<?php if( have_rows('nav_items') ): ?>
					<ul>
					<?php while( have_rows('nav_items') ) : the_row();
						$nav_title = get_sub_field('nav_title');
						$nav_link = get_sub_field('nav_link');
						?>
						<li>
							<a href="<?php echo $nav_link; ?>"><?php echo $nav_title; ?></a>
						</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			</div>
		<?php endwhile; endif;?>

		<div class="grey u-textAlignCenter">
			<div class="u-paddingHoriz18gu u-paddingVert6gu">
				<p class="u-textUppercase u-textPrimary u-marginBottom0gu u-textSizePlus1.5 u-textWeightBold u-textColorSecondary u-marginTop2gu"><?php the_field('company_name', 'options'); ?></p>
				<p class="u-marginTop2gu u-marginBottom0gu u-textPrimary"><?php the_field('address_st', 'options'); ?><br/><?php the_field('address_state', 'options'); ?>
				<br/>
				<a href="tel:<?php the_field('phone_number', 'options') ?>" class="u-textColorPrimary u-textSizePlus2 u-textWeightBold u-textSecondary"><?php the_field('phone_number', 'options') ?></a>
				</p>
				<a class="u-marginTop0gu u-textPrimary" href="mailto:custservice@applewoodfixit.com"><?php the_field('customer_service_link', 'options'); ?></a>
				<div class="u-marginTop4gu"><a class="u-textWeightNormal button button--secondary" href="/locations/">Our Service Areas</a></div>
			</div>
		</div>

	</section>
	<section class="u-bgColorTertiaryShade">
		<div class="flex flex--align-middle flex--justify-between u-paddingVert6gu">
			<div class="flex__col-4 flex__col-md-12 u-textAlignCenter">
			<?php $logo = get_field('site_logo', 'options'); ?>
			        <a href="/"><img class="logo--header" src="<?php echo $logo; ?>"></a>
				
				<h6 class="u-marginTop4gu u-textColorSecondary">&copy; <?php echo date("Y"); ?> All rights reserved | <a href="/about-us/privacy/">Privacy Policy</a></h6>
			</div>

			<?php if (have_rows('social_media', 'options')) : ?>
				<div class="flex__col-4 flex__col-md-12 u-textAlignCenter u-paddingVert12gu">
					

					<?php while (have_rows('social_media', 'options')) : the_row();
						$label = get_sub_field('provider');
						$url = get_sub_field('link');
					?>
						<a href="<?php echo $url; ?>" target="_blank" class="u-textColorPrimary u-marginHoriz4gu"><i class="fa fa-<?php echo $label; ?> fa-2x"></i></a>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
		
			<div class="flex__col-4 flex__col-md-12 u-md-textAlignCenter">
				<?php $logo = get_field('tdl_logo', 'options'); ?>
				<img class="tdl-logo" alt="Team Dave Logan Logo" src="<?php echo $logo['sizes']['large'] ?>" />
			</div>
		</div>
	</section>
</footer>

<?php wp_footer(); ?>

</body>
</html>