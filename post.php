<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="wrap">
    <header class="page-header">
        <div class="title_area">
            <h3 class="poppin_l">Article</h3>
            <p class="jp noto_l">博客文章</p>
        </div>
    </header>
    <div class="post_body" id="main" role="main">
        <article class="post">
            <h1 class="post-title"><?php $this->title() ?></h1>
            <ul class="post-meta">
                <li><?php _e('作者: '); ?><a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a></li>
                <li><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>"><?php $this->date(); ?></time></li>
                <li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
            </ul>
            <div class="post-content">
                <?php $this->content(); ?>
            </div>
            <p class="tags"><?php _e('标签: '); ?><?php $this->tags(', ', true, 'none'); ?></p>
        </article>

        <?php $this->need('comments.php'); ?>

        <ul class="post-near">
            <li class="post-near-left">上一篇: <?php $this->thePrev('%s','没有了'); ?></li>
            <li class="post-near-right">下一篇: <?php $this->theNext('%s','没有了'); ?></li>
        </ul>
    </div><!-- end #main-->
</div>
<?php $this->need('footer.php'); ?>
