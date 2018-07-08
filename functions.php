<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点 LOGO 地址'), _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO'));
    $form->addInput($logoUrl);
    $Tongji = new Typecho_Widget_Helper_Form_Element_Textarea('Tongji', NULL, NULL, _t('站点统计代码'), _t('在这里填入站点统计代码，如百度统计，谷歌统计等。'));
    $form->addInput($Tongji);
    $icp = new Typecho_Widget_Helper_Form_Element_Text('icp', NULL, NULL, _t('工信部ICP备案号'), _t('此处填写工信部ICP备案号'));
  	$form->addInput($icp);
}

//缩略图调用
function showThumb($obj,$link=false){
    preg_match_all( "/<[img|IMG].*?src=[\'|\"](.*?)[\'|\"].*?[\/]?>/", $obj->content, $matches );
    $thumb = '';
    $options = Typecho_Widget::widget('Widget_Options');
    $attach = $obj->attachments(1)->attachment; 
    if (isset($attach->isImage) && $attach->isImage == 1){
        $thumb = $attach->url;   //附件是图片 输出附件
    }elseif(isset($matches[1][0])){
        $thumb = $matches[1][0];  //文章内容中抓到了图片 输出链接
    }
    
	//空的话输出默认随机图
	$thumb = empty($thumb) ? $options->themeUrl .'/img/blog_bg_'. mt_rand(1, 14) .'.jpg' : $thumb;

	
    if($link){
        return $thumb;
    }
	else{
		$thumb='<img src="'.$thumb.'">';
		return $thumb;
	}
	
}
/*
function themeFields($layout) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $layout->addItem($logoUrl);
}
*/

