<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Joeleen Kennedy
 * @since Joeleen Kennedy 1.0
 */
?>
	<?php if ( ! is_front_page() ) { ?>
		</div><!-- .inner -->
	<?php } ?>
	</div><!-- #main -->
	<nav role="navigation" class="site-navigation main-navigation" id="menu">
		<div class="inner">
			<h1 class="assistive-text"><?php _e( 'Menu', 'joeleenkennedy' ); ?></h1>
			<div class="toolbar">
				<div class="icon"><a href="#search" class="icon-search"><span class="assistive-text">Search</span></a></div>
				<div class="icon"><a href="#menu" class="icon-list"><span class="assistive-text">Menu</span></a></div>
			</div>
			
			<div class="top"><a href="#top" title="<?php esc_attr_e( 'Back to top', 'joeleenkennedy' ); ?>" class="icon-arrow-up"><?php _e( 'Top', 'joeleenkennedy' ); ?></a></div>
			<div id="search">
				<?php get_search_form( true ); ?>
			</div>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</div><!-- .inner -->
	</nav>
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>
<!-- Google Analytics Start -->
<script type="text/javascript">
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<!-- Google Analytics End -->
</body>
</html>