﻿<?php get_header(); ?>

<div id="container">
        <?php if(have_posts()): ?><?php while(have_posts()) : the_post(); ?>
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
                                                <?php the_time('g:i a'); ?>
                                        </li>
                                        <li>
                                                <a rel="more-link" href="<?php the_permalink() ?>"?>固定链接</a>
                                        </li>
                                        <li>
                                                <?php comments_popup_link('评论(0)', '评论(1)', '评论(%)' );?>
                                        </li>
                                        </ul>
                                </p>
                        </div>
                </div>
                <?php endwhile; ?>
                <div class="navigation">
                        <?php posts_nav_link('in between', 'before', 'after'); ?>
                </div>
        <?php else: ?>
                <div class="post">
                        <h2><?php_e("Not Found"); ?></h2>
                </div>
        <?php endif; ?>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>

</div>
</body>
</html>
