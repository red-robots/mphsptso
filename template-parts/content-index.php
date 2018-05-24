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
                    'orderby'=>'meta_value_num',
                    'meta_key'=>'date',
                    'order'=>'ASC',
                    'meta_query'=>array(array(
                        'key'=>'date',
                        'value'=>$today,
                        'compare'=>'>='
                    ))
                );
                $query = new WP_Query($args);
                if($query->have_posts()):?>
                    <div class="news">
                        <?php while($query->have_posts()):$query->the_post();?>
                            <section class="post">
                                <?php $date = get_field("date");
                                if($date):?>
                                    <div class="date">
                                        <?php echo $date;?>
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
                <?php endif;
                $args = array(
                    'post_type'=>'event',
                    'posts_per_page'=>3,
                    'orderby'=>'meta_value_num',
                    'meta_key'=>'date',
                    'order'=>'ASC',
                    'meta_query'=>array(array(
                        'key'=>'date',
                        'value'=>$today,
                        'compare'=>'>='
                    ))
                );
                $query = new WP_Query($args);
                if($query->have_posts()):?>
                    <div class="events">
                        <?php while($query->have_posts()): $query->the_post();?>
                            <section class="event">
                                <?php $date = get_field("date");
                                if($date):?>
                                    <div class="date">
                                        <?php echo $date;?>
                                    </div><!--.date-->
                                <?php endif;?>
                                <header>
                                    <h3><?php the_title();?></h3>
                                </header>
                                <?php $time = get_field("time");
                                if($time):?>
                                    <div class="time">
                                        <?php echo $time;?>
                                    </div><!--.time-->
                                <?php endif;?>
                            </section><!--.event-->
                        <?php endwhile;?>
                    </div><!--.events-->
                    <?php $calendar_link = get_field("calendar_link","option");
                    $view_calendar_text = get_field("view_calendar_text","option");
                    if($view_calendar_text&&$calendar_link):?>
                        <div class="view-more">
                            <a href="<?php echo $calendar_link;?>"><?php echo $view_calendar_text;?></a>
                        </div><!--.view-more-->
                    <?php endif;
                    wp_reset_postdata();
                endif;?>
            </aside><!--.col.col-2-->
            <aside class="col col-3">
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
                                $link = $link['link'];
                                if($link&&$title):?>
                                    <li><a href="<?php echo $link;?>"><?php echo $title;?></a></li>    
                                <?php endif;?>
                            <?php endforeach;?>
                        </ul>
                    </div><!--.quick-links-->
                <?php endif;?>
                <?php $email_signup_link = get_field("email_signup_link","option");
                $email_signup_text = get_field("email_signup_text","option");
                if($email_signup_text&&$email_signup_link):?>
                    <div class="email-signup">
                        <a href="<?php echo $email_signup_link;?>"><?php echo $email_signup_text;?></a>
                    </div><!--.email-signup-->
                <?php endif;?>
            </aside><!--.col.col-3-->
        </div><!--.wrapper.cap-->
    </div><!--.row-3-->
</article><!-- #post-## -->
