<aside class="wrapper archives-recent">
	<div class="recent">
		<?php $recent_title = get_field("recent_title","option");
		if($recent_title):?>
			<header>
				<h2><?php echo $recent_title;?></h2>
			</header>
		<?php endif;?>
		<?php $args = array(
			'post_type'=>'post',
			'posts_per_page'=>10,
			'orderby'=>'date',
			'order'=>'ASC',
		);
		$query = new WP_Query($args);
		if($query->have_posts()):?>
			<ul class="list">
				<?php while($query->have_posts()):$query->the_post();?>
					<li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
				<?php endwhile;?>
			</ul><!--.list-->
		<?php wp_reset_postdata();
		endif;?>
	</div><!--.archives-->
	<div class="archives">
		<?php $archives_title = get_field("archives_title","option");
		if($archives_title):?>
			<header>
				<h2><?php echo $archives_title;?></h2>
			</header>
		<?php endif;?>
		<ul class="list">
			<?php wp_get_archives(array('type'=>'monthly')); ?>
		</ul>
	</div><!--.archives-->
</aside><!--.wrapper.quicklinks-->