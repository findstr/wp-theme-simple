﻿<?php get_header(); ?>

<div style="display: flex; flex-direction: row">
<div id="container">
        <?php if(have_posts()): query_posts($query_string. '&orderby=data&showposts=10'); ?><?php while(have_posts()) : the_post(); ?>
                <div class="post">
                        <h2><?php the_title(); ?></h2>

                        <div class="entry">
                                <?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 450,"……"); ?>
                                <p class="postmetadata">
                                        <ul>
                                        <li>
                                                <?php the_author_link(); ?>
                                                <?php _e('提交于:'); ?>
                                                <?php the_time('Y-m-d'); ?>
                                        </li> |
                                        <li>
                                                <a rel="more-link" href="<?php the_permalink() ?>"?>固定链接</a>
                                        </li> |
                                        <li>
                                                <?php comments_popup_link('评论(0)', '评论(1)', '评论(%)' );?>
                                        </li>
                                        </ul>
                                </p>
                        </div>
                </div>
		<?php endwhile; ?>
		<div class="load-more">
			<? next_posts_link('更多','');?>
		</div>
		<script src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
		<script src="<?php echo get_template_directory_uri();?>/more.js"></script>
	<?php else: ?>
                <div class="post">
                        <h2><?php_e("Not Found"); ?></h2>
                </div>
	<?php endif; ?>
</div>

<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>
</div>
</body>
</html>
