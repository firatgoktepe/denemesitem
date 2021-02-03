<?php

/**
 * The template for displaying the footer
 *
 * @package Nax_Custom
 */

?>
<footer id="site-footer" class="<?php the_device_type(); ?>">

	<div class="footer-content">
	  <p>Du kan också köpa tjänsten som en del av företagshälsovården av våra partners:</p>
	  <a href="https://www.avonova.se/" target="_blank">
		<p>Avonova</p>
	  </a>
	  <a href="https://www.feelgood.se/hem/" target="_blank">
	  	<p>Feelgood</p>
	  </a>

    </div>
	
	<main>
		<section id="social-media-links">
			<?php while (have_rows('social_media', 'option')) : the_row();
				$social_media_link = get_sub_field('social_media_link');
				$social_media_icon = get_sub_field('line_awesome_icon');

				if ($social_media_link && !empty($social_media_icon)) :
					$link_url = esc_url($social_media_link['url']);
					$link_title = esc_attr($social_media_link['title']);
					$link_target = esc_attr($social_media_link['target'] ? $social_media_link['target'] : '_self');
			?>
					<a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>" rel="noopener" rel="noreferrer" title="<?php echo $link_title; ?>">
						<?php echo $social_media_icon; ?>
					</a>
				<?php endif; ?>
			<?php endwhile; ?>
		</section>

		<section id="footer-menu">
			<?php the_footer_menu(); ?>
		</section>

	</main>
	<footer>
		<section id="credits">
			<?php while (have_rows('credits_links', 'option')) : the_row();
				$link_text = get_sub_field('link_text');
				$link = get_sub_field('link');
			?>
				<a href="<?php echo $link; ?>" target="_blank" title="<?php echo $link_text; ?>">
					<?php echo $link_text; ?>
				</a>
			<?php endwhile; ?>
		</section>
	</footer>
</footer>
<?php wp_footer(); ?>
</body>

</html>
