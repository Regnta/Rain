<?php
/**
 * 一款个人使用开源主题
 * @package 雨
 * @author Rain (iiieta)
 * @version 1.0.0
 * @link https://github.com/Regnta
 */

if (!defined('__TYPECHO_ROOT_DIR__'))
  exit;
$this->need('header.php');
?>

<link rel="stylesheet" href="<?php $this->options->themeUrl('/assets/css/index.css'); ?>">
<main class="main-container">
  <div class="content-wrapper">

    <!-- <h1 class="page-title"><?php //$this->options->title(); ?></h1> -->
    <!-- <p class="page-description"><?php //$this->options->description(); ?></p> -->
    <header class="page-header">
      <?php if ($this->options->site_title): ?>
        <h1 class="page-title"><?php $this->options->site_title(); ?></h1>
      <?php else: ?>

      <?php endif; ?>

      <?php if ($this->options->site_describe): ?>
        <p class="page-description"><?php $this->options->site_describe(); ?></p>
      <?php else: ?>

      <?php endif; ?>
    </header>

    <div class="layout-container">
      <div class="content-area">
        <section class="post-list">
          <?php if ($this->have()): ?>
            <?php while ($this->next()): ?>
              <article class="simple-card">
                <?php if (isset($this->fields->thumbnail)): ?>
                  <div class="card-image">
                    <a href="<?php $this->permalink() ?>">
                      <img src="<?php $this->fields->thumbnail(); ?>" alt="thumbnail">
                    </a>
                  </div>
                <?php endif; ?>

                <div class="card-content">
                  <div class="card-meta">
                    <span class="category"><i class="ri-folder-line"></i>
                      <?php $this->category(','); ?>
                    </span>
                    <span class="date"><i class="ri-calendar-line"></i>
                      <?php $this->date('Y-m-d'); ?>
                    </span>
                  </div>

                  <h2 class="card-title">
                    <a href="<?php $this->permalink() ?>">
                      <?php $this->title() ?>
                    </a>
                  </h2>

                  <div class="card-excerpt">
                    <?php $this->excerpt(80, '...'); ?>
                  </div>

                  <div class="card-footer">
                    <div class="footer-left">
                      <span class="read-more">
                        <a href="<?php $this->permalink() ?>">
                          阅读全文
                          <i class="ri-arrow-right-up-line"></i>
                        </a>
                      </span>
                    </div>
                    <div class="footer-right">
                      <span><i class="ri-chat-3-line"></i>
                        <?php $this->commentsNum('%d'); ?>
                      </span>
                    </div>
                  </div>
                </div>
              </article>
            <?php endwhile; ?>
          <?php else: ?>
            <p class="nothing-found">空空如也...</p>
          <?php endif; ?>
        </section>

        <nav class="pagination-simple">
          <?php $this->pageNav('<i class="ri-arrow-left-line"></i> 上一页', '下一页 <i class="ri-arrow-right-line"></i>'); ?>
        </nav>
      </div>

      <?php $this->need('sidebar.php'); ?>
    </div>
  </div>
</main>

<?php $this->need('footer.php'); ?>