<?php if (!defined('__TYPECHO_ROOT_DIR__'))
  exit; ?>

<link rel="stylesheet" href="<?php $this->options->themeUrl('/assets/css/sidebar.css'); ?>">
<aside class="sidebar-container">

  <?php if (!empty($this->options->sidebarBlock) && in_array('ShowSearch', $this->options->sidebarBlock)): ?>
    <div class="sb-widget">
      <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
        <div class="sb-search">
          <input type="text" id="s" name="s" class="text" placeholder="搜索文章" />
          <button type="submit"><i class="ri-search-line"></i></button>
        </div>
      </form>
    </div>
  <?php endif; ?>

  <?php if (!empty($this->options->sidebarBlock) && in_array('ShowAuthor', $this->options->sidebarBlock)): ?>
    <div class="sb-widget">
      <div class="sb-author">
        <div class="author-avatar">
          <?php
          $mail = strtolower(trim($this->author->mail));
          $hash = md5($mail);
          $url = "https://www.gravatar.com/avatar/" . $hash . "?s=100&d=mm&r=g";
          ?>
          <img src="<?php echo $url; ?>" alt="Avatar" class="my-avatar-class">
        </div>
        <div class="author-info">
          <h4><?php $this->author->screenName(); ?></h4>
          <p><?php $this->author->mail(); ?></p>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
    <div class="sb-widget">
      <div class="sb-widget-title">
        <i class="ri-archive-fill"></i>
        <h3 class="sb-title">分类</h3>
      </div>
      <ul class="sb-list">
        <?php $this->widget('Widget_Metas_Category_List')->parse('
                    <li><a href="{permalink}">{name} <span class="count">{count}</span></a></li>
                '); ?>
      </ul>
    </div>
  <?php endif; ?>

  <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
    <div class="sb-widget">
      <div class="sb-widget-title">
        <i class="ri-draft-fill"></i>
        <h3 class="sb-title">最新发布</h3>
      </div>
      <ul class="sb-recent">
        <?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=3')->parse('
                <li>
                    <a href="{permalink}">
                        <span class="post-date">{year}-{month}-{day}</span>
                        <span class="post-title">{title}</span>
                    </a>
                </li>
            '); ?>
      </ul>
    </div>
  <?php endif; ?>

  <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
    <div class="sb-widget">
      <div class="sb-widget-title">
        <i class="ri-message-3-fill"></i>
        <h3 class="sb-title">最近评论</h3>
      </div>
      <ul class="sb-comment-list">
        <?php $this->widget('Widget_Comments_Recent', 'pageSize=3')->to($comments); ?>
        <?php while ($comments->next()): ?>
          <li class="sb-comment-item">
            <div class="sb-comment-avatar">
              <?php $comments->gravatar(32); ?>
            </div>
            <div class="sb-comment-content">
              <div class="sb-comment-meta">
                <span class="sb-comment-author"><?php $comments->author(false); ?></span>
              </div>
              <a href="<?php $comments->permalink(); ?>" class="sb-comment-text-link">
                <?php $comments->excerpt(20, '...'); ?>
              </a>
            </div>
          </li>
        <?php endwhile; ?>
      </ul>
    </div>
  <?php endif; ?>

  <?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>
    <div class="sb-widget">
      <div class="sb-widget-title">
        <i class="ri-settings-fill"></i>
        <h3 class="sb-title">其它</h3>
      </div>
      <ul class="sb-settings">
        <?php if ($this->user->hasLogin()): ?>
          <li>
            <i class="ri-user-5-fill"></i>
            <a href="<?php $this->options->logoutUrl(); ?>">登出 (<?php $this->user->screenName(); ?>)</a>
          </li>
        <?php else: ?>
          <li>
            <i class="ri-user-5-fill"></i>
            <a href="<?php $this->options->adminUrl('login.php'); ?>">登录</a>
          </li>
        <?php endif; ?>
        <li>
          <i class="ri-game-2-fill"></i>
          <a href="<?php $this->options->adminUrl(); ?>" target="_blank">控制台</a>
        </li>
        <li>
          <i class="ri-rss-fill"></i>
          <a href="<?php $this->options->feedUrl(); ?>">文章 RSS</a>
        </li>
      </ul>
    </div>
  <?php endif; ?>

</aside>