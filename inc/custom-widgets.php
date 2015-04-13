<?php
// add our own Recent Posts widget
class jk_recent_posts extends WP_Widget {

	function jk_recent_posts() {
		// Instantiate the parent object
		parent::__construct( false, "Joeleen's Recent Posts Widget" );
	}

	function widget( $args, $instance ) {
		// Widget output
		if ( ! is_home() ) {
			if ( is_front_page() ) {
				$number = 6;
			} else {
				$number = 4;
			}
		global $post; 
		$postid = $post->ID;
		
		extract( $args );
		/** The themes before widget */
		echo $before_widget;
		?>
			<?php echo $before_title; ?>Thoughts<?php echo $after_title; ?>
			<div>
				<ul>

				<?php 
				$blogquery = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => $number ) );
				while ( $blogquery->have_posts() ) : $blogquery->the_post(); 
				$even_odd = (++$k % 2 == 0) ? 'even' : 'odd';
				$fourth = ($k % 4 == 0) ? ' fourth' : '';
				if ( is_front_page() ) { ?>
					<li class="hentry <?php echo $even_odd; echo $fourth; ?>">
						<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'joeleenkennedy' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						<?php if ( has_post_thumbnail() ) { ?>
						<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'joeleenkennedy' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
							<?php the_post_thumbnail('medium'); ?>
						</a>
						<?php } else {
							echo '<div class="entry-summary">';
							the_excerpt();
							echo '</div><!-- .entry-summary -->';
						} ?>
					</li>
				<?php } else { ?>
					<li class="hentry">
						<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'joeleenkennedy' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
					</li>
				<?php } endwhile; ?>

				</ul>
				<p><a href="/thoughts/" class="more">More thoughts</a></p>
			</div>
			<?php // Reset Post Data
			wp_reset_postdata(); ?>
		<?php 
		/** The themes after widget */
		echo $after_widget;
		} // !is_home
	}

	function update( $new_instance, $old_instance ) {
		// Save widget options
	}

	function form( $instance ) {
		// Output admin widget options form
	}
}

// add our own Projects widget
class jk_portfolio extends WP_Widget {

	function jk_portfolio() {
		// Instantiate the parent object
		parent::__construct( false, "Joeleen's Portfolio Widget" );
	}

	function widget( $args, $instance ) {

		if ( ! is_post_type_archive('portfolio') ) {
			if ( is_front_page() ) {
				$number = 6;
			} else if ( is_post_type_archive(portfolio) ) {
				$number = 10;
			} else {
				$number = 4;
			}
		// Widget output
		extract( $args );
		/** The themes before widget */
		echo $before_widget;
		?>
			<?php echo $before_title; ?>Recent Work<?php echo $after_title; ?>
			<div>
				<ul>
				<?php 
				$portfolioquery = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page' => $number ) );
				while ( $portfolioquery->have_posts() ) : $portfolioquery->the_post(); 
				$even_odd = (++$j % 2 == 0) ? 'even' : 'odd';
				$fourth = ($j % 4 == 0) ? ' fourth' : ''; 
				if ( is_front_page() ) { ?>
					<li class="hentry <?php echo $even_odd; echo $fourth; ?>">
						<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'joeleenkennedy' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						<?php if ( has_post_thumbnail() ) { ?>
						<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'joeleenkennedy' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
							<?php the_post_thumbnail('medium'); ?>
						</a>
						<?php } ?>
					</li>
				<?php } else { ?>
					<li class="hentry">
						<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'joeleenkennedy' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
					</li>
				<?php } endwhile; ?>
				</ul>
				<p><a href="/portfolio/" class="more">Full portfolio</a></p>
			</div>
			<?php // Reset Post Data
			wp_reset_postdata(); ?>
		<?php 
		/** The themes after widget */
		echo $after_widget;
		} // !is_post_type_archive
	}

	function update( $new_instance, $old_instance ) {
		// Save widget options
	}

	function form( $instance ) {
		// Output admin widget options form
	}
}