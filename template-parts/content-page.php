<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-page"); ?>>
	<div class="wrapper cap clear-bottom">
		<section class="col-1">
			<header>
				<h1><?php the_title();?></h1>
			</header>
			<div class="copy">
				<?php the_content();?>
			</div><!--.copy-->
		</section><!--.col-2-->
		<?php get_template_part("template-parts/quicklinks");?>
	</div><!--.wrapper-->
</article><!-- #post-## -->
