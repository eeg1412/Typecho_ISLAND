<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="wrap">
    <div class="post_body type_page" id="main" role="main">
        <article class="post">
            <h1 class="post-title"><?php $this->title() ?></h1>
            <div class="post-content">
                <?php $this->content(); ?>
            </div>
        </article>

        <?php $this->need('comments.php'); ?>
    </div><!-- end #main-->
</div>

<?php $this->need('footer.php'); ?>
