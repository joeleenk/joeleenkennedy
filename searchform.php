<?php
/**
 * The template for displaying search forms in Joeleen Kennedy
 *
 * @package Joeleen Kennedy
 * @since Joeleen Kennedy 1.0
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<label for="s" class="assistive-text"><?php _e( 'Search', 'joeleenkennedy' ); ?></label>
		<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search &hellip;', 'joeleenkennedy' ); ?>" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'joeleenkennedy' ); ?>" />
		<span class="icon-arrow-right"></span>
	</form>
