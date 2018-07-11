<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php 
/**
 * 分类
 *
 * @package custom
 */ 
$this->need('header.php'); ?>

<div class="wrap">
    <div class="post_body type_page type_girl" id="main" role="main">
        <article class="post">
            <h1 class="post-title"><?php $this->title() ?></h1>
            <div class="post-content">
            <div class="tag_list_body">
          <?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?>
          <?php while($categorys->next()): ?>
          <?php if ($categorys->levels === 0): ?>
          <?php $children = $categorys->getAllChildren($categorys->mid); ?>
          <?php if (empty($children)) { ?>
          <a href="#posts-list-<?php $categorys->slug(); ?>" class="tag_item"  data-category="<?php $categorys->name(); ?>" ><?php $categorys->name(); ?>（<?php $categorys->count(); ?>篇）</a><?php } ?>
          <?php endif; ?>
          <?php endwhile; ?>
          <?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?>
          <?php while($categorys->next()): ?>
          <?php if ($categorys->levels === 0): ?>
          <?php $children = $categorys->getAllChildren($categorys->mid); ?>
          <?php if (empty($children)) { ?>
          <?php } else { ?>
          <br>
          <a class="tag tag--primary tag--small t-link"  data-category="<?php $categorys->name(); ?>"  onclick="var fu = document.getElementById('<?php $categorys->name(); ?>'); if (fu.style.display === 'none') {fu.style.display='inline';} else {fu.style.display='none'}"  target="_blank">
          <?php $categorys->name(); ?>
          &nbsp;<i class="fa fa-chevron-circle-right"></i> </a>
          <div id="<?php $categorys->name(); ?>" style="display: none;">
            <?php foreach ($children as $mid) { ?>
            <?php $child = $categorys->getCategory($mid); ?>
            <a href="#posts-list-<?php echo $child['slug']; ?> " class="tag tag--primary tag--small t-link"  data-category="<?php echo $child['name']; ?>" ><?php echo $child['name']; ?>(<?php echo $child['count']; ?>)</a>
            <?php } ?>
          </div>
          <?php } ?>
          <?php endif; ?>
          <?php endwhile; ?>
        </div>
        <div class="categories_list_body">
          <?php $this->widget('Widget_Metas_Category_List')->to($categories); ?>
          <?php while ($categories->next()): ?>
          <?php if(count($categories->children) === 0): ?>
          <?php $this->widget('Widget_Archive@category-' . $categories->mid, 'pageSize=10000&type=category', 'mid=' . $categories->mid)->to($posts); ?>
          <div id="posts-list-<?php $categories->name(); ?>" class="archive box" data-category="<?php $categories->name(); ?>">
            <h4 class="archive-title"> <a href="<?php $categories->permalink(); ?>" class="guidang" id="posts-list-<?php $categories->slug(); ?>">
              <?php $categories->name(); ?>
              </a> </h4>
            <ul class="archive_posts archive_month">
              <?php while ($posts->next()): ?>
              <li class="li_guidang archive_post archive_day"> <a class="guidang" href="<?php $posts->permalink(); ?>">
                <?php $posts->title(40); ?>
                </a> <span class="cate_date">——<?php $posts->date(); ?></span> </li>
              <?php endwhile; ?>
            </ul>
          </div>
          <?php else: ?>
          <?php endif; ?>
          <?php endwhile; ?>
        </div>
                <?php $this->content(); ?>
            </div>
        </article>

        <?php $this->need('comments.php'); ?>
    </div><!-- end #main-->
</div>
<script src="<?php $this->options->themeUrl('js/girlScroll.js'); ?>" type="text/javascript"></script>
<?php $this->need('footer.php'); ?>
