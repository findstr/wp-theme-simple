﻿<?php get_header(); ?>
<div id="scontainer">
        <?php if(have_posts()): ?><?php while(have_posts()) : the_post(); ?>
		<div itemscope itemtype="http://schema.org/Article" class="post">

			<meta itemprop="mainEntityOfPage" content="<?php the_permalink() ?>"/>
			<meta itemprop="dateModified" content="<?php the_modified_time('Y-m-j'); ?>T<?php the_modified_time('G:i'); ?>" />
                        <div itemscope itemtype="https://schema.org/Organization" itemprop="publisher" content="<?php the_time('Y-m-d'); ?>"/>
                        	<meta itemprop="name" content="<?php the_time('Y-m-d'); ?>" />
                           	<div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                             		<meta itemprop="url" content="<?php the_permalink() ?>/favicon.ico" />
                              	</div>
                	</div>
                        <h2 itemprop="headline"><?php the_title(); ?></h2>

			<div class="entry">
				<span itemprop="articleBody">
                                <?php the_content() ?>
				</span>
                        </div>
		</div>
		 <div class="navigation">
                    	<ul>
                       	<li>
                       		<?php if (get_previous_post()) { previous_post_link('上一篇:%link'); } else { echo "上一篇:没有了";} ?>
                        </li>
                        <li>
                       		<a href="<?php bloginfo('url'); ?>">首页</a>
                        </li>
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
