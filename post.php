<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<section id="content">
    <div class="body_container">
        <div id="layout">
            <div class="post posts post-page">
                <div class="pure-g">
                    <div class="pure-u-1 pure-u-md-7-8 pure-u-lg-3-4 post-body">
                        <h1 class="post-title"><?php $this->title(); ?></h1>
                        <div class="post-content">
                            <?php $this->content(); ?>
                        </div>
                    </div>

                    <div class="pure-u-1 pure-u-md-7-8 pure-u-lg-1-4 post-body">
                        <div class="post-meta">
                            <ul>
                                <li><time datetime="2020-12-15T09:55:00+08:00" itemprop="datePublished"><?php $this->date('F j, Y'); ?></time></li>
                                <li><span><?php $this->commentsNum('%d comments'); ?></span></li>
                            </ul>
                        </div>
                        <section class="post-articles hidden-if-lg"></section>
                        <div class="js-content hidden-if-lg">
                            <?php $this->related(5)->to($relatedPosts); ?>
                            <div class="title--right sulli">
                                更多内容
                            </div>
                            <?php while ($relatedPosts->next()): ?>
                            <div class="elevatePost-item">
                                <h4><a class="link" href="<?php $relatedPosts->permalink(); ?>"><?php $relatedPosts->title() ?></a></h4>
                                <div class="meta JiEun">
                                    <time datetime="2020-12-15T09:55:00+08:00" itemprop="datePublished"><?php $this->date('F j, Y'); ?></time>
                                </div>
                            </div>
                            <?php endwhile; ?>



                        </div>
                    </div>

                    <?php $this->need('comments.php'); ?>


                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->need('footer.php'); ?>