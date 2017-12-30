
<div class="sidebar">
<ul>
        <li id="search">
                <h2><div class="side-title">
                <?php _e("Search") ?>
                </div></h2>
                <?php include(TEMPLATEPATH.'/searchform.php'); ?>
        </li>
        <li>
                <h2><div class="side-title"><?php _e('Categories'); ?></div></h2>
                <ul>
			<?php wp_list_categories('sort_column=name&optioncount=1&hierachical=0&title_li='); ?>
                </ul>
        </li>
	<li>
		<h2><div class="side-title"><?php _e('标签'); ?></dev></h2>
		<?php wp_tag_cloud('smallest=12&largest=25&unit=px&number=32&orderby=count&order=RAND');?>
	</li>
        <li>
                <h2><div class="side-title"><?php _e('Archives'); ?></div></h2>
                <ul>
                        <?php wp_get_archives('type=monthly'); ?>
                </ul>
        </li>
        <li>
                <h2><div class="side-title"><?php _e('Comments'); ?></div></h2>
                <ul>
                        <?php $args = array(
                            'number' => 15,
                            'status' => 'approve',
                            'type' => 'comment',
                            'user_id' => 0,
                            'search' => '',
                            'count' => false,
                            'meta_key' => '',
                            'meta_value' => '',
                            'meta_query' => '',
                        ); ?>

               <?php
                        $comments = get_comments( $args );
                        $output = '';
                        $comment_tbl=array();

                        foreach($comments as $comment) {
                                $i = 0;
                                for($i = 0; $i < count($comment_tbl); $i++) {
                                        if ($comment_tbl[$i]->comment_post_ID == $comment->comment_post_ID) {
                                                break;
                                        }
                                }
                                if ($i >= count($comment_tbl)) {
                                        array_push($comment_tbl, $comment);
                                }
                        }
                        foreach($comment_tbl as $comment) {
                                $random = mt_rand(1, 10);
                                //去除评论内容中的标签
                                $comment_content = strip_tags($comment->comment_content);
                                //评论可能很长,所以考虑截断评论内容,只显示10个字
                                $short_comment_content = mb_strimwidth($comment_content ,0, 60, "...");

                                $output .= '<p><a href="';
 //评论内容和链接
                                $output .= get_permalink( $comment->comment_post_ID ) .'" title="'.get_post( $comment->comment_post_ID )->post_title .'">';
                                $output .= get_post( $comment->comment_post_ID )->post_title .'</a>';
                                $output .= ' (' .get_post($comment->comment_post_ID)->comment_count .')';
                                $output .= '</p>';
                                $output .= $comment->comment_author .':' .$short_comment_content;

                                //评论内容和链接
                        }
                         //输出
                         echo $output;

               ?>
                </ul>
	</li>
	<li>
		<h2><div class="side-title"><?php _e('本站公众号'); ?></div></h2>
		<ul>
			<img src="wp-content/themes/Simple3.8.1/code.jpg" alt="我的二维码" height="200" width="200">
		</ul>
        <li>
                <h2><div class="side-title"><?php _e('友情链接'); ?></div></h2>
                <ul>
			<li>
			<a href="http://blog.javayc.com" title="于超博客">于超博客</a>
			</li>
                        <li>
			<a href="http://nonblock.cn" title="Qwerty的Blog">Qwerty的Blog</a>
                        </li>

		</ul>
	</li>
        <li>
                <h2><div class="side-title"><?php _e('Meta'); ?></div></h2>
                <ul>
                        <li>
                        <?php wp_list_bookmarks(); ?>
                        </li>
				<li><a href="<?php bloginfo('rss2_url'); ?>" title="使用RSS 2.0订阅本站点内容"><abbr title="Really Simple Syndication">RSS</abbr></a></li>
                        <?php wp_register(); ?>
                        <li><?php wp_loginout(); ?></li>
                        <?php wp_meta(); ?>
                </ul>
	</li>
</ul>
</div>
