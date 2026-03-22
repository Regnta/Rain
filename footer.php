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

<script src="https://cdn.jsdelivr.net/npm/echarts@5.4.3/dist/echarts.min.js"></script>
<script type="module">
  import mermaid from 'https://cdn.jsdelivr.net/npm/mermaid@11.13.0/+esm';

  // 初始化 Mermaid
  mermaid.initialize({
    startOnLoad: false,
    theme: 'base',
    themeVariables: { primaryColor: '#4a90e2', fontFamily: 'inherit' }
  });

  const renderCharts = async () => {
    // 1. 处理 Mermaid (流程图、甘特图、序列图)
    const mermaidBlocks = document.querySelectorAll('pre code.lang-mermaid');
    for (const code of mermaidBlocks) {
      const pre = code.parentNode;
      const div = document.createElement('div');
      div.className = 'mermaid';
      div.textContent = code.textContent.trim();
      pre.parentNode.replaceChild(div, pre);
    }
    await mermaid.run();

    // 2. 处理 Echarts (饼图、柱状图)
    const echartsBlocks = document.querySelectorAll('pre code.lang-echarts');
    echartsBlocks.forEach((code, i) => {
      const pre = code.parentNode;
      const container = document.createElement('div');
      container.style.height = '400px';
      container.style.width = '100%';
      container.style.margin = '20px 0';
      pre.parentNode.replaceChild(container, pre);

      try {
        const myChart = echarts.init(container);
        const option = JSON.parse(code.textContent.trim());
        myChart.setOption(option);
        // 响应式自适应
        window.addEventListener('resize', () => myChart.resize());
      } catch (e) {
        container.innerHTML = `<p style="color:red;">Echarts 解析失败: ${e.message}</p>`;
      }
    });
  };

  document.addEventListener('DOMContentLoaded', renderCharts);
</script>
</body>

</html>