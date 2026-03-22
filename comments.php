<?php if (!defined('__TYPECHO_ROOT_DIR__'))
  exit; ?>

<link rel="stylesheet" href="<?php $this->options->themeUrl('/assets/css/comments.css'); ?>">
<div id="comments" class="comments-area">
  <?php $this->comments()->to($comments); ?>

  <h3 class="comments-title"><?php $this->commentsNum("暂无评论", "壹条评论", "%d 条评论"); ?></h3>

  <?php if ($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond">
      <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
        <?php if ($this->user->hasLogin()): ?>
          <p class="auth-status">登录身份:
            <a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a> ·
            <a href="<?php $this->options->logoutUrl(); ?>" title="Logout">退出 »</a>
          </p>
        <?php else: ?>
          <div class="comment-inputs">
            <input type="text" name="author" placeholder="昵称 *" value="<?php $this->remember('author'); ?>" required />
            <input type="email" name="mail" placeholder="邮箱 *" value="<?php $this->remember('mail'); ?>" required />
            <input type="url" name="url" placeholder="网址" value="<?php $this->remember('url'); ?>" />
          </div>
        <?php endif; ?>
        <textarea name="text" id="textarea" placeholder="撰写评论..." required><?php $this->remember('text'); ?></textarea>
        <div class="comment-button">
          <button type="submit" class="submit">提交评论</button>
          <div class="cancel-reply"><?php $comments->cancelReply('取消回复'); ?></div>
        </div>
      </form>
    </div>
  <?php endif; ?>

  <?php if ($comments->have()): ?>
    <div class="comment-list-container">
      <?php $comments->listComments(); ?>
    </div>
    <div class="comment-page"><?php $comments->pageNav('«', '»'); ?></div>
  <?php endif; ?>
</div>