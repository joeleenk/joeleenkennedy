<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Joeleen Kennedy
 * @since Joeleen Kennedy 1.0
 */

get_header(); ?>

		<section id="primary" class="site-content section recent-portfolio">

			<header class="page-header">
				<h1 class="page-title">
					<?php post_type_archive_title(); ?>
				</h1>
			</header>

			<?php rewind_posts(); ?>

			<div id="content" role="main">

			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); 
					$even_odd = (++$j % 2 == 0) ? 'even' : 'odd';
				?>

					<article id="post-<?php the_ID(); ?>" <?php post_class($even_odd); ?>>
						<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'joeleenkennedy' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

						<?php if ( has_post_thumbnail() ) { ?>
						<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'joeleenkennedy' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
							<?php the_post_thumbnail('medium'); ?>
						</a>
						<?php } ?>
					</article><!-- #post-<?php the_ID(); ?> -->

				<?php endwhile; ?>

				<?php joeleenkennedy_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'archive' ); ?>

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary .site-content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>