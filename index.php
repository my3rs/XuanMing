<?php
/**
 * 主题名暂定为 XuanMing，支持 typecho 1.1 版本及以上。详情请见 https://seahi.me
 *
 * @package Typecho XuanMing Theme
 * @author seaHi
 * @version 0.1
 * @link https://seahi.me
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<div id="container">

    <div class="content">
        <div class="body_container">
            <div class="layout">

                <?php while($this->next()): ?>

                <article class="post">
                    <div class="pure-g">
                        <div class="pure-u-1 pure-u-md-3-4">
                            <h2 class="post-title"><a href="<?php $this->permalink(); ?>"><?php $this->title() ?></a> </h2>
                            <div class="post-content"><?php $this->excerpt(140); ?>
                                <p class="more"><a href="<?php $this->permalink(); ?>" title="<?php $this->title() ?>">- 阅读剩余部分 -</a> </p>

                            </div>
                        </div>

                        <div class="pure-u-1 pure-u-md-1-4">
                            <div class="post-meta">
                                <ul>
                                    <li><time datetime="2020-12-15T09:55:00+08:00" itemprop="datePublished"><?php $this->date('F j, Y'); ?></time></li>
                                    <li><span><?php $this->commentsNum('%d comments'); ?></span></li>
                                </ul>
                            </div>
                        </div>
                </article>

                <?php endwhile; ?>

            </div>
        </div>
    </div>



            <div class="pure-u-1-1">
                <div class="paginator pager pagination">
                    <div class="paginator_container pagination_container">
                        <?php $this->pageLink('<x aria-label="Previous" class="newer-posts">上一页</x>'); ?> <?php $this->pageLink('<x aria-label="Next" class="older-posts">下一页</x>','next'); ?>
                        <div style="clear:both;height:0;">
                        </div>
                    </div>
                </div>
            </div>

            <?php $this->need('footer.php'); ?>
