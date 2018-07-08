<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

    <div class="col-mb-12 col-tb-8 col-tb-offset-2">
        <div class="archive-title-body">
            <h3 class="archive-title">404 - <?php _e('页面没找到'); ?></h3>
        </div>

        <div class="wrap">
        <div class="post_body">
                <article class="post">
                <p class="error_tips"><?php _e('你想查看的页面已被转移或删除了, 要不要搜索看看？ '); ?></p>
                <form method="post" class="error_form">
                    <p><input type="text" name="s" class="text" autofocus /></p>
                    <p><button type="submit" class="submit blog_btn"><?php _e('搜索'); ?></button></p>
                </form>
            </div>
        </div>
    </div>

    </div><!-- end #content-->
	<?php $this->need('footer.php'); ?>
