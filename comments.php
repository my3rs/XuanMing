<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php $this->comments()->to($comments); ?>

<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }

    ?>

    <li itemscope="" itemtype="http://schema.org/UserComments" id="<?php $comments->theId(); ?>" class="comment-body<?php
    if ($comments->levels > 0) {
        echo ' comment-child';
        $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
    } else {
        echo ' comment-parent';
    }
    $comments->alt(' comment-odd', ' comment-even');
    echo $commentClass;
    ?>">
        <div class="comment-author" itemprop="creator" itemscope="" itemtype="http://schema.org/Person">
            <span itemprop="image">
                <?php $a = 'https://cdn.v2ex.com/gravatar/' . md5(strtolower($comments->mail)) . '?s=80&r=X';?>
                <img class="avatar" src="<?php echo $a ?>" alt="<?php echo $comments->author; ?>" width="32" height="32" />
            </span>
            <cite class="fn"  itemprop="name"><?php $comments->author(); ?></cite>
        </div>

        <div class="comment-meta">
            <a href="<?php $comments->permalink(); ?>"><?php $comments->date('Y-m-d H:i'); ?></a>
            <span class="comment-reply"><?php $comments->reply(); ?></span>
        </div>

        <div class="comment-content" itemprop="commentText">
            <p><?php $comments->content(); ?></p>
        </div>

        <div class="comment-reply">

            <a href="<?php $comments->responseUrl(); ?>" rel="nofollow" onclick="return TypechoComment.reply('<?php $comments->theId(); ?>', <?php echo $comments->coid; ?>);">回复</a>

        </div>

        <?php if ($comments->children) { ?>
            <div class="comment-children"  itemprop="discusses">
                <?php $comments->threadedComments($options); ?>
            </div>
        <?php } ?>
    </li>
<?php } ?>





<?php if($this->allow('comment')): ?>
    <?php if ($this->is('post')): ?>
        <div class="pure-u-1 pure-u-md-7-8 pure-u-lg-3-4 post-body">
    <?php endif; ?>

    <div id="comments" class="doc_comments">
        <!-- 评论框 -->
        <div id="respond-post-<?php echo $this->cid; ?>" class="respond">
            <div class="cancel-comment-reply">
                <a id="cancel-comment-reply-link" href="<?php echo $this->permalink() ?>#respond-post-<?php echo $this->cid; ?>" rel="nofollow" style="display:none" onclick="return TypechoComment.cancelReply();">取消回复</a>
            </div>

            <div id="response">
                发表评论
            </div>
            <!-- 输入表单开始 -->
            <form id="new_comment_form" method="post" action="<?php $this->commentUrl() ?>">
                <div class="new_comment">
                    <!-- 输入要回复的内容 -->
                    <textarea name="text" rows="2" class="textarea_box" style="height: auto;" placeholder="人生在世，难免会写点错别字，没事儿~" required="required"><?php $this->remember('text'); ?></textarea>
                </div>

                <!-- 如果当前用户已经登录 -->
                <?php if($this->user->hasLogin()): ?>
                    <div class="comment_triggered" style="display: block;">
                        <div class="input_body">
                            <ul class="ident">
                                <li>欢迎 <a href="<?php $this->options->adminUrl(); ?>"><?php $this->user->screenName(); ?></a>，<a href="<?php $this->options->index('Logout.do'); ?>" title="退出">退出</a></p></li>
                            </ul>
                            <input type="submit" value="提交评论" class="comment_submit_button c_button" />
                        </div>
                    </div>
                <!-- 如果当前用户未登录 -->
                <?php else: ?>
                    <div class="comment_triggered" style="display: block;">
                        <div class="input_body">
                            <ul class="ident">
                                <li><input type="text" name="author" class="text" placeholder="昵称*" value="<?php $this->remember('author'); ?>" required="required" /></li>
                                <li><input type="text" name="mail" class="text" placeholder="邮件*" value="<?php $this->remember('mail'); ?>" required="required" /></li>
                                <li><input type="text" name="url" class="text" placeholder="网址" value="<?php $this->remember('url'); ?>" /></li>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>

            </form>
        </div>

        <!-- 评论列表 -->
        <h3 class="other-title"><span><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></span></h3>

        <?php $this->comments()->to($comments); ?>
        <?php if ($comments->have()) : ?>
            <!-- 评论的内容 -->
            <?php $comments->listComments(); ?>
            <!-- 评论page -->
            <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
<!--            </div>-->
<!--        </div>-->
        <?php endif; ?>

    <?php if ($this->is('post')): ?>
        </div>
    <?php endif; ?>

</div>
<?php endif; ?>


