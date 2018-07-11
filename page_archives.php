<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php 
/**
 * 归档
 *
 * @package custom
 */ 
$this->need('header.php'); ?>

<div class="wrap">
    <div class="post_body type_page type_girl" id="main" role="main">
        <article class="post">
            <h1 class="post-title"><?php $this->title() ?></h1>
            <div class="post-content">
            <?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);   
                    $year=0; $mon=0; $i=0; $j=0;  
                 $ml = $archives->options->rootUrl;
                   $output = ''; 
                    while($archives->next()):   
                
                        $year_tmp = date('Y',$archives->created);   
                        $mon_tmp = date('m',$archives->created);   
                        $y=$year; $m=$mon;   
                
                        if ($mon != $mon_tmp && $mon > 0) $output .= '</ul>';   
                        if ($year != $year_tmp && $year > 0) $output .= '</div>';   
                        if ($year != $year_tmp) {   
                            $year = $year_tmp;   
                            $output .= ' <div class="archive archive_year" data-date="'. $year .'"><h3>'. $year .'</h3>
                                      '; //输出年份   
                
                
                 if ($mon == $mon_tmp){
                 $year = $year_tmp;   
                            $mon = $mon_tmp;   
                if ($this->options->rewrite==0){
                      $output .=  ' <ul class="archive_posts archive_month" data-date="'. $year .''. $mon .'">
                                    <li><h4>
                                        <a class="guidang" href="' . $ml . '/index.php/'. $year .'/'. $mon .'">'. $mon .'月</a>
                                    </h4></li>'; //输出月份 
                }else{
                            $output .=  ' <ul class="archive_posts archive_month" data-date="'. $year .''. $mon .'">
                                    <li><h4>
                                        <a class="guidang" href="'. $ml .'/'. $year .'/'. $mon .'">'. $mon .'月</a>
                                    </h4></li>'; //输出月份 
                
                }
                }
                
                
                
                }  
                
                 if ($mon != $mon_tmp){
                
                 $year = $year_tmp;   
                            $mon = $mon_tmp;   
                if ($this->options->rewrite==0){
                  $output .=  ' <ul class="archive_posts archive_month" data-date="'. $year .''. $mon .'">
                                    <li><h4>
                                        <a class="guidang" href="' . $ml . '/index.php/'. $year .'/'. $mon .'">'. $mon .'月</a>
                                    </h4></li>'; //输出月份 
                }else{
                            $output .=  ' <ul class="archive_posts archive_month" data-date="'. $year .''. $mon .'">
                                    <li><h4>
                                        <a class="guidang" href="'. $ml .'/'.$year .'/'. $mon .'">'. $mon .'月</a>
                                    </h4></li>'; //输出月份 
                }
                }
                
                
                        $output .= '<li class="li_guidang archive_post archive_day" data-date="'.$year .''. $mon .''.date('d',$archives->created).'"> 
                                <a class="guidang" href="'.$archives->permalink .'">'. $archives->title .'</a>
                            </li>
                '; //输出文章日期和标题  
                
                    endwhile;   
                    $output .= '</ul></div>';   
                    echo $output;  
                ?>
                <?php $this->content(); ?>
            </div>
        </article>

        <?php $this->need('comments.php'); ?>
    </div><!-- end #main-->
</div>
<script src="<?php $this->options->themeUrl('js/girlScroll.js'); ?>" type="text/javascript"></script>
<?php $this->need('footer.php'); ?>
