<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Joeleen Kennedy
 * @since Joeleen Kennedy 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'joeleenkennedy' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<script type="text/javascript" src="//use.typekit.net/xxxxxxx.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/icomoon/style.css" />
<!--[if lte IE 7]>
<script src="<?php echo get_template_directory_uri(); ?>/icomoon/lte-ie7.js"></script>
<![endif]-->
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<!-- Google Analytics Start -->
<script src="<?php echo get_template_directory_uri(); ?>/js/entourage.min.js"></script>

<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
  _gaq.push(['_trackPageview']);
</script>

<!-- Google Analytics End -->

<?php wp_head(); ?>
</head>

<body id="top" <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<div class="inner">
			<hgroup class="hgroup">
				<h1 class="site-title"><span class="hello">Hello Internet, <br />
					I'm </span>
					<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<span class="first">Joeleen</span> <span class="last">Kennedy</span>
					</a></h1>
				<h4 class="site-description"><?php bloginfo( 'description' ); ?></h4>
			</hgroup>
		</div><!-- .inner -->
	</header><!-- #masthead .site-header -->
	<div id="main">
		<?php if ( ! is_front_page() ) { ?>
		<div class="inner">
		<?php } ?>