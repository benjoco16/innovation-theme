<?php
/**
Template Name: Home Page
 */

get_header(); ?>

	<header <?php if (!is_front_page()) { echo 'id="masthead"'; } else { echo 'id="masthead-home"'; } ?>class="site-header">
		<div class="container">
			

				<?php include('main-header.php'); ?>
				
				<div class="clear"></div>

				
				<!-- SLIDER -->
				<section id="home-hldr">
					<div class="row">
						<div class="col-md-6">
							<div class="home-banner-left">
								
								<?php the_field('banner_text');?>

								<a href="<?php bloginfo('url');?>/contact-us/">Inquire Now!</a>
							</div>
						</div>
						<div class="col-md-6">
							<div class="slider-hldr">
								<?php echo do_shortcode("[huge_it_slider id='1']"); ?>
							</div>
						</div>					
					</div>
				</section>
				<!-- #SLIDER -->
				
			
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">

	<div id="primary" class="content-area">
		<div class="container">
			<main id="main" class="site-main">
				
				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'home' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

			</main><!-- #main -->
		</div>
	</div><!-- #primary -->

<?php
get_footer();
