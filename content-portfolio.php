<?php
/**
 * @package Joeleen Kennedy
 * @since Joeleen Kennedy 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($even_odd); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'joeleenkennedy' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	</header><!-- .entry-header -->

	<?php if ( has_post_thumbnail() ) { ?>
	<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'joeleenkennedy' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
		<?php the_post_thumbnail('medium'); ?>
	</a>
	<?php } ?>
</article><!-- #post-<?php the_ID(); ?> -->