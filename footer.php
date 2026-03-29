<?php if (!defined('__TYPECHO_ROOT_DIR__'))
  exit; ?>

<link rel="stylesheet" href="<?php $this->options->themeUrl('/assets/css/footer.css'); ?>">
<footer class="footer">
  <div class="footer-container">
    <div class="footer-copyright">
      &copy; <?php echo date('Y'); ?> <a
        href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
      Powered by <a href="http://typecho.org" target="_blank">Typecho</a> on <a href="" target="_blank">雨</a> Theme.
    </div>

    <div class="footer-beian">
      <?php if ($this->options->beian): ?>
        <i class="ri-shield-check-fill"></i>
        <a href="https://beian.miit.gov.cn/" target="_blank" rel="nofollow">
          <?php $this->options->beian(); ?>
        </a>
      <?php endif; ?>
    </div>
  </div>
</footer>

<?php $this->footer(); ?>
</body>

</html>