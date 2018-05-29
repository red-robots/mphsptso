<?php
/**
 * The header for theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'acstarter' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="row-1">
			<div class="wrapper cap clear-bottom">
				<?php $facebook_link = get_field("facebook_link","option");
				if($facebook_link):?>
					<div class="social">
						<a href="<?php echo $facebook_link;?>" target="_blank"><i class="fa fa-facebook"></i></a>
					</div><!--.social-->
				<?php endif;?>
			</div><!--.wrapper-->
		</div><!--.row-1-->
		<div class="row-2">
			<div class="wrapper cap alt">
				<nav class="left-nav" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'left-nav' ) ); ?>
				</nav><!-- .left-nav -->
				<?php $logo = get_field("logo","option");
				if($logo):
					if(is_home()): ?>
						<h1 class="logo">
							<a href="<?php bloginfo('url'); ?>"><img src="<?php echo $logo['sizes']['medium'];?>" alt="<?php bloginfo('name'); ?>"></a>
						</h1>
					<?php else: ?>
						<div class="logo">
							<a href="<?php bloginfo('url'); ?>"><img src="<?php echo $logo['sizes']['medium'];?>" alt="<?php bloginfo('name'); ?>"></a>
						</div>
					<?php endif; 
				endif;?>
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'MENU', 'acstarter' ); ?></button>
				<nav class="right-nav" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'right-nav') ); ?>
				</nav><!-- .right-nav -->
			</div><!-- wrapper -->
		</div><!--.row-2-->
	</header><!-- #masthead -->

	<div id="content" class="site-content wrapper">
