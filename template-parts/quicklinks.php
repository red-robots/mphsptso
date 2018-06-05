<aside class="wrapper quicklinks">
	<?php $quick_links_title = get_field("quick_links_title","option");
	if($quick_links_title):?>
		<header>
			<h2><?php echo $quick_links_title;?></h2>
		</header>
	<?php endif;
	$quick_links = get_field("quick_links","option");
	if($quick_links):?>
		<div class="quick-links">
			<ul>
			<?php foreach($quick_links as $link):
					$title = $link['title'];
					$link_or_file = $link['link_or_file'];
					$file = $link['file'];
					$href = $link['link'];
					if(strcmp($link_or_file,'link')==0&&$href&&$title):?>
						<li><a href="<?php echo $href;?>" target="_blank"><?php echo $title;?></a></li>    
					<?php elseif(strcmp($link_or_file,'file')==0&&$file&&$title):?>
						<li><a href="<?php echo $file['url'];?>" target="_blank"><?php echo $title;?></a></li>
					<?php endif;?>
				<?php endforeach;?>
			</ul>
		</div><!--.quick-links-->
	<?php endif;?>
	<?php $email_signup_link = get_field("email_signup_link","option");
	$email_signup_text = get_field("email_signup_text","option");
	if($email_signup_text&&$email_signup_link):?>
		<div class="email-signup">
			<a class="button" target="_blank" href="<?php echo $email_signup_link;?>"><?php echo $email_signup_text;?></a>
		</div><!--.email-signup-->
	<?php endif;?>
</aside><!--.wrapper.quicklinks-->