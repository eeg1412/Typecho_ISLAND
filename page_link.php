<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php
/**
 * 友链
 *
 * @package custom
 */ 
$this->need('header.php'); ?>

<div class="wrap">
    <div class="post_body type_page" id="main" role="main">
        <article class="post">
            <h1 class="post-title"><?php $this->title() ?></h1>
            <div class="post-content">
                <div class="page_link_body">
                	<div id="page_link_box" class="clearfix"></div>
                    <div id="page_link_content">
                    	<?php $this->content(); ?>
                    </div>
                </div>
            </div>
        </article>

        <?php $this->need('comments.php'); ?>
    </div><!-- end #main-->
</div>
<script>
$(document).ready(function() {
    var page_li_el = $('#page_link_content li');
	for(var i=0;i<page_li_el.length;i++){
		var li_i = page_li_el.eq(i);
		if(li_i[0].childElementCount === 2){
			if(li_i.find('a').length===1 && li_i.find('img').length===1){
				var link_url = li_i.find('a').attr('href');
				var icon_url = li_i.find('img').attr('src');
				var link_name = li_i.find('a').text().split("@$");
				var link_alt = li_i.find('img').attr('alt');
				var link_html = '<a href="'+link_url+'" class="post_item type_link"><div class="post_bg_body"><img alt="'+link_alt+'" src="'+icon_url+'" class="link_item_img"></div><p class="link_url_box">'+link_name[0]+'</p><p class="link_url_box_c">'+link_name[1]+'</p></a>';
				$('#page_link_box').append(link_html);
				li_i.remove();
			}
		}
		if(li_i[0].childElementCount === 1){
			if(li_i.find('a').length===1){
				var link_url = li_i.find('a').attr('href');
				var link_name = li_i.find('a').text().split("@$");;
				var link_html = '<a href="'+link_url+'" class="post_item type_link"><div class="post_bg_body"><img alt="'+link_name+'" src="'+'<?php $this->options->themeUrl('img/icon_1.jpg');?>'+'" class="link_item_img"></div><p class="link_url_box">'+link_name[0]+'</p><p class="link_url_box_c">'+link_name[1]+'</p></a>';
				$('#page_link_box').append(link_html);
				li_i.remove();
			}
		}
	}
});
</script>
<?php $this->need('footer.php'); ?>
