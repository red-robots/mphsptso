<?php
/**
 * Template part for displaying page content in index.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-index"); ?>>
    <?php get_template_part("template-parts/flexslider");?>
    <?php $tagline = get_field("tagline");
    $subline = get_field("subline");
    if($tagline||$subline):?>
        <div class="row-2">
            <div class="wrapper cap">
                <?php if($tagline):?>
                    <div class="copy tagline">
                        <?php echo $tagline;?>
                    </div><!--.tagline-->
                <?php endif;
                if($subline):?>
                    <div class="subline">
                        <?php echo $subline;?>
                    </div><!--.subline-->
                <?php endif;?>
            </div><!--.wrapper.cap-->
        </div><!--.row-2-->
    <?php endif;?>
    <div class="row-3">
        <div class="wrapper cap clear-bottom">
            <aside class="col col-1">
                <?php $today = date('Ymd');
                $recent_news_title = get_field("recent_news_title","option");
                $read_more_text = get_field("read_more_text","option");
                if($recent_news_title):?>
                    <header>
                        <h2><?php echo $recent_news_title;?></h2>
                    </header>
                <?php endif;
                $args = array(
                    'post_type'=>'post',
                    'posts_per_page'=>2,
                    'orderby'=>'date',
                    'order'=>'DESC'
                );
                $query = new WP_Query($args);
                if($query->have_posts()):?>
                    <div class="news">
                        <?php while($query->have_posts()):$query->the_post();?>
                            <section class="post">
                                <?php $date = get_field("date");
                                if($date):?>
                                    <div class="date">
                                        <?php echo (new DateTime($date))->format('n/j/Y');?>
                                    </div><!--.date-->
                                <?php endif;?>
                                <header>
                                    <h3><?php the_title();?></h3>
                                </header>
                                <div class="copy">
                                    <?php the_excerpt();?>
                                </div><!--.copy-->
                                <?php if($read_more_text):?>
                                    <div class="read-more">
                                        <a class="button" href="<?php the_permalink();?>"><?php echo $read_more_text;?></a>
                                    </div><!--.read-more-->
                                <?php endif;?>
                            </section><!--.post-->
                        <?php endwhile;?>
                    </div><!--.news-->
                    <?php wp_reset_postdata();
                endif;?>
            </aside><!--.col.col-1-->
            <aside class="col col-2">
                <?php $upcoming_events_title = get_field("upcoming_events_title","option");
                if($upcoming_events_title):?>
                    <header>
                        <h2><?php echo $upcoming_events_title;?></h2>
                    </header>
                <?php endif;?>
                <div class="wrapper">
                    <?php $calendar_id = get_field("calendar_id","option");
                    if($calendar_id):?>
                        <div class="events">
                            <?php echo do_shortcode('[calendar id="'.$calendar_id.'"]'); ?>
                        </div><!--.events-->
                    <?php endif;
                    $calendar_link = get_field("calendar_link","option");
                    $view_calendar_text = get_field("view_calendar_text","option");
                    if($view_calendar_text&&$calendar_link):?>
                        <div class="view-more">
                            <a href="<?php echo $calendar_link;?>"><?php echo $view_calendar_text;?></a>
                        </div><!--.view-more-->
                    <?php endif;?>
                </div><!--.wrapper-->
            </aside><!--.col.col-2-->
            <aside class="col col-3">
                <?php get_template_part("template-parts/quicklinks");?>
            </aside><!--.col.col-3-->
        </div><!--.wrapper.cap-->
    </div><!--.row-3-->
    <?php $sponsors = get_field("sponsors");
    if($sponsors):?>
        <div class="row-4">
            <div class="wrapper cap">
            <h2>Thank you to the following corporate sponsors.</h2>
                <?php foreach($sponsors as $sponsor):
                    $image = $sponsor['image'];
                    $link = $sponsor['link'];
                    if($link):?>
                        <a href="<?php echo $link;?>">
                    <?php endif;?>
                        <img src="<?php echo $image['sizes']['medium'];?>" alt="<?php echo $image['alt'];?>">
                    <?php if($link):?>
                        </a>
                    <?php endif;?>
                <?php endforeach;?>
            </div><!--.wrapper-->
        </div><!--.row-4-->
    <?php endif;?>
</article><!-- #post-## -->
