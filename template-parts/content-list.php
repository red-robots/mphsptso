<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-list"); ?>>
    <?php get_template_part("template-parts/flexslider");?>
	<div class="wrapper cap clear-bottom">
		<section class="col-1">
			<header>
				<h1>
					<?php if(is_archive()):
						the_archive_title();
					else:
						the_title();
					endif;?>
				</h1>
			</header>
			<?php $read_more_text = get_field("read_more_text","option");
			$wp_query_holder = $wp_query;
			if(!is_archive()):
				$args = array(
					'post_type'=>'post',
					'paged'=>$paged,
					'posts_per_page'=>10
				);
				$wp_query = new WP_Query($args);?>
			<?php endif;
			if(have_posts()):?>
				<div class="post-list">
					<?php while(have_posts()): the_post();?>
						<div class="post">
							<h2><?php the_title();?></h2>
							<div class="copy">
								<?php the_excerpt();?>
							</div><!--.copy-->
							<?php if($read_more_text):?>
								<a class="button" href="<?php the_permalink();?>"><?php echo $read_more_text;?></a>
							<?php endif;?>
						</div><!--.post-->
					<?php endwhile;?>
				</div><!--.post-list-->
			<?php endif;?>
			<nav class="pagination">
				<?php pagi_posts_nav();?>
			</nav>
			<?php $wp_query = $wp_query_holder;?>
		</section><!--.col-2-->
		<?php get_template_part("template-parts/archives-recent");?>
	</div><!--.wrapper-->
</article><!-- #post-## -->
