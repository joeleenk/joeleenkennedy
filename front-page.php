<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Joeleen Kennedy
 * @since Joeleen Kennedy 1.0
 */

get_header(); ?>

		<div id="primary" class="site-content">
			<div id="content" role="main">

				<?php $portfolioargs = array(
					'before_widget' => '<section class="section recent-portfolio inner">',
					'after_widget' => '</section>',
					'before_title' => '<h1 class="section-title">',
					'after_title' => '</h1>'
				);
				the_widget('jk_portfolio', '', $portfolioargs); 

/*
				$recentargs = array(
					'before_widget' => '<section class="section recent-posts inner">',
					'after_widget' => '</section>',
					'before_title' => '<h1 class="section-title">',
					'after_title' => '</h1>'
				);
				the_widget('jk_recent_posts', '', $recentargs); 
*/
				?>

				<section class="section about inner">

					<?php 
					$aboutquery = new WP_Query( 'page_id=153' );
					while ( $aboutquery->have_posts() ) : $aboutquery->the_post(); ?>
					<h1 class="section-title"><?php the_title(); ?></h1>
					<div>
						<?php the_content(); ?>
					</div>
					<?php endwhile; ?>

					<?php // Reset Post Data
					wp_reset_postdata(); ?>
				</section>

			</div><!-- #content -->
		</div><!-- #primary .site-content -->

<?php get_footer(); ?>