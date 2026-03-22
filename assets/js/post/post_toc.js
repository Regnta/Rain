document.addEventListener("DOMContentLoaded", function () {
    const postContent = document.querySelector('.post-content');
    const tocContent = document.getElementById('toc-content');

    if (!postContent || !tocContent) return;

    // 找到所有的 H2 和 H3 标题
    const headings = postContent.querySelectorAll('h2, h3');
    if (headings.length === 0) {
        document.querySelector('.post-toc-wrapper').style.display = 'none';
        return;
    }

    const ul = document.createElement('ul');

    headings.forEach((heading, index) => {
        // 给标题加 ID 方便跳转
        const id = 'heading-' + index;
        heading.setAttribute('id', id);

        const li = document.createElement('li');
        li.style.paddingLeft = heading.tagName === 'H3' ? '15px' : '0';

        const a = document.createElement('a');
        a.setAttribute('href', '#' + id);
        a.textContent = heading.textContent;

        // 点击平滑滚动
        a.addEventListener('click', (e) => {
            e.preventDefault();
            document.getElementById(id).scrollIntoView({ behavior: 'smooth' });
        });

        li.appendChild(a);
        ul.appendChild(li);
    });

    tocContent.appendChild(ul);

    // 阅读进度追踪
    window.addEventListener('scroll', () => {
        let current = "";
        headings.forEach((heading) => {
            const headingTop = heading.offsetTop;
            if (pageYOffset >= headingTop - 60) {
                4
                current = heading.getAttribute("id");
            }
        });

        document.querySelectorAll('.toc-content li').forEach((li) => {
            li.classList.remove("active");
            if (li.querySelector('a').getAttribute('href') === "#" + current) {
                li.classList.add("active");
            }
        });
    });
});