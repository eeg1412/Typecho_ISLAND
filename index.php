<?php if(isset($_GET['load_type']) and $_GET['load_type'] == 'ajax'):  ?>
<?php while($this->next()): ?>
          <div class="news_cell">
            <div class="top_area">
              <div class="thumb hvr_anim">
                <a href="<?php $this->permalink() ?>">
                  <img src="<?php echo showThumb($this,true); ?>" alt="island" width="260" height="146"></a>
              </div>
              <div class="noto_n category cat_event">
                <a href="<?php $this->permalink() ?>"><?php $this->category(',', false); ?></a></div>
            </div>
            <div class="info_area">
              <p class="title">
                <a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></p>
              <p class="date">
                <a href="<?php $this->permalink() ?>">
                  <span class="day poppin_b"><?php $this->date(); ?></span></a>
              </p>
            </div>
		    </div>
        <?php endwhile; ?>
        <nav class="navigation pagination">          
          <div class="nav-links">
            <?php $this->pageNav('PREV', 'NEXT',1); ?>
          </div>
        </nav>
    <?php return; //完成ajax方式返回，退出此页面?>
<?php endif ?>
<?php
/**
 * ISLAND风格模板
 * 
 * @package ISLAND
 * @author 广树
 * @version 0.1.2
 * @link http://wikimoe.com
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
<div class="island_top_banner" id="page">
<div id="loader" class="loader_body"><div class="wrpr"><div class="loader"><img src="<?php $this->options->themeUrl('img/loader.gif'); ?>" alt="now loading" width="48" height="48" /></div><p class="poppin_200">loading</p></div></div>
</div>
<div class="island_top_banner_sp">
  <img src="<?php $this->options->themeUrl('img/banner.jpg'); ?>" />
</div>
<div id="content" class="in-site-content">
  <div class="wrap">
    <header class="page-header">
      <div class="title_area">
        <h3 class="poppin_l anim">BLOG</h3>
        <p class="jp noto_l anim">博客文章</p></div>
    </header>
    <div id="primary" class="content-area anim">
      <main id="main" class="site-main" role="main">
      <div id="blogLoader" class="loader_body"><div class="wrpr"><div class="loader"><img src="<?php $this->options->themeUrl('img/loader.gif'); ?>" alt="now loading" width="48" height="48" /></div><p class="poppin_200">loading</p></div></div>
        <div class="news_list" id="newsList">
		      <?php while($this->next()): ?>
          <div class="news_cell">
            <div class="top_area">
              <div class="thumb hvr_anim">
                <a href="<?php $this->permalink() ?>">
                  <img src="<?php echo showThumb($this,true); ?>" alt="island" width="100%" height="100%"></a>
              </div>
              <div class="noto_n category cat_event">
                <a href="<?php $this->permalink() ?>"><?php $this->category(',', false); ?></a></div>
            </div>
            <div class="info_area">
              <p class="title">
                <a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></p>
              <p class="date">
                <a href="<?php $this->permalink() ?>">
                  <span class="day poppin_b"><?php $this->date(); ?></span></a>
              </p>
            </div>
		    </div>
        <?php endwhile; ?>
        <nav class="navigation pagination">          
          <div class="nav-links">
            <?php $this->pageNav('PREV', 'NEXT',1); ?>
          </div>
        </nav>
      </div>
      </main>
      <!-- #main -->
    </div>
  </div>
  <script>
    $('#newsList').on('click','.page-navigator a',function(){
			var href_ = $(this).attr('href');
			//$('.page-navigator').fadeOut(200);
			$('#blogLoader').fadeIn(200);
			jQuery.ajax({
				type: 'GET',
				url: href_+'?load_type=ajax',
				success: function(res) {
          $('#newsList').empty().append(res);
          $('#blogLoader').fadeOut(200);
					$('html, body').animate({scrollTop: ($('#content').offset().top)-91}, 300);
				},
				error:function(){
          alert('获取信息失败');
          $('#blogLoader').fadeOut(200);
				}
			});
			return false;
		});
  </script>
  <!-- .wrap -->
  </div>

<?php $this->need('footer.php'); ?>
