<?php if (!defined('__TYPECHO_ROOT_DIR__'))
  exit; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php if ($this->options->iconUrl): ?>
    <link rel="icon" href="<?php $this->options->iconUrl() ?>" type="image/x-icon">
  <?php endif; ?>

  <title><?php $this->archiveTitle('', '', ' - '); ?><?php $this->options->title(); ?></title>

  <?php $this->header(); ?>

  <link rel="stylesheet" href="<?php $this->options->themeUrl('/assets/css/style.css'); ?>">
  <link rel="stylesheet" href="<?php $this->options->themeUrl('/assets/css/header.css'); ?>">
  <link rel="stylesheet" href="<?php $this->options->themeUrl('/assets/css/lib/remixicon_v4.9.1.css'); ?>">
</head>

<body>

  <header class="site-header">
    <div class="header-container">
      <div class="site-logo">
        <a href="<?php $this->options->siteUrl(); ?>">
          <?php if ($this->options->logoUrl): ?>
            <img src="<?php $this->options->logoUrl(); ?>" alt="<?php $this->options->title(); ?>">
          <?php else: ?>
            <span class="logo-text">
              <?php $this->options->title(); ?>
            </span>
          <?php endif; ?>
        </a>
      </div>

      <nav class="site-nav">
        <ul class="nav-list">
          <li<?php if ($this->is('index')): ?> class="current" <?php endif; ?>>
            <a href="<?php $this->options->siteUrl(); ?>">
              首页
            </a>
            </li>
            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
            <?php while ($pages->next()): ?>
              <li<?php if ($this->is('page', $pages->slug)): ?> class="current" <?php endif; ?>>
                <a href="<?php $pages->permalink(); ?>">
                  <?php $pages->title(); ?>
                </a>
                </li>
              <?php endwhile; ?>
        </ul>
      </nav>

    </div>
  </header>