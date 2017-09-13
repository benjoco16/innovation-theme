<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package innovation
 */

get_header(); ?>

	<header <?php if (!is_front_page()) { echo 'id="masthead"'; } else { echo 'id="masthead-home"'; } ?>class="site-header">
		<div class="container">
			

				<?php include('main-header.php'); ?>

				<div class="clear"></div>

				
			<div class="border-line"></div>
				<section id="page-hldr">


					<div class="row">
						<div class="col-md-12">
							<?php
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/content', 'page' );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

							endwhile; // End of the loop.
							?>
						</div>
										
					</div>
				</section>
				
				
			
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">


<?php
get_footer();
