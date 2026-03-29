<?php if (!defined('__TYPECHO_ROOT_DIR__'))
  exit; ?>
<?php $this->need('header.php'); ?>

<link rel="stylesheet" href="<?php $this->options->themeUrl('/assets/css/post.css'); ?>">

<script src="<?php $this->options->themeUrl('/assets/js/lib/prism.js'); ?>"></script>
<link rel="stylesheet" href="<?php $this->options->themeUrl('/assets/css/lib/prism.css'); ?>">

<script src="<?php $this->options->themeUrl('/assets/js/post/post_toc.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('/assets/js/post/back_top.js'); ?>"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.44/dist/katex.min.css">
<script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.44/dist/katex.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.44/dist/contrib/auto-render.min.js"></script>

<main class="post-main-container">
  <div class="post-layout-container">
    <article class="post-render" itemscope itemtype="http://schema.org/BlogPosting">

      <nav class="post-nav-top">
        <a href="<?php $this->options->siteUrl(); ?>"><i class="ri-home-4-line"></i> 首页</a>
        <span class="sep">/</span>
        <span><?php $this->category(','); ?></span>
        <span class="sep">/</span>
        <span class="current">正文</span>
      </nav>

      <header class="post-header">
        <h1 class="post-title" itemprop="name headline">
          <?php $this->title() ?>
        </h1>
        <div class="post-meta">
          <span class="meta-item">
            <i class="ri-user-smile-line"></i> <?php $this->author(); ?>
          </span>
          <span class="meta-item">
            <i class="ri-calendar-todo-line"></i> <time
              datetime="<?php $this->date('c'); ?>"><?php $this->date(); ?></time>
          </span>
          <span class="meta-item">
            <i class="ri-chat-3-line"></i> <?php $this->commentsNum('%d 条评论'); ?>
          </span>
          <?php if ($this->user->hasLogin()): ?>
            <span class="meta-item edit-link">
              <a href="<?php $this->options->adminUrl('write-post.php?cid=' . $this->cid); ?>"><i
                  class="ri-edit-line"></i> 编辑</a>
            </span>
          <?php endif; ?>
        </div>
      </header>

      <div class="post-content" itemprop="articleBody">
        <?php $this->content(); ?>
      </div>

      <footer class="post-footer">
        <div class="post-tags">
          <i class="ri-price-tag-3-line"></i> <?php $this->tags(' ', true, '暂无标签'); ?>
        </div>

        <div class="post-copyright">
          <p>本站文章除注明转载外，均为本站原创。转载请注明出处。</p>
          <p>本文链接：<a href="<?php $this->permalink() ?>"><?php $this->permalink() ?></a></p>
        </div>
      </footer>

      <nav class="post-near">
        <div class="near-item prev">
          <span class="label">上一篇</span>
          <?php $this->thePrev('%s', '没有了'); ?>
        </div>
        <div class="near-item next">
          <span class="label">下一篇</span>
          <?php $this->theNext('%s', '没有了'); ?>
        </div>
      </nav>

      <?php $this->need('comments.php'); ?>

    </article>

    <aside class="post-toc-wrapper">
      <div class="post-toc">
        <div class="toc-title">
          <i class="ri-list-check"></i> 目录导航
        </div>
        <div id="toc-content" class="toc-content">
        </div>
      </div>
    </aside>

    <div id="back-to-top" class="back-to-top">
      <i class="ri-arrow-up-line"></i>
    </div>

  </div>
</main>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    renderMathInElement(document.querySelector('.post-content'), {
      delimiters: [
        { left: '$$', right: '$$', display: true },
        { left: '$', right: '$', display: false },
        { left: '\\(', right: '\\)', display: false },
        { left: '\\[', right: '\\]', display: true }
      ],
      throwOnError: false
    });
  });
</script>
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
    // 处理 Mermaid (流程图、甘特图、序列图)
    const mermaidBlocks = document.querySelectorAll('pre code.language-mermaid');
    for (const code of mermaidBlocks) {
      const pre = code.parentNode;
      const div = document.createElement('div');
      div.className = 'mermaid';
      div.textContent = code.textContent.trim();
      pre.parentNode.replaceChild(div, pre);
    }
    await mermaid.run();

    // 处理 Echarts (饼图、柱状图)
    const echartsBlocks = document.querySelectorAll('pre code.language-echarts');
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
        // 响应式
        window.addEventListener('resize', () => myChart.resize());
      } catch (e) {
        container.innerHTML = `<p style="color:red;">Echarts 解析失败: ${e.message}</p>`;
      }
    });
  };

  document.addEventListener('DOMContentLoaded', renderCharts);
</script>
<?php $this->need('footer.php'); ?>