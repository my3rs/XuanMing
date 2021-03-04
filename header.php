<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html class="no-js">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"/>
    <meta content="yes" name="apple-mobile-web-app-capable"/>
    <meta content="black" name="apple-mobile-web-app-status-bar-style"/>
    <meta content="telephone=no" name="format-detection"/>
    <meta name="renderer" content="webkit">

    <title>
        <?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?>

        <?php $this->options->title(); ?>
    </title>

    <!-- 使用url函数转换相关路径 -->
    <script type="text/javascript" src="<?php $this->options->themeUrl('jquery.js'); ?>"></script>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('custom.css'); ?>">


    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>

<body>
    <div class="container">
        <section id="header">
                <div class="body_container">
                    <div class="head">
                        <div class="header-title">
                            <h1><a id="logo" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a> </h1>
                            <nav class="nav-menu">
                                <ul class="site_nav">
                                    <li><a<?php if($this->is('index')): ?> class="current"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a></li>
                                    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                                    <?php while($pages->next()): ?>

                                        <li><a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>

                                    <?php endwhile; ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>

            <section id="header-fix">
                <div class="body_container">
                    <div class="head">
                        <div class="header-title">
                            <!-- 如果是文章页面 -->
                            <?php if ($this->is('post')): ?>
                                <h1 class="post-fix-left-logo"> <a id="logo" href="<?php $this->options->siteUrl() ?>"><?php $this->options->title() ?></a> </h1>
                                <h3 class="hidden-if-lg"><?php $this->title() ?></h3>
                                <div class="post-fix-value hidden-if-md">
                                    <span class="post-commentnums"><a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('%d 条评论'); ?></a></span>
                                    <span class="post-tags"><?php $this->tags(',', true, 'none'); ?></span>
                                </div>
                            <?php endif; ?>

                            <!-- 如果是独立页面 -->
                            <?php if ($this->is('index')): ?>
                                <h1><a id="logo" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a> </h1>
                                <div class="fix-value hidden-if-md">
                                    <span><em id="hitokoto">:D 获取中...</em></span>
                                </div>
                                <script src="https://v1.hitokoto.cn/?encode=js&amp;select=%23hitokoto" defer=""></script>
                            <?php endif; ?>

                            <nav class="nav-menu">
                                <ul class="site_nav">
                                    <li><a<?php if($this->is('index')): ?> class="current"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a></li>
                                    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                                    <?php while($pages->next()): ?>

                                        <li><a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>

                                    <?php endwhile; ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>

