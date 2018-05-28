<?php $flexslider = get_field("flexslider");
if($flexslider):?>
	<div class="flexslider row-1">
		<ul class="slides">
			<?php foreach($flexslider as $slide):?>
				<?php if($slide['image']):?>
					<li><img src="<?php echo $slide['image']['url'];?>" alt="<?php echo $slide['image']['alt'];?>"></li>
				<?php endif;?>
			<?php endforeach;?>
		</ul><!--.slides-->
	</div><!--.flexslider-->
<?php endif;?>