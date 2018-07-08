<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

    <div>
        <div class="archive-title-body">
            <h3 class="archive-title"><?php $this->archiveTitle(array(
                'category'  =>  _t('分类 %s 的文章'),
                'search'    =>  _t('关键字 %s 的文章'),
                'tag'       =>  _t('标签 %s 的文章'),
                'author'    =>  _t('%s 发布的文章')
            ), '', ''); ?></h3>
        </div>
        <?php if ($this->have()): ?>
        <?php while($this->next()): ?>
        <div class="wrap">
            <div class="post_body">
                <article class="post">
                    <h2 class="post-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
                    <ul class="post-meta">
                        <li><?php _e('作者: '); ?><a href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></li>
                        <li><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>"><?php $this->date(); ?></time></li>
                        <li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
                        <li><a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a></li>
                    </ul>
                    <div class="post-content">
                        <?php $this->content('- 阅读剩余部分 -'); ?>
                    </div>
                </article>
            </div>
        </div>
    	<?php endwhile; ?>
        <?php else: ?>
        <div class="wrap">
            <div class="post_body">
            <article class="post">
                <h2 class="post-title" style="text-align: center;"><?php _e('没有找到内容'); ?></h2>
            </article>
            </div>
        </div>
        <?php endif; ?>
        <nav class="navigation pagination">          
            <div class="nav-links">
            <?php $this->pageNav('PREV', 'NEXT',1); ?>
            </div>
        </nav>
    </div><!-- end #main -->

	<?php $this->need('footer.php'); ?>
