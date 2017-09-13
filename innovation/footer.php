<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package innovation
 */

?>

	</div><!-- #content -->
	
	<div id="footer-widget-holder">
		<div class="container">
			<div class="row">
				<?php dynamic_sidebar('Footer 1'); ?>
				<?php dynamic_sidebar('Footer 2'); ?>
			</div>
		</div>
	</div>


	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="site-info">
				copyright&copy;2017-2018 V168 Innovation Co, LTD All right Reserved
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
