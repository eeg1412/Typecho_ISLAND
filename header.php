<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html class="no-js">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>

    <!-- 使用url函数转换相关路径 -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/reset.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/common.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('/js/highlight/styles/arduino-light.css'); ?>">
    <script src="<?php $this->options->themeUrl('js/jquery-1.12.4.min.js'); ?>" type="text/javascript"></script>

    <!--[if lt IE 9]>
    <script src="//cdnjscn.b0.upaiyun.com/libs/html5shiv/r29/html5.min.js"></script>
    <script src="//cdnjscn.b0.upaiyun.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>
<body>
<!--[if lt IE 8]>
    <div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.</div>
<![endif]-->
<header id="masthead" class="site-header" role="banner">
  <div class="navigation-top">
    <ul class="hdr_menu">
      <li class="island_logo_box">
      <?php if ($this->options->logoUrl): ?>
        <a id="logo" href="<?php $this->options->siteUrl(); ?>">
            <img src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" />
        </a>
      <?php else: ?>
        <a id="logo" href="<?php $this->options->siteUrl(); ?>">
            <img src="<?php $this->options->themeUrl('img/ftr_logo.png'); ?>" />
        </a>
      <?php endif; ?>
      </li>

      <li class="menu-item menu-item-type-post_type menu-item-object-page">
        <a href="<?php $this->options->siteUrl(); ?>">
          <p class="ja">首页</p>
          <p class="en">top</p>
          <div class="line"></div>
        </a>
      </li>

      <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
      <?php while($pages->next()): ?>
      <li class="menu-item menu-item-type-post_type menu-item-object-page">
        <a href="<?php $pages->permalink(); ?>">
          <p class="ja"><?php $pages->title(); ?></p>
          <p class="en">
          <?php
          if(isset($pages->fields->en)){
            echo $pages->fields->en;
            }else{
            echo 'page';
            }
            ?>
          </p>
          <div class="line"></div>
        </a>
      </li>
      <?php endwhile; ?>

    </ul>
  </div>
</header>
<div id="menu_btn" class="sp">
  <a href="#">
    <span></span><span></span><span></span>
  </a>
</div>
<div id="bg_can"></div>
<div id="body">
    <div class="container">
        <div class="row">

    
    
