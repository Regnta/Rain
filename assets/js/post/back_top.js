document.addEventListener('DOMContentLoaded', function () {
    const backToTop = document.getElementById('back-to-top');

    // 监听滚动事件
    window.addEventListener('scroll', () => {
        // 当滚动超过 300px 时显示按钮
        if (window.pageYOffset > 300) {
            backToTop.classList.add('show');
        } else {
            backToTop.classList.remove('show');
        }
    });

    // 点击平滑滚动到顶部
    backToTop.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
});