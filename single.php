﻿<?php get_header(); ?>

<div id="scontainer">
        <?php if(have_posts()): ?><?php while(have_posts()) : the_post(); ?>
                <div class="post">
                        <h2><?php the_title(); ?></h2>

                        <div class="entry">
                                <?php the_content() ?>
                                <p class="postmetadata">
                                        <ul>
                                        <li>
                                                <?php the_author_link(); ?>
                                                <?php _e('提交于:'); ?>
                                                <?php the_time('Y-m-d'); ?>
                                                <?php the_time('g:i a'); ?>
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
                <div class="navigation">
                                        <ul>
                                        <li>
                                        <?php if (get_previous_post()) { previous_post_link('上一篇:%link'); } else { echo "上一篇:没有了";} ?>
                                        </li> | 
                                        <li>
                                        <a href="<?php bloginfo('url'); ?>">首页</a>
                                        </li> | 
                                        <li>
                                        <?php if (get_next_post()) { next_post_link('下一篇:%link'); } else { echo "下一篇:没有了";} ?>
                                        </li>
                                        </ul>
                </div>
                <div class="responce">
                <?php comments_template(); ?>
                </div>
                <?php endwhile; ?>
       <?php else: ?>
                <div class="post">
                        <h2><?php_e("Not Found"); ?></h2>
                </div>
        <?php endif; ?>
</div>

<?php get_footer(); ?>

</div>

</body>

</html>