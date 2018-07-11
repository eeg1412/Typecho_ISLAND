<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

        </div><!-- end .row -->
    </div>
</div><!-- end #body -->

<footer id="colophon" class="site-footer" role="contentinfo">
  <hr class="pc">
  <hr class="pc">
  <hr class="pc">
  <div class="wrpr">
    <div id="to_top" class="pc">
      <a href="#top">
        <div class="icon">
          <img class="def" src="<?php $this->options->themeUrl('img/to_top.png'); ?>" alt="page top" width="73" height="70">
          <img class="pc hvr" src="<?php $this->options->themeUrl('img/to_top_hvr.png'); ?>" alt="page top" width="73" height="70"></div>
      </a>
    </div>
    <div class="pc ftr_logo">
    <?php if ($this->options->logoUrl): ?>
      <a href="<?php $this->options->siteUrl(); ?>">
            <img src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" width="151" height="auto" />
        </a>
      <?php else: ?>
        <a href="<?php $this->options->siteUrl(); ?>">
            <img src="<?php $this->options->themeUrl('img/ftr_logo.png'); ?>" width="151" height="auto" />
        </a>
      <?php endif; ?>
    </div>
    <div class="copyright">
      <div class="wrpr">
        <p>
          <span class="poppin_200">&copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
    <?php _e('由 <a href="http://www.typecho.org">Typecho</a> 强力驱动'); ?> <span class="blog_icp">Theme By <a href="http://www.wikimoe.com" target="_blank">Hiroki</a></span></p>
        <p><span class="poppin_200"><a href="http://www.miibeian.gov.cn" target="_blank" style="color: inherit;"><?php $this->options->icp() ?></a><?php $this->options->Tongji() ?></span></p>
      </div>
    </div>
  </div>
  <!-- .wrap --></footer>
<script src="<?php $this->options->themeUrl('js/jquery.easing.js'); ?>" type="text/javascript"></script>
<script src="<?php $this->options->themeUrl('js/pixi.min.js'); ?>" type="text/javascript"></script>
<script src="<?php $this->options->themeUrl('js/background.js'); ?>" type="text/javascript"></script>
<script src="<?php $this->options->themeUrl('js/common.js'); ?>" type="text/javascript"></script>
<script src="<?php $this->options->themeUrl('/js/highlight/highlight.pack.js'); ?>"></script>
<script>hljs.initHighlightingOnLoad();</script>

<?php $this->footer(); ?>
</body>
</html>
