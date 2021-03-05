<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<section id="content">
    <div class="body_container">
        <div id="layout">
            <div class="pure-g">
                <div class="pure-u-1 pure-u-md-7-8 pure-u-lg-3-4 page-body">
                    <div class="post post-page">
                        <div class="post-head">
                            <h1 class="post-title"><?php $this->title(); ?></h1>
                            <span class="views-num"><?php $this->commentsNum('%d 条评论'); ?></span>
                        </div>
                        <div class="post-content">
                            <?php $this->content(); ?>
                        </div>

                    </div>
                    
                    <?php $this->need('comments.php'); ?>

                </div>




            </div>
        </div>
    </div>
</section>

<?php $this->need('footer.php'); ?>