<?php if (!defined('__TYPECHO_ROOT_DIR__'))
  exit; ?>
<?php $this->need('header.php'); ?>

<link rel="stylesheet" href="<?php $this->options->themeUrl('/assets/css/index.css'); ?>">
<link rel="stylesheet" href="<?php $this->options->themeUrl('/assets/css/post.css'); ?>">

<style>
  html,
  body {
    overflow-x: visible;
    width: 100%;
  }

  .main-container {
    display: flex;
    gap: 30px;
  }
</style>

<div class="main-container">
  <div class="content-area">
    <article class="post-card">
      <h1 class="post-title"><?php $this->title() ?></h1>
      <div class="post-content">
        <?php $this->content(); ?>
      </div>
    </article>

    <?php $this->need('comments.php'); ?>
  </div>

  <?php $this->need('sidebar.php'); ?>
</div>

<?php $this->need('footer.php'); ?>