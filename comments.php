<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>


<?php if($this->allow('comment')): ?>

    <div class="pure-u-1 pure-u-md-7-8 pure-u-lg-3-4 post-body">
        <div id="comments" class="doc_comments">
            <div id="respond-post-70" class="respond">
                <div class="cancel-comment-reply">
                    <a id="cancel-comment-reply-link" href="https://mrju.cn/70.html#respond-post-70" rel="nofollow" style="display:none" onclick="return TypechoComment.cancelReply();">取消回复</a>
                </div>
                <div id="response">
                    发表评论
                </div>
                <!-- 输入表单开始 -->
                <form id="new_comment_form" method="post" action="<?php $this->commentUrl() ?>" _lpchecked="1">
                    <div class="new_comment">
                        <!-- 输入要回复的内容 -->
                        <textarea name="text" rows="2" class="textarea_box" style="height: auto;" placeholder="人生在世，难免会写点错别字，没事儿~" required="required"></textarea>
                    </div>
                    <div class="comment_triggered" style="display: block;">
                        <div class="input_body">
                            <ul class="ident">
                                <li><input type="text" name="author" placeholder="昵称*" value="" required="required" /></li>
                                <li><input type="mail" name="mail" placeholder="邮件*" value="" required="required" /></li>
                                <li><input type="text" name="url" placeholder="网址" value="" /></li>
                            </ul>
                            <input type="submit" value="提交评论" class="comment_submit_button c_button" />
                        </div>
                    </div>
                </form>
            </div>

            <!-- 评论列表 -->
            <h3 class="other-title"><span>已有 <?php $this->commentsNum() ?> 条评论</span></h3>
            <ol class="comment-list">
                <?php $this->comments()->to($comments); ?>
                <?php while($comments->next()): ?>
                    <li itemscope="" itemtype="http://schema.org/UserComments" id="comment-1126" class="comment-body comment-parent comment-odd">
                        <!-- 评论者 -->
                        <?php $a = 'https://cdn.v2ex.com/gravatar/' . md5(strtolower($comments->mail)) . '?s=80&d=retro';?>
                        <div class="comment-author"  itemprop="creator" itemscope="" itemtype="http://schema.org/Person">
                            <span itemprop="image">
                                <img class="avatar" src="<?php echo $a ?>" alt="<?php echo $comments->author; ?>" width="32" height="32" />
                            </span>
                            <cite class="fn" itemprop="name"><?php $comments->author(); ?></cite>
                        </div>

                        <!-- 评论的元信息 -->
                        <div class="comment-meta">
                            <?php $comments->date('F jS, Y') ?>
                        </div>

                        <!-- 评论的内容 -->
                        <div class="comment-content" itemprop="commentText">
                            <p><?php $comments->content(); ?></p>
                        </div>

                        <!-- 评论的回复 -->
                        <div class="comment-reply">
                            <a href="<?php $comments->responseUrl();  ?>" rel="nofollow" onclick="return TypechoComment.reply('<?php echo $comments->theId(); ?>', 1126);">回复</a>
                            <?php echo $comments->theId(); ?>
                        </div>
                    </li>
                <?php endwhile; ?>
            </ol>

        </div>
    </div>
<?php endif; ?>

<?php $this->need('footer.php'); ?>


